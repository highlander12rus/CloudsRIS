#pragma once
/* 
 * File:   UdpOnce.cpp
 * Author: vfs
 * 
 * Created on 29 Сентябрь 2013 г., 1:33
 */

#include "UdpOnce.h"
namespace Network {
    namespace Udp {

        UdpOnce::UdpOnce(boost::asio::io_service& io_service,
                udp::endpoint& listenAddress) :
        UdpServer(io_service, listenAddress) {

        }

        void UdpOnce::handle_receive(boost::system::error_code& error,
                std::size_t bytes_transferred) {
            if (!error || error == boost::asio::error::message_size) {
                 Event::UdpOnceEvent::Instance().runAll(error, bytes_transferred);
                start_receive();
            }
        }

        void UdpOnce::handle_send(boost::shared_ptr<std::string> message,
                const boost::system::error_code& error,
                std::size_t bytes_transferred) {

        }

        UdpOnce::~UdpOnce() {
        }
    }
}

