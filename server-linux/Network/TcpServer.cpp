
#include "TcpServer.h"
namespace Network {
    namespace Tcp {

        TcpServer::TcpServer(boost::asio::ip::tcp::endpoint listen) :
        acceptor(io_service, listen), poolThreads(THREADS_POOL_MAX) {
            poolThreads.schedule(this->start());
        }

        void TcpServer::start() {
            while (true) {
                boost::asio::ip::::socket socket(io_service);
                acceptor.accept(socket);



                boost::system::error_code ignored_error;
                boost::asio::write(socket, boost::asio::buffer(message),
                        boost::asio::transfer_all(), ignored_error);
            }
        }

        TcpServer::~TcpServer() {
            delete acceptor;
        }

    }
}