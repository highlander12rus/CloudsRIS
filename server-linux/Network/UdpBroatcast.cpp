#pragma once
/* 
 * File:   UdpBroatcast.cpp
 * Author: vfs
 * 
 * Created on 29 Сентябрь 2013 г., 1:23
 */

#include "UdpBroatcast.h"
namespace Network {
    namespace Udp {

        UdpBroatcast::UdpBroatcast(boost::asio::io_service& io_service,
                udp::endpoint& listenAddress) :
        UdpServer(io_service, listenAddress) {
        }

        void UdpBroatcast::send(char* buffer, int size) {
            udp::endpoint receiver_endpoint = udp::endpoint(boost::asio::ip::address_v4::broadcast(), PORT_BROATCAST);
            

            /*socket_.async_send_to(boost::asio::buffer(*buffer, size),  receiver_endpoint,
                    boost::bind(&UdpBroatcast::handle_send, this, buffer,
                    boost::asio::placeholders::error,
                    boost::asio::placeholders::bytes_transferred));*/
            socket_.async_send_to(
    boost::asio::buffer(buffer, size), receiver_endpoint, 
                    boost::bind(&UdpBroatcast::handle_send, this,
                    boost::asio::placeholders::error,
                    boost::asio::placeholders::bytes_transferred));
        }

        void UdpBroatcast::handle_receive(boost::system::error_code& error,
                std::size_t bytes_transferred) {

            if (!error || error == boost::asio::error::message_size) {
                 Event::UdpBrotcastEventListener::Instance().runAll(error, bytes_transferred);
                start_receive();
            }
        }

        void UdpBroatcast::handle_send(
                const boost::system::error_code& error,
                std::size_t bytes_transferred) {

        }

        UdpBroatcast::~UdpBroatcast() {

        }
    }
}