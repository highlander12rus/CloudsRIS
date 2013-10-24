#pragma once
#include "../Config.h"
#include <boost/bind.hpp>
#include <boost/shared_ptr.hpp>
#include <boost/enable_shared_from_this.hpp>
#include <boost/asio.hpp>
using boost::asio::ip::tcp;

namespace Network {
    namespace Tcp {
        
        class TcpSession
        : public boost::enable_shared_from_this<TcpSession> {
        public:
            typedef boost::shared_ptr<TcpSession> pointer;

            static pointer create(boost::asio::io_service& io_service);
            
           // static pointer create(boost::asio::io_service& io_service);
            tcp::socket& socket();

            void start();

        private:

            TcpSession(boost::asio::io_service& io_service);

            void handle_write(const boost::system::error_code& /*error*/, size_t /*bytes_transferred*/);
            
            void handle_read(const boost::system::error_code& error, size_t bytes_transferred);
            char g[BUFFER_SIZE];
            tcp::socket socket_;
            std::string message_;
        };
    }
}