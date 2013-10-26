
#include "TcpSession.h"

namespace Network {
    namespace Tcp {

        TcpSession::pointer TcpSession::create(boost::asio::io_service& io_service, redis::RedisConnection * rI) {
            return pointer(new TcpSession(io_service, rI));
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

        TcpSession::TcpSession(boost::asio::io_service& io_service, redis::RedisConnection * rI)
        : socket_(io_service) {
            this->redisInstance = rI;
            this->byte_read_count = 0;
            this->blockThis = 0;

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
                    

                }
                if (mod.compare("w")) {
                    //поиск места под файл
                    this->blockMass = new FileSystem::Block::AllocatedBlocks(file_size, SELF_IP);
                   // this->blockMass->getVectors()[this->blockThis].writeFile(/*/)
                }
                byte_read_count += bytes_transferred;

                this->start();
            } else {
                std::cout << "connection clouse" << std::endl;

            }
        }

        TcpSession::~TcpSession() {

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