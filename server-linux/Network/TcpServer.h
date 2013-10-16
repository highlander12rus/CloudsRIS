#pragma once

#include "../Config.h"
#include <boost/asio.hpp>

#include <boost/bind.hpp>
#include <boost/shared_ptr.hpp>
#include <boost/enable_shared_from_this.hpp>
#include <boost/asio.hpp>

using boost::asio::ip::tcp;

//#include "../boost/threadpool.hpp"

namespace Network {
    namespace Tcp {

        /*class TcpServer {
        public:
            TcpServer(boost::asio::ip::tcp::endpoint& listen);

            void start();



            ~TcpServer();
        protected:
            void recive();

            boost::asio::io_service io_service;
            boost::asio::ip::tcp::acceptor acceptor;
            boost::threadpool::pool poolThreads;
        };*/



        class tcp_connection
        : public boost::enable_shared_from_this<tcp_connection> {
        public:
            typedef boost::shared_ptr<tcp_connection> pointer;

            static pointer create(boost::asio::io_service& io_service) {
                return pointer(new tcp_connection(io_service));
            }

            tcp::socket& socket() {
                return socket_;
            }

            void start() {
                /**
                 * http://www.boost.org/doc/libs/1_38_0/doc/html/boost_asio/example/http/client/async_client.cpp
                 */
                std::cerr << "client recivedssd1" << std::endl;
                boost::asio::async_read(socket_, boost::asio::buffer(g),
                        boost::bind(&tcp_connection::handle_read, shared_from_this(),
                        boost::asio::placeholders::error,
                        boost::asio::placeholders::bytes_transferred));
                std::cerr << "client recivedssd" << std::endl;
                
                message_ = "dsadas45667";
                std::cerr << "client recive";
                        boost::asio::async_write(socket_, boost::asio::buffer(message_),
                        boost::bind(&tcp_connection::handle_write, shared_from_this(),
                        boost::asio::placeholders::error,
                        boost::asio::placeholders::bytes_transferred));
            }

        private:
            
            tcp_connection(boost::asio::io_service& io_service)
            : socket_(io_service) {
            }

            void handle_write(const boost::system::error_code& /*error*/,
                    size_t /*bytes_transferred*/) {
            }
            
            void handle_read(const boost::system::error_code& error,  size_t bytes_transferred) {
                std::cout << "handle read" << std::endl << "g=" << g << std::endl;
                 
                this->start();
            }
            
            char g[100];
            tcp::socket socket_;
            std::string message_;
        };

        class tcp_server {
        public:

            tcp_server(boost::asio::io_service* io_service)
            : acceptor_(*io_service, tcp::endpoint(tcp::v4(), 5464)) {
                this->io_service = io_service;
                start_accept();
            }

        private:

            void start_accept() {std::cerr << "dsadsas" << std::endl;
                tcp_connection::pointer new_connection =
                        tcp_connection::create(*io_service);
                std::cerr << "dsadsadsda20" << std::endl;
                acceptor_.async_accept(new_connection->socket(),
                        boost::bind(&tcp_server::handle_accept, this, new_connection,
                        boost::asio::placeholders::error));
            }

            void handle_accept(tcp_connection::pointer new_connection,
                    const boost::system::error_code& error) {
                if (!error) {
                    std::cerr << "dsadsa" << std::endl;
                    new_connection->start();
                    start_accept();
                }
            }

            tcp::acceptor acceptor_;
            boost::asio::io_service* io_service;
        };

    }
}