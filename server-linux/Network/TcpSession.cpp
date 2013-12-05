
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
            boost::asio::async_write(socket_, boost::asio::buffer(requestMessage,1),
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

            //считывание размера файла
            char* tmpSize = new char[8];
            for (int i = 0; i < 8; i++) {
                tmpSize[i] = g[i + 128];
            }

            //конвертация
            file_size = this->htonll(*tmpSize);
            delete[] tmpSize;

            //проверка на существование токена в базе
            if (!this->redisInstance->exists(token.str())) {
                this->send(ERROR_TCP_SOCKET);
                return;
            }
            std::string value = this->redisInstance->get(token.str());
            std::vector<std::string> spVect = Helper::StringExtended::split(value, ' ');
            if (spVect.size() != 3) {
                this->send(ERROR_TCP_SOCKET);
                return;
            }
            std::string sizeFile = spVect[1];
            if (spVect[0].compare("r")) {
                idFile = strtoul(spVect[2].c_str(), NULL, 0);
            }
            //проверка на соответствие размера файла
            if (strtoul(sizeFile.c_str(), NULL, 0) != file_size) {
                this->send(ERROR_TCP_SOCKET);
                return;
            }
            mod = spVect[0];
        }

        void TcpSession::wModeWorkFirst(size_t bytes_transferred) {
            //поиск места под файл
            this->blockMass = new FileSystem::Block::AllocatedBlocks(file_size, SELF_IP);
            if (blockMass->getVectors().size() == 1) {
                unsigned long long sizeFileOrBuff = (((BUFFER_SIZE - HEADER_TCP_LENGTH) < file_size) ? (BUFFER_SIZE - HEADER_TCP_LENGTH) : file_size);
                strWrite = blockMass->getVectors()[0]->writeFile(blockMass->getVectors()[0]->occupied_space, sizeFileOrBuff);
                char * tmp_buf = new char[sizeFileOrBuff];
                memcpy(tmp_buf, &g + HEADER_TCP_LENGTH, sizeof (char)*(sizeFileOrBuff));
                strWrite->write(tmp_buf, sizeFileOrBuff);
                delete[] tmp_buf;
                delete strWrite;
                if ((bytes_transferred - HEADER_TCP_LENGTH) == file_size) {
                    Database::Tables::Blocks* blockDB = new Database::Tables::Blocks(conn);
                    
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
                }
            }
        }

        void TcpSession::sendFile() {

            Database::Tables::ServerFiles* serverFilesTablet =new  Database::Tables::ServerFiles(conn);
            ResultSet* res = serverFilesTablet->GetInfoByFileId(idFile, SELF_IP);

        }

        void TcpSession::handle_read(const boost::system::error_code& error, size_t bytes_transferred) {
            if (!error || error == boost::asio::error::message_size || bytes_transferred != 0) {
                //std::cout << "handle read" << std::endl << "g=" << *g << std::endl;

                //начальная проверка соединения
                if (byte_read_count == 0 || bytes_transferred > (128 + 8)) {

                    this->parseHeaders();
                    if (mod.compare("r")) {
                        sendFile();
                    }
                    if (mod.compare("w")) {
                        this->wModeWorkFirst(bytes_transferred);
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
                }

            } else {

                std::cout << "connection clouse" << std::endl;

            }
        }

        TcpSession::~TcpSession() {
            for (int i = 0; i < blockMass->getVectors().size(); i++) {
                delete blockMass->getVectors()[i];
            }
            delete this->requestMessage;
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