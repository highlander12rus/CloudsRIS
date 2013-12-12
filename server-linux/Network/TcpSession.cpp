
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
        }

        void TcpSession::handle_write(const boost::system::error_code& /*error*/,
                size_t /*bytes_transferred*/) {
        }

        void TcpSession::parseHeaders() {
            //считывание токена из сокета
            for (int i = 0; i < 128; i++) {
                token << g[i];
            }
                BOOST_LOG_TRIVIAL(debug) <<"token = "<<token.str();
            //считывание размера файла
            char* tmpSize = new char[8];
            for (int i = 0; i < 8; i++) {
                tmpSize[i] = g[i + 128];
            }
            BOOST_LOG_TRIVIAL(debug) <<"tmpsize= "<<*((unsigned long long*)tmpSize);
            //конвертация
            file_size = this->htonll(*tmpSize);
            BOOST_LOG_TRIVIAL(debug) <<"tmpsize= "<<file_size;
            delete[] tmpSize;

            //проверка на существование токена в базе
            if (!this->redisInstance->exists(token.str())) {
                this->send(ERROR_TCP_SOCKET);
                return;
            }
            std::string value = this->redisInstance->get(token.str());
            BOOST_LOG_TRIVIAL(debug) <<"redis token = " << value;
            std::vector<std::string> spVect = Helper::StringExtended::split(value, ' ');

            std::string sizeFile = spVect[1];

            idFile = strtoul(spVect[2].c_str(), NULL, 0);

            //проверка на соответствие размера файла
            if (strtoul(sizeFile.c_str(), NULL, 0) != file_size) {
                this->send(ERROR_TCP_SOCKET);
                return;
            }
            if (spVect[0].compare("s")) {
                this->order = strtoul(spVect[3].c_str(), NULL, 0);
                this->offset = strtoul(spVect[4].c_str(), NULL, 0);
            }
            mod = spVect[0];
        }

        void TcpSession::wModeWorkFirst(size_t bytes_transferred) {
            //поиск места под файл
             BOOST_LOG_TRIVIAL(debug) << "wModeFirst";
            this->blockMass = new FileSystem::Block::AllocatedBlocks(file_size, SELF_IP);
            if (blockMass->getVectors().size() == 1) {
                
                unsigned long long sizeFileOrBuff = (((BUFFER_SIZE - HEADER_TCP_LENGTH) < file_size) ? (BUFFER_SIZE - HEADER_TCP_LENGTH) : file_size);
                 BOOST_LOG_TRIVIAL(debug) << "sizeFile or buf " << sizeFileOrBuff;
                strWrite = blockMass->getVectors()[0]->writeFile(blockMass->getVectors()[0]->occupied_space, sizeFileOrBuff);
                char * tmp_buf = new char[sizeFileOrBuff];
                memcpy(tmp_buf, &g + HEADER_TCP_LENGTH, sizeof (char)*(sizeFileOrBuff));
                strWrite->write(tmp_buf, sizeFileOrBuff);
                delete[] tmp_buf;
                delete strWrite;
                if ((bytes_transferred - HEADER_TCP_LENGTH) == file_size) {
                    BOOST_LOG_TRIVIAL(debug) << "((bytes_transferred - HEADER_TCP_LENGTH) == file_size) (126)";
                    Database::Tables::Blocks* blockDB = new Database::Tables::Blocks(conn);
                    //вставка сдвига файла в блоке в таблицу файлов
                    Database::Tables::ServerFiles* servFile = new Database::Tables::ServerFiles(conn);
                    servFile->updateFileOffsetByIdAndOrder(idFile, 0, blockMass->getVectors()[0]->occupied_space);
                    delete servFile;
                    if (!blockDB->updateOccuredSize(blockMass->getVectors()[0]->pathToBlockID, byte_write_block)) {
                        this->send(ERROR_TCP_SOCKET);
                        delete blockDB;
                        return;
                    }
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

                char * tmp_buf = new char[BUFFER_SIZE - HEADER_TCP_LENGTH];
                memcpy(tmp_buf, &g + HEADER_TCP_LENGTH, sizeof (char)*(BUFFER_SIZE - HEADER_TCP_LENGTH));
                strWrite->write(tmp_buf, BUFFER_SIZE - HEADER_TCP_LENGTH);
                delete[] tmp_buf;
                delete strWrite;
                byte_write_block += BUFFER_SIZE - HEADER_TCP_LENGTH;
            }
        }

        void TcpSession::wModeWork(size_t bytes_transferred) {
            if (blockMass->getVectors().size() == 1) {
                unsigned long long sizeFileOrBuff = (((BUFFER_SIZE) < file_size) ? (BUFFER_SIZE) : file_size);
                strWrite = blockMass->getVectors()[0]->writeFile(blockMass->getVectors()[0]->occupied_space + byte_read_count - HEADER_TCP_LENGTH, sizeFileOrBuff);
                char * tmp_buf = new char[sizeFileOrBuff];
                memcpy(tmp_buf, &g, sizeof (char)*(sizeFileOrBuff));
                strWrite->write(tmp_buf, sizeFileOrBuff);
                delete[] tmp_buf;
                delete strWrite;
                if ((byte_read_count - HEADER_TCP_LENGTH) == file_size) {
                    Database::Tables::Blocks* blockDB = new Database::Tables::Blocks(conn);
                    if (!blockDB->updateOccuredSize(blockMass->getVectors()[0]->pathToBlockID, byte_write_block)) {
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
                    if (!blockDB->updateOccuredSize(blockMass->getVectors()[blockThis]->pathToBlockID, byte_write_block)) {
                        this->send(ERROR_TCP_SOCKET);
                        delete blockDB;
                        return;
                    }
                    delete blockDB;
                    byte_write_block = 0;
                    blockThis++;
                    //вставка сдвига файла в блоке в таблицу файлов
                    Database::Tables::ServerFiles* servFile = new Database::Tables::ServerFiles(conn);
                    servFile->updateFileOffsetByIdAndOrder(idFile, blockThis, blockMass->getVectors()[blockThis]->occupied_space);
                    delete servFile;
                }
            }
        }

        void TcpSession::set_virable_for_read_block() {
            std::string pathToBlock = result_read->getString(3);
            unsigned int offset = result_read->getUInt(2);
            unsigned int length = result_read->getUInt(4);

            FileSystem::Block::Block block(pathToBlock, 0); //0т.к не важен размер дял нас
            sreadBock = block.readFile(offset, length);
        }

        void TcpSession::sendToClientNewPartionData() {
            if (result_read->next()) {
                BOOST_LOG_TRIVIAL(debug) << "read next block";
                //есть перезагружаем данные на отправку следующего блока
                set_virable_for_read_block();
                bytes_last_read = sreadBock->read(&(buffer_for_read[0]), BUFFER_SIZE);
            } else {
                //если данных нету то отправится bytes_last_read == 0 и мы закончим отправлять 
                bytes_last_read = 0;
            }
        }

        void TcpSession::sendFile() {
            if (result_read == NULL) {
                //first launch function =>init send file
                Database::Tables::ServerFiles* serverFilesTablet = new Database::Tables::ServerFiles(conn);
                result_read = serverFilesTablet->GetInfoByFileId(idFile, SELF_IP);
                //read first bolck
                set_virable_for_read_block();
                BOOST_LOG_TRIVIAL(debug) << "first launch function";
            }

            if (bytes_last_transferred >= bytes_last_read) {
                //read next partion or block
                bytes_last_transferred = 0;
                bytes_last_read = sreadBock->read(buffer_for_read, BUFFER_SIZE);
                BOOST_LOG_TRIVIAL(debug) << "bytes was read in sendFile()" << bytes_last_read;

                if (bytes_last_read == 0) {
                    //Похоже что читать блок мы закончили
                    sendToClientNewPartionData();
                }

                this->sendBinary(buffer_for_read, bytes_last_read);
            } else {
                BOOST_LOG_TRIVIAL(debug) << "Sending data has not been completed";
                //Данные не были до отправленны сокетом
                unsigned int residue = bytes_last_read - bytes_last_read;
                this->sendBinary(&(buffer_for_read[bytes_last_read]), residue); //отправлем с bytes_last_read даныне) хак:)
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
            memcpy(tmp_buf, &g + HEADER_TCP_LENGTH, sizeof (char)*(sizeFileOrBuff));
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

                //начальная проверка соединения
                if (byte_read_count == 0 || bytes_transferred > (128 + 8)) {

                    this->parseHeaders();
                     BOOST_LOG_TRIVIAL(debug) << "parse headers " << mod <<" " << mod.compare("w");
                    if (mod.compare("r")) {
                        sendFile();
                    }
                    if (mod.compare("w")) {
                         BOOST_LOG_TRIVIAL(debug) << "mod w start";
                        this->wModeWorkFirst(bytes_transferred);
                    }
                    if (mod.compare("s")) {
                        this->sModeWorkFirst(bytes_transferred);
                    }
                    byte_read_count += bytes_transferred;

                    this->start();

                }
                //дальше идет магия, без понятия что она делает
                if (mod.compare("w")) {

                    this->wModeWork(bytes_transferred);

                    byte_read_count += bytes_transferred;
                    if ((byte_read_count - HEADER_TCP_LENGTH) == file_size) {
                        this->send(TCP_SOCKET_OK);
                        this->redisInstance->del(token.str());
                        return;
                    }
                    this->start();
                } else {
                    if (mod.compare("s")) {

                        this->sModeWork(bytes_transferred);

                        byte_read_count += bytes_transferred;
                        if ((byte_read_count - HEADER_TCP_LENGTH) == file_size) {
                            this->send(TCP_SOCKET_OK);
                            this->redisInstance->del(token.str());
                            return;
                        }
                        this->start();
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