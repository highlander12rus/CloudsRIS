#pragma once

#include <boost/log/trivial.hpp>

#include "UdpOnce.h"
#include "StructUdpReceiveOtherServer.h"
namespace Network {
    namespace Udp {

        UdpOnce::UdpOnce(boost::asio::io_service& io_service,
                udp::endpoint& listenAddress) : socket_(io_service, listenAddress) {
           
            recv_buffer_=  new char[sizeof(UdpReceiveOtherServer)];
            this->listenAddress = listenAddress;
            //start_receive();
        }
        boost::asio::io_service& UdpOnce::getService() {
            return socket_.get_io_service();
        }
        
        unsigned short UdpOnce::getPort() {
            return listenAddress.port();
        }
        
        void UdpOnce::handle_receive(const boost::system::error_code& error,
                    std::size_t bytes_transferred) {
            if (!error || error == boost::asio::error::message_size) {
                 
                UdpReceiveOtherServer reciver = *((UdpReceiveOtherServer*) recv_buffer_);
                 BOOST_LOG_TRIVIAL(debug) << "handle_receive Udp Once, fileSize=" << reciver.freeSpace;
                
                start_receive();
            }
        }

        void UdpOnce::start_receive() {
            socket_.async_receive(
                    boost::asio::buffer(recv_buffer_, sizeof(UdpReceiveOtherServer)),
                    boost::bind(&UdpOnce::handle_receive, this,
                    boost::asio::placeholders::error,
                    boost::asio::placeholders::bytes_transferred));
        }
        
        UdpOnce::~UdpOnce() {
            delete[] recv_buffer_;
        }
    }
}

