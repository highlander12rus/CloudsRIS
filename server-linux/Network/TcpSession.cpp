
#include "TcpSession.h"

namespace Network {
    namespace Tcp {

        TcpSession::pointer TcpSession::create(boost::asio::io_service& io_service, redis::RedisConnection * rI,Connection* connect) {
            return pointer(new TcpSession(io_service, rI,connect));
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

        void TcpSession::send(std::string msg) {


            boost::asio::async_write(socket_, boost::asio::buffer(msg),
                    boost::bind(&TcpSession::handle_write, shared_from_this(),
                    boost::asio::placeholders::error,
                    boost::asio::placeholders::bytes_transferred));

        }

        TcpSession::TcpSession(boost::asio::io_service& io_service, redis::RedisConnection * rI, Connection* connect)
        : socket_(io_service) {
            this->redisInstance = rI;
            this->byte_read_count = 0;
            this->blockThis = 0;
            this->byte_write_block = 0;
            this->conn = connect;

        }

        void TcpSession::handle_write(const boost::system::error_code& /*error*/,
                size_t /*bytes_transferred*/) {
        }

        void TcpSession::handle_read(const boost::system::error_code& error, size_t bytes_transferred) {
            if (!error || error == boost::asio::error::message_size || bytes_transferred != 0) {
                //std::cout << "handle read" << std::endl << "g=" << *g << std::endl;

                //начальная проверка соединения
                if (byte_read_count == 0 || bytes_transferred > (128 + 8)) {
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
                    if (!this->redisInstance->getConn().exists(token.str())) {
                        this->send("11");
                        return;
                    }
                    std::string value = this->redisInstance->getConn().get(token.str());
                    std::string modLocal = value.substr(0, 1);
                    std::string sizeFile = value.substr(2, value.length() - 3);

                    //проверка на соответствие размера файла
                    if (strtoul(sizeFile.c_str(), NULL, 0) != file_size) {
                        this->send("11");
                        return;
                    }
                    mod = modLocal;
                    if (mod.compare("w")) {
                        //поиск места под файл
                        this->blockMass = new FileSystem::Block::AllocatedBlocks(file_size, SELF_IP);
                        if (blockMass->getVectors().size() == 1) {
                            strWrite = blockMass->getVectors()[0]->writeFile(blockMass->getVectors()[0]->occupied_space, ((BUFFER_SIZE - 136) < file_size) ? (BUFFER_SIZE - 136) : file_size);
                            char * tmp_buf = new char[((BUFFER_SIZE - 136) < file_size) ? (BUFFER_SIZE - 136) : file_size];
                            memcpy(tmp_buf, &g + 136, sizeof (char)*(((BUFFER_SIZE - 136) < file_size) ? (BUFFER_SIZE - 136) : file_size));
                            strWrite->write(tmp_buf, (((BUFFER_SIZE - 136) < file_size) ? (BUFFER_SIZE - 136) : file_size));
                            delete[] tmp_buf;
                            delete strWrite;
                            if ((bytes_transferred - 136) == file_size) {
                                Database::Tables::Blocks* blockDB = new Database::Tables::Blocks(conn);
                                if (!blockDB->updateOccuredSize(blockMass->getVectors()[0]->pathToBlockID, byte_write_block)) {
                                    this->send("11");
                                    delete blockDB;
                                    return;
                                }
                                this->send("1");
                                delete blockDB;
                                return;
                            }
                        } else {
                            strWrite = blockMass->getVectors()[0]->writeFile(blockMass->getVectors()[0]->occupied_space, BUFFER_SIZE - 136);
                            char * tmp_buf = new char[BUFFER_SIZE - 136];
                            memcpy(tmp_buf, &g + 136, sizeof (char)*(BUFFER_SIZE - 136));
                            strWrite->write(tmp_buf, BUFFER_SIZE - 136);
                            delete[] tmp_buf;
                            delete strWrite;
                            byte_write_block += BUFFER_SIZE - 136;
                        }
                    }
                    byte_read_count += bytes_transferred;
                    //TODO: mode r, mode s
                    this->start();

                }
                //дальше идет магия, без понятия что она делает
                if (mod.compare("w")) {
                    if (blockMass->getVectors().size() == 1) {
                        strWrite = blockMass->getVectors()[0]->writeFile(blockMass->getVectors()[0]->occupied_space + byte_read_count - 136, ((BUFFER_SIZE) < file_size) ? (BUFFER_SIZE) : file_size);
                        char * tmp_buf = new char[((BUFFER_SIZE) < file_size) ? (BUFFER_SIZE) : file_size];
                        memcpy(tmp_buf, &g, sizeof (char)*(((BUFFER_SIZE) < file_size) ? (BUFFER_SIZE) : file_size));
                        strWrite->write(tmp_buf, (((BUFFER_SIZE) < file_size) ? (BUFFER_SIZE) : file_size));
                        delete[] tmp_buf;
                        delete strWrite;
                        if ((byte_read_count - 136) == file_size) {
                            Database::Tables::Blocks* blockDB = new Database::Tables::Blocks(conn);
                            if (!blockDB->updateOccuredSize(blockMass->getVectors()[0]->pathToBlockID, byte_write_block)) {
                                this->send("11");
                                delete blockDB;
                                return;
                            }
                            this->send("1");
                            delete blockDB;
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
                                this->send("11");
                                delete blockDB;
                                return;
                            }
                            delete blockDB;
                            byte_write_block = 0;
                            blockThis++;
                        }
                    }
                    //strWrite = blockMass->getVectors()[blockThis].writeFile(blockMass->getVectors()[blockThis].occupied_space, file_size);
                    //strWrite->write();
                }
                byte_read_count += bytes_transferred;
                if ((byte_read_count - 136) == file_size) {
                    this->send("1");
                    return;
                }
                this->start();
            } else {

                std::cout << "connection clouse" << std::endl;

            }
        }

        TcpSession::~TcpSession() {
            for (int i = 0; i < blockMass->getVectors().size(); i++) {
                delete blockMass->getVectors()[i];
            }
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