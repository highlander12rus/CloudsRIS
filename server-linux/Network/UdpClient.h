#pragma once
#include <boost/array.hpp>
#include <boost/bind.hpp>
#include <boost/shared_ptr.hpp>
#include <boost/asio.hpp>
#include <iostream>
using namespace std;
using boost::asio::ip::udp;
namespace Network {
    namespace Udp {

        class UdpClient {
        public:
            UdpClient(boost::asio::io_service& io_service);
            void send(string messageStr, udp::endpoint& address);
            void start_receive();

            protected:
            /**
             * 
             * @param error code error
             * @param bytes_transferred receive bytes
             */
            virtual void handle_receive(const boost::system::error_code& error,
                    std::size_t bytes_transferred) = 0;

            virtual void handle_send(unsigned char* /*message*/,
                    const boost::system::error_code& /*error*/,
                    std::size_t /*bytes_transferred*/) = 0;
            
            udp::socket socket_;
            udp::endpoint remote_endpoint_;
            boost::array<unsigned char, 12> recv_buffer_;
        };
    }
}