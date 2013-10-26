#pragma once

#include "../Config.h"
#include "TcpSession.h"
#include"../redis/RedisConnection.h"
#include <boost/bind.hpp>
#include <boost/shared_ptr.hpp>
#include <boost/enable_shared_from_this.hpp>
#include <boost/asio.hpp>

using boost::asio::ip::tcp;


namespace Network {
    namespace Tcp {

        class TcpServer {
        public:

            TcpServer(boost::asio::io_service* io_service, redis::RedisConnection * rI);

        private:

            void start_accept();

            void handle_accept(TcpSession::pointer new_connection,
                    const boost::system::error_code& error);

            tcp::acceptor acceptor_;
            boost::asio::io_service* io_service;
            redis::RedisConnection * redisInstance;
        };

    }
}