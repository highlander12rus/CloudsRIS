
#include "TcpSession.h"

namespace Network {
    namespace Tcp {

        TcpSession::pointer TcpSession::create(boost::asio::io_service& io_service, IBaseEditor * rI, Connection* connect) {
            return pointer(new TcpSession(io_service, rI, connect));
        }

        tcp::socket& TcpSession::socket() {
            return socket_;
        }

        void TcpSession::start() {
            /**
             * http://www.boost.org/doc/libs/1_38_0/doc/html/boost_asio/example/http/client/async_client.cpp
             */
            BOOST_LOG_TRIVIAL(debug) << "Start new client";
            boost::asio::async_read(socket_, boost::asio::buffer(g),
                    boost::bind(&TcpSession::handle_read, shared_from_this(),
                    boost::asio::placeholders::error,
                    boost::asio::placeholders::bytes_transferred));



        }

        void TcpSession::sendBinary(char* buff, unsigned int n) {


            boost::asio::async_write(socket_, boost::asio::buffer(buff, n),
                    boost::bind(&TcpSession::handle_write_binary, shared_from_this(),
                    boost::asio::placeholders::error,
                    boost::asio::placeholders::bytes_transferred));

        }

        void TcpSession::send(char msg) {

            this->requestMessage[0] = msg;
            boost::asio::async_write(socket_, boost::asio::buffer(requestMessage, 1),
                    boost::bind(&TcpSession::handle_write, shared_from_this(),
                    boost::asio::placeholders::error,
                    boost::asio::placeholders::bytes_transferred));

        }

        TcpSession::TcpSession(boost::asio::io_service& io_service, IBaseEditor * rI, Connection* connect)
        : socket_(io_service) {
            BOOST_LOG_TRIVIAL(debug) << "Create new session user";
            this->redisInstance = rI;
            this->byte_read_count = 0;
            this->blockThis = 0;
            this->byte_write_block = 0;
            this->conn = connect;
            this->requestMessage = new char[1];
            this->blockMass = NULL;
            this->order = -1;
            this->offset = 0;
            this->block_id = 0;
        }

        void TcpSession::handle_write_binary(const boost::system::error_code& error,
                size_t bytes_transferred) {
            if (!error || error == boost::asio::error::message_size || bytes_transferred != 0) {
                bytes_last_transferred += bytes_transferred;
                sendFile();
            } else {
                BOOST_LOG_TRIVIAL(debug) << "handle_write_binary: connection close";
            }
        }

        void TcpSession::handle_write(const boost::system::error_code& /*error*/,
                size_t /*bytes_transferred*/) {
        }

        void TcpSession::parseHeaders() {
            //считывание токена из сокета
            for (int i = 0; i < 128; i++) {
                token << g[i];
            }
            BOOST_LOG_TRIVIAL(debug) << "token = " << token.str();
            //считывание размера файла
            char* tmpSize = new char[8];
            for (int i = 0; i < 8; i++) {
                tmpSize[i] = g[i + 128];
            }

            //конвертация
            file_size = *((unsigned long long*) tmpSize);
            BOOST_LOG_TRIVIAL(debug) << "tmpsize= " << file_size;
            delete[] tmpSize;

            //проверка на существование токена в базе
            if (!this->redisInstance->exists(token.str())) {
                this->send(ERROR_TCP_SOCKET);
                return;
            }
            std::string value = this->redisInstance->get(token.str());
            BOOST_LOG_TRIVIAL(debug) << "redis token = " << value;
            std::vector<std::string> spVect = Helper::StringExtended::split(value, ' ');

            std::string sizeFile = spVect[1];
            BOOST_LOG_TRIVIAL(debug) << "size file red = " << sizeFile;
            idFile = strtoul(spVect[2].c_str(), NULL, 0);
            BOOST_LOG_TRIVIAL(debug) << "redis id file = " << idFile;
            BOOST_LOG_TRIVIAL(debug) << "redis strout = " << strtoul(sizeFile.c_str(), NULL, 0);
            //проверка на соответствие размера файла
            if (strtoul(sizeFile.c_str(), NULL, 0) != file_size) {
                this->send(ERROR_TCP_SOCKET);
                return;
            }
            if (!spVect[0].compare("s")) {
                this->order = strtoul(spVect[3].c_str(), NULL, 0);
                this->offset = strtoul(spVect[4].c_str(), NULL, 0);
            }
            BOOST_LOG_TRIVIAL(debug) << "redis mod = " << mod;
            BOOST_LOG_TRIVIAL(debug) << "compare w= " << spVect[0].compare("w");
            mod = spVect[0];
        }

        void TcpSession::wModeWorkFirst(size_t bytes_transferred) {
            //поиск места под файл
            BOOST_LOG_TRIVIAL(debug) << "wModeFirst byte = " << bytes_transferred;
            this->blockMass = new FileSystem::Block::AllocatedBlocks(file_size, SELF_IP);
            if (blockMass->getVectors().size() == 1) {
                Database::Tables::Blocks Bl(conn);
                unsigned int blockId = Bl.GetIdByPathToBlock(blockMass->getVectors()[0]->pathToBlockID);
                Database::Tables::ServerFiles SF(conn);
                SF.updateBlockIdByFileIdAndOrder(blockId, this->idFile, 0);
                unsigned long long sizeFileOrBuff = (((BUFFER_SIZE - HEADER_TCP_LENGTH) < file_size) ? (BUFFER_SIZE - HEADER_TCP_LENGTH) : file_size);
                BOOST_LOG_TRIVIAL(debug) << "sizeFile or buf " << sizeFileOrBuff;
                strWrite = blockMass->getVectors()[0]->writeFile(blockMass->getVectors()[0]->occupied_space, sizeFileOrBuff);
                BOOST_LOG_TRIVIAL(debug) << "create str write";
                char * tmp_buf = new char[sizeFileOrBuff];

                memcpy(tmp_buf, (&(g[HEADER_TCP_LENGTH])), sizeof (char)*(sizeFileOrBuff));
                BOOST_LOG_TRIVIAL(debug) << "cpy in buff";
                strWrite->write(tmp_buf, sizeFileOrBuff);
                BOOST_LOG_TRIVIAL(debug) << "strWrite work";
                delete[] tmp_buf;
                delete strWrite;
                BOOST_LOG_TRIVIAL(debug) << "delete";
                if ((bytes_transferred - HEADER_TCP_LENGTH) == file_size) {
                    BOOST_LOG_TRIVIAL(debug) << "((bytes_transferred - HEADER_TCP_LENGTH) == file_size) (126)";
                    Database::Tables::Blocks* blockDB = new Database::Tables::Blocks(conn);
                    //вставка сдвига файла в блоке в таблицу файлов
                    Database::Tables::ServerFiles* servFile = new Database::Tables::ServerFiles(conn);
                    servFile->updateFileOffsetByIdAndOrder(idFile, 0, blockMass->getVectors()[0]->occupied_space);
                    delete servFile;
                    if (!blockDB->updateOccuredSize(blockMass->getVectors()[0]->pathToBlockID, sizeFileOrBuff + blockMass->getVectors()[0]->occupied_space)) {
                        BOOST_LOG_TRIVIAL(debug) << " ОбНОВИ бЛЕАТЬ!!!!";
                        this->send(ERROR_TCP_SOCKET);
                        delete blockDB;
                        return;
                    }
                    BOOST_LOG_TRIVIAL(debug) << "  бЛЕАТЬ!!!! =  " << (sizeFileOrBuff + blockMass->getVectors()[0]->occupied_space);
                    this->send(TCP_SOCKET_OK);
                    this->redisInstance->del(token.str());
                    delete blockDB;
                    return;
                }
            } else {
                strWrite = blockMass->getVectors()[0]->writeFile(blockMass->getVectors()[0]->occupied_space, BUFFER_SIZE - HEADER_TCP_LENGTH);
                //вставка сдвига файла в блоке в таблицу файлов
                Database::Tables::ServerFiles* servFile = new Database::Tables::ServerFiles(conn);
                servFile->updateFileOffsetByIdAndOrder(idFile, 0, blockMass->getVectors()[0]->occupied_space);
                delete servFile;
                Database::Tables::Blocks Bl(conn);
                unsigned int blockId = Bl.GetIdByPathToBlock(blockMass->getVectors()[0]->pathToBlockID);
                Database::Tables::ServerFiles SF(conn);
                SF.updateBlockIdByFileIdAndOrder(blockId, this->idFile, 0);



                char * tmp_buf = new char[BUFFER_SIZE - HEADER_TCP_LENGTH];
                memcpy(tmp_buf, (&(g[HEADER_TCP_LENGTH])), sizeof (char)*(BUFFER_SIZE - HEADER_TCP_LENGTH));
                strWrite->write(tmp_buf, BUFFER_SIZE - HEADER_TCP_LENGTH);
                delete[] tmp_buf;
                delete strWrite;
                byte_write_block += BUFFER_SIZE - HEADER_TCP_LENGTH;
            }
        }

        void TcpSession::wModeWork(size_t bytes_transferred) {
            if (blockMass->getVectors().size() == 1) {
                BOOST_LOG_TRIVIAL(debug) << "w mode work in 165 bytes = " << bytes_transferred;
                unsigned long long sizeFileOrBuff = (((BUFFER_SIZE) < file_size) ? (BUFFER_SIZE) : file_size);
                strWrite = blockMass->getVectors()[0]->writeFile(blockMass->getVectors()[0]->occupied_space + byte_read_count - HEADER_TCP_LENGTH, sizeFileOrBuff);
                char * tmp_buf = new char[sizeFileOrBuff];
                memcpy(tmp_buf, &g, sizeof (char)*(sizeFileOrBuff));
                strWrite->write(tmp_buf, sizeFileOrBuff);
                delete[] tmp_buf;
                delete strWrite;
                if ((byte_read_count - HEADER_TCP_LENGTH) == file_size) {
                    BOOST_LOG_TRIVIAL(debug) << "(byte_read_count - HEADER_TCP_LENGTH) == file_size) (174)";
                    Database::Tables::Blocks* blockDB = new Database::Tables::Blocks(conn);
                    if (!blockDB->updateOccuredSize(blockMass->getVectors()[0]->pathToBlockID, this->byte_read_count + blockMass->getVectors()[0]->occupied_space)) {
                        this->send(ERROR_TCP_SOCKET);
                        delete blockDB;
                        return;
                    }
                    this->send(TCP_SOCKET_OK);
                    delete blockDB;
                    this->redisInstance->del(token.str());
                    return;
                }
            } else {
                strWrite = blockMass->getVectors()[blockThis]->writeFile(blockMass->getVectors()[blockThis]->occupied_space + byte_write_block, BUFFER_SIZE);
                char * tmp_buf = new char[BUFFER_SIZE];
                memcpy(tmp_buf, &g, sizeof (char)*(BUFFER_SIZE));
                strWrite->write(tmp_buf, BUFFER_SIZE);
                delete[] tmp_buf;
                delete strWrite;
                byte_write_block += BUFFER_SIZE;
                if (byte_write_block + BUFFER_SIZE > BLOCK_SIZE) {
                    Database::Tables::Blocks* blockDB = new Database::Tables::Blocks(conn);
                    if (!blockDB->updateOccuredSize(blockMass->getVectors()[blockThis]->pathToBlockID, byte_write_block + blockMass->getVectors()[blockThis]->occupied_space)) {
                        this->send(ERROR_TCP_SOCKET);
                        delete blockDB;
                        return;
                    }
                    delete blockDB;

                    //filespliter
                    Database::Tables::Blocks Bl(conn);
                    unsigned int blockId = Bl.GetIdByPathToBlock(blockMass->getVectors()[this->blockThis]->pathToBlockID);
                    Database::Tables::ServerFiles* servFile = new Database::Tables::ServerFiles(conn);
                    servFile->fileSpliter(idFile, blockId, this->byte_write_block);
                    delete servFile;
                    byte_write_block = 0;
                    blockThis++;


                    Database::Tables::ServerFiles SF1(conn);
                    SF1.updateBlockIdByFileIdAndOrder(blockId, this->idFile, this->blockThis);
                }
            }
        }

        void TcpSession::set_virable_for_read_block() {
            std::string pathToBlock = result_read->getString(3);
            unsigned int offset = result_read->getUInt(2);
            unsigned int length = result_read->getUInt(4);
            buffer_curent_size = length > BUFFER_SIZE ? BUFFER_SIZE : length;
            BOOST_LOG_TRIVIAL(debug) << "set_virable_for_read_block: pathToBlock=" << pathToBlock;
            if (BlockSMode != NULL) {
                BOOST_LOG_TRIVIAL(debug) << "block not empty!";
                delete BlockSMode;
            }
            BlockSMode = new FileSystem::Block::Block(pathToBlock, 0);
            sreadBock = BlockSMode->readFile(offset, length);
        }

        void TcpSession::sendToClientNewPartionData() {
            if (result_read->next()) {
                BOOST_LOG_TRIVIAL(debug) << "read next block";
                //есть перезагружаем данные на отправку следующего блока
                set_virable_for_read_block();
                bytes_last_read = sreadBock->read(buffer_for_read, buffer_curent_size);
            } else {
                //если данных нету то отправится bytes_last_read == 0 и мы закончим отправлять 
                bytes_last_read = 0;
            }
        }

        void TcpSession::sendFile() {
            BOOST_LOG_TRIVIAL(debug) << "fbytes_last_transferred=" << bytes_last_transferred
                    << "bytes_last_read" << bytes_last_read;


            if (bytes_last_transferred >= bytes_last_read) {
                //read next partion or block
                bytes_last_transferred = 0;
                BOOST_LOG_TRIVIAL(debug) << "buffer_curent_size=" << buffer_curent_size;
                bytes_last_read = sreadBock->read(buffer_for_read, buffer_curent_size);
                //BOOST_LOG_TRIVIAL(debug) << "buffer=" << buffer_for_read;
                BOOST_LOG_TRIVIAL(debug) << "bytes was read in sendFile()=" << bytes_last_read;

                if (bytes_last_read == 0) {
                    //Похоже что читать блок мы закончили
                    sendToClientNewPartionData();
                }

                if (bytes_last_read > 0) {
                    this->sendBinary(buffer_for_read, bytes_last_read);
                } else {
                    BOOST_LOG_TRIVIAL(debug) << "socet wa closed";
                    delete serverFilesTablet;
                    delete result_read;
                    result_read = NULL;
                    serverFilesTablet = NULL;
                    socket_.close();
                }
            } else {
                BOOST_LOG_TRIVIAL(debug) << "Sending data has not been completed";
                //Данные не были до отправленны сокетом
                unsigned int residue = bytes_last_read - bytes_last_read;
                this->sendBinary(buffer_for_read + bytes_last_read, residue); //отправлем с bytes_last_read даныне) хак:)
            }

        }

        void TcpSession::sModeWorkFirst(size_t bytes_transferred) {
            Database::Tables::ServerFiles* SF = new Database::Tables::ServerFiles(conn);
            this->block_id = SF->GetBlockIdByFileIdAndOrder(this->idFile, this->order);
            delete SF;
            Database::Tables::AddressBlocks* AB = new Database::Tables::AddressBlocks(conn);
            Database::Tables::Blocks* B = new Database::Tables::Blocks(conn);
            std::string pathToBlock = B->GetPathToBlockByBlockId(this->block_id);
            delete B;
            if (!AB->isCreateBlock(SELF_IP, this->block_id)) {
                AB->insertBlock(SELF_IP, this->block_id);
                this->BlockSMode = new FileSystem::Block::Block(pathToBlock, NULL, NULL);
            } else {
                this->BlockSMode = new FileSystem::Block::Block(pathToBlock, 0);
            }
            delete AB;
            unsigned long long sizeFileOrBuff = (((BUFFER_SIZE - HEADER_TCP_LENGTH) < file_size) ? (BUFFER_SIZE - HEADER_TCP_LENGTH) : file_size);
            strWrite = BlockSMode->writeFile(this->offset, sizeFileOrBuff);
            char * tmp_buf = new char[sizeFileOrBuff];
            memcpy(tmp_buf, (&(g[HEADER_TCP_LENGTH])), sizeof (char)*(sizeFileOrBuff));
            strWrite->write(tmp_buf, sizeFileOrBuff);
            delete[] tmp_buf;
            delete strWrite;
            if ((bytes_transferred - HEADER_TCP_LENGTH) == file_size) {
                this->send(TCP_SOCKET_OK);
                this->redisInstance->del(token.str());
                return;
            }
        }

        void TcpSession::sModeWork(size_t bytes_transferred) {
            unsigned long long sizeFileOrBuff = (((BUFFER_SIZE) < file_size) ? (BUFFER_SIZE) : file_size);
            strWrite = BlockSMode->writeFile(this->offset + byte_read_count - HEADER_TCP_LENGTH, sizeFileOrBuff);
            char * tmp_buf = new char[sizeFileOrBuff];
            memcpy(tmp_buf, &g, sizeof (char)*(sizeFileOrBuff));
            strWrite->write(tmp_buf, sizeFileOrBuff);
            delete[] tmp_buf;
            delete strWrite;
            if ((byte_read_count - HEADER_TCP_LENGTH) == file_size) {
                this->send(TCP_SOCKET_OK);
                this->redisInstance->del(token.str());
                return;
            }
        }

        void TcpSession::handle_read(const boost::system::error_code& error, size_t bytes_transferred) {
            if (!error || error == boost::asio::error::message_size || bytes_transferred != 0) {
                //std::cout << "handle read" << std::endl << "g=" << *g << std::endl;
                BOOST_LOG_TRIVIAL(debug) << "byte_read_count " << byte_read_count;
                //начальная проверка соединения
                if (byte_read_count == 0 && bytes_transferred > (127)) {

                    this->parseHeaders();
                    BOOST_LOG_TRIVIAL(debug) << "parse headers " << mod << " " << mod.compare("w");
                    byte_read_count += bytes_transferred;
                    if (!mod.compare("r")) {
                        Database::Tables::ServerFiles serverFilesTablet(conn);
                        result_read = serverFilesTablet.GetInfoByFileId(idFile, SELF_IP);
                        BOOST_LOG_TRIVIAL(debug) << "3";
                        //read first bolck
                        result_read->next();
                        set_virable_for_read_block();

                        sendFile();
                    }
                    if (!mod.compare("w")) {
                        BOOST_LOG_TRIVIAL(debug) << "mod w start";
                        this->wModeWorkFirst(bytes_transferred);
                    }
                    if (!mod.compare("s")) {
                        this->sModeWorkFirst(bytes_transferred);
                    }


                    this->start();
                    return;
                }
                //дальше идет магия, без понятия что она делает
                if (!mod.compare("w")) {
                    byte_read_count += bytes_transferred;

                    this->wModeWork(bytes_transferred);

                    if ((byte_read_count - HEADER_TCP_LENGTH) == file_size) {
                        Database::Tables::Blocks Bl(conn);
                        unsigned int blockId = Bl.GetIdByPathToBlock(blockMass->getVectors()[this->blockThis]->pathToBlockID);
                        Bl.updateOccuredSize(blockMass->getVectors()[blockThis]->pathToBlockID, this->byte_write_block);
                        Database::Tables::ServerFiles SF(conn);
                        SF.updateBlockIdByFileIdAndOrder(blockId, idFile, blockThis);
                        BOOST_LOG_TRIVIAL(debug) << "TCP OK";
                        this->send(TCP_SOCKET_OK);
                        this->redisInstance->del(token.str());
                        return;
                    }
                    this->start();
                    return;
                } else {
                    if (!mod.compare("s")) {

                        this->sModeWork(bytes_transferred);

                        byte_read_count += bytes_transferred;
                        if ((byte_read_count - HEADER_TCP_LENGTH) == file_size) {
                            this->send(TCP_SOCKET_OK);
                            this->redisInstance->del(token.str());
                            return;
                        }
                        this->start();
                        return;
                    }
                }

            } else {

                BOOST_LOG_TRIVIAL(debug) << "connection clouse";

            }
        }

        TcpSession::~TcpSession() {
            if (blockMass != NULL)
                for (int i = 0; i < blockMass->getVectors().size(); i++) {
                    delete blockMass->getVectors()[i];
                }
            delete this->requestMessage;
            delete buffer_for_read;
            if (sreadBock != NULL)
                delete sreadBock;
            if (result_read != NULL)
                delete result_read;
            if (BlockSMode != NULL)
                delete BlockSMode;
            if (serverFilesTablet != NULL)
                delete serverFilesTablet;
        }

        unsigned long long TcpSession::htonll(unsigned long long src) {

            static int typ = TYP_INIT;
            unsigned char c;

            union {
                unsigned long long ull;
                unsigned char c[8];
            } x;
            if (typ == TYP_INIT) {
                x.ull = 0x01;
                typ = (x.c[7] == 0x01ULL) ? TYP_BIGE : TYP_SMLE;
            }
            if (typ == TYP_BIGE)
                return src;
            x.ull = src;
            c = x.c[0];
            x.c[0] = x.c[7];
            x.c[7] = c;
            c = x.c[1];
            x.c[1] = x.c[6];
            x.c[6] = c;
            c = x.c[2];
            x.c[2] = x.c[5];
            x.c[5] = c;
            c = x.c[3];
            x.c[3] = x.c[4];
            x.c[4] = c;
            return x.ull;
        }
    }
}