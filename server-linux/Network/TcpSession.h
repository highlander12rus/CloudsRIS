#pragma once
#include "../Config.h"
#include <boost/bind.hpp>
#include <boost/shared_ptr.hpp>
#include <boost/enable_shared_from_this.hpp>
#include <boost/asio.hpp>
#include <sstream>
#include <stdlib.h>
#include"../redis/RedisConnection.h"
#include "../FileSystem/AllocatedBlocks.h"
#include"../FileSystem/FileStreamWrite.h"
#include "../DataBase/SingletoneConn.h"
#include "../DataBase/Tables/Blocks.h"

#define TYP_INIT 0 
#define TYP_SMLE 1 
#define TYP_BIGE 2 
using boost::asio::ip::tcp;

namespace Network {
    namespace Tcp {

        class TcpSession
        : public boost::enable_shared_from_this<TcpSession> {
        public:
            typedef boost::shared_ptr<TcpSession> pointer;

            static pointer create(boost::asio::io_service& io_service, redis::RedisConnection * rI,Connection* connect);


            tcp::socket& socket();

            void start();
            ~TcpSession();
        private:

            TcpSession(boost::asio::io_service& io_service, redis::RedisConnection * rI,Connection* connect);
            void send(std::string msg);
            void handle_write(const boost::system::error_code& /*error*/, size_t /*bytes_transferred*/);
            /**
             * функция преобразующая из сетевого порядка байт в число
             * @param src байтовый массив
             * @return 
             */
            unsigned long long htonll(unsigned long long src);
            void handle_read(const boost::system::error_code& error, size_t bytes_transferred);
            char g[BUFFER_SIZE];
            tcp::socket socket_;
            std::stringstream token;
            unsigned long long byte_read_count;
            unsigned long long file_size;
            redis::RedisConnection * redisInstance;
            std::string mod;
            FileSystem::Block::AllocatedBlocks* blockMass;
            //текущий обрабатываемый блока
            int blockThis;
            FileSystem::StreamWrite* strWrite;
            unsigned long long byte_write_block;
            Connection* conn;
        };
    }
}