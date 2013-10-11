#pragma once;

#include "../Config.h"
#include <boost/asio.hpp>
namespace Network {
    namespace Tcp {

        class TcpServer {
        public:
            TcpServer();

            void start();
            ~TcpServer();
        private:
            boost::asio::io_service io_service;
            boost::asio::ip::tcp::acceptor acceptor;
            boost::threadpool::pool poolThreads;
        };


    }
}