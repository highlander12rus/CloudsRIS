#include "TcpServer.h"

namespace Network {
    namespace Tcp {

        TcpServer::TcpServer(boost::asio::io_service* io_service, IBaseEditor * rI,Connection* connect)
        : acceptor_(*io_service, tcp::endpoint(tcp::v4(), TCP_PORT_SERVER)) {
            this->io_service = io_service;
            this->redisInstance = rI;
            this->conn = connect;
            start_accept();
        }

        void TcpServer::start_accept() {

            TcpSession::pointer new_connection =
                    TcpSession::create(*io_service, this->redisInstance,this->conn);

            acceptor_.async_accept(new_connection->socket(),
                    boost::bind(&TcpServer::handle_accept, this, new_connection,
                    boost::asio::placeholders::error));
        }

        void TcpServer::handle_accept(TcpSession::pointer new_connection,
                const boost::system::error_code& error) {
            if (!error) {

                new_connection->start();
                start_accept();
            }
        }



    }
}