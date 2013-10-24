
#include "TcpSession.h"

namespace Network {
    namespace Tcp {

        TcpSession::pointer TcpSession::create(boost::asio::io_service& io_service) {
            return pointer(new TcpSession(io_service));
        }

        tcp::socket& TcpSession::socket() {
            return socket_;
        }

        
        void TcpSession::start() {
            /**
             * http://www.boost.org/doc/libs/1_38_0/doc/html/boost_asio/example/http/client/async_client.cpp
             */
            std::cerr << "client recivedssd1" << std::endl;
            boost::asio::async_read(socket_, boost::asio::buffer(g),
                    boost::bind(&TcpSession::handle_read, shared_from_this(),
                    boost::asio::placeholders::error,
                    boost::asio::placeholders::bytes_transferred));
            std::cerr << "client recivedssd" << std::endl;

            message_ = "dsadas45667";
            std::cerr << "client recive";
            boost::asio::async_write(socket_, boost::asio::buffer(message_),
                    boost::bind(&TcpSession::handle_write, shared_from_this(),
                    boost::asio::placeholders::error,
                    boost::asio::placeholders::bytes_transferred));
        }

        TcpSession::TcpSession(boost::asio::io_service& io_service)
        : socket_(io_service) {
        }

        void TcpSession::handle_write(const boost::system::error_code& /*error*/,
                size_t /*bytes_transferred*/) {
        }

        void TcpSession::handle_read(const boost::system::error_code& error, size_t bytes_transferred) {
            if (!error || error == boost::asio::error::message_size || bytes_transferred != 0) {
                std::cout << "handle read" << std::endl << "g=" << g << std::endl;

                this->start();
            } else {
                std::cout << "connection clouse" << std::endl;
            }
        }

    }
}