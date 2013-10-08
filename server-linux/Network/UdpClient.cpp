#include"UdpClient.h"

namespace Network {
    namespace Udp {

        UdpClient::UdpClient(boost::asio::io_service& io_service)
        : socket_(io_service) {
            socket_.open(udp::v4());
            socket_.set_option(boost::asio::ip::udp::socket::reuse_address(true));
            boost::asio::socket_base::broadcast option(true);
            socket_.set_option(option);

        }

        void UdpClient::send(string messageStr, udp::endpoint& address) {
            boost::shared_ptr<std::string> message(
                    new std::string(messageStr));

           /*socket_.async_send_to(boost::asio::buffer(*message), address,
                    boost::bind(&UdpClient::handle_send, this, message,
                    boost::asio::placeholders::error,
                    boost::asio::placeholders::bytes_transferred));*/
        }

        void UdpClient::start_receive() {
            socket_.async_receive_from(
                    boost::asio::buffer(recv_buffer_), remote_endpoint_,
                    boost::bind(&UdpClient::handle_receive, this,
                    boost::asio::placeholders::error,
                    boost::asio::placeholders::bytes_transferred));
        }

        /*void UdpClient::handle_receive(const boost::system::error_code& error,
                std::size_t bytes_transferred) {
            if(bytes_transferred == 0)
                return;
            
            if (!error || error == boost::asio::error::message_size) {
                boost::shared_ptr<std::string> message(
                        new std::string("dsdsad\n"));

                socket_.async_send_to(boost::asio::buffer(*message), remote_endpoint_,
                        boost::bind(&UdpClient::handle_send, this, message,
                        boost::asio::placeholders::error,
                        boost::asio::placeholders::bytes_transferred));
                
                start_receive();
            }
        }*/

    }
}
