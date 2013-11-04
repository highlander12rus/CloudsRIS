#pragma once


#include <iostream>
#include <string>
#include "UdpBroatcast.h"


namespace Network {
    namespace Udp {

        UdpBroatcast::UdpBroatcast(boost::asio::io_service& io_service,
                udp::endpoint& listenAddress) : 
                socket_(io_service, listenAddress) {
            socket_.set_option(boost::asio::ip::udp::socket::reuse_address(true));
            boost::asio::socket_base::broadcast option(true);
            socket_.set_option(option);
            recv_buffer_ = new char[sizeof(UdpBroatcastRecive)];
            start_receive();
        }

        void UdpBroatcast::sendFreeSpaceRequest(UdpBroatcastRecive& recive){
            /*recv_buffer_[0] = recive;
            udp::endpoint receiver_endpoint = udp::endpoint(boost::asio::ip::address_v4::broadcast(), PORT_BROATCAST);
                socket_.async_send_to(boost::asio::buffer(recv_buffer_),  receiver_endpoint,
                    boost::bind(&UdpBroatcast::handle_send, this,
                    boost::asio::placeholders::error,
                    boost::asio::placeholders::bytes_transferred));*/
        }

        udp::socket* UdpBroatcast::getSocket() {
            return &this->socket_;
        }
        
        void UdpBroatcast::handle_receive(const boost::system::error_code& error,
               std::size_t bytes_transferred) {

            if (!error || error == boost::asio::error::message_size) {
                std::cout << "recive data. bytes_transferred=" << bytes_transferred << std::endl;
                
                UdpBroatcastRecive reciver = *(( UdpBroatcastRecive*) recv_buffer_);//hack преобразование из байтов в стурктуру
                std::cout << "ip addres recive=" << reciver.port << std::endl;
                std::cout << "ip recieve=" << reciver.ip << std::endl;
                std::cout << "file size recieve=" << reciver.fileSize  << std::endl;
                
                start_receive();
            }
        }

        void UdpBroatcast::handle_send(
                const boost::system::error_code& error,
                std::size_t bytes_transferred) {
            std::cout << "sending data=" << bytes_transferred << std::endl;
         }
        
        void UdpBroatcast::start_receive() {
            socket_.async_receive_from(
                    boost::asio::buffer(recv_buffer_, sizeof(UdpBroatcastRecive)), remote_endpoint_,
                    boost::bind(&UdpBroatcast::handle_receive, this,
                    boost::asio::placeholders::error,
                    boost::asio::placeholders::bytes_transferred));
        }

        UdpBroatcast::~UdpBroatcast() {

        }
    }
}