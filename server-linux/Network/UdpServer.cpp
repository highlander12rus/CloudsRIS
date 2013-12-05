#include "UdpServer.h"
namespace Network {
    namespace Udp {

        UdpServer::UdpServer(boost::asio::io_service& io_service, udp::endpoint& listenAddress)
        : socket_(io_service, listenAddress) {
            socket_.set_option(boost::asio::ip::udp::socket::reuse_address(true));
            boost::asio::socket_base::broadcast option(true);
            socket_.set_option(option);

            start_receive();
        }

        void UdpServer::start_receive() {
            socket_.async_receive_from(
                    boost::asio::buffer(recv_buffer_), remote_endpoint_,
                    boost::bind(&UdpServer::handle_receive, this,
                    boost::asio::placeholders::error,
                    boost::asio::placeholders::bytes_transferred));
        }
    }
}