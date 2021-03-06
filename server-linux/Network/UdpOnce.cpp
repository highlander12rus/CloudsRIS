#pragma once

#include <boost/log/trivial.hpp>

#include "UdpOnce.h"
#include "StructUdpReceiveOtherServer.h"
namespace Network {
    namespace Udp {

        UdpOnce::UdpOnce(boost::asio::io_service& io_service,
                udp::endpoint& listenAddress) : socket_(io_service, listenAddress) {

            recv_buffer_ = new char[sizeof (UdpReceiveOtherServer)];
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
            if (socket_.get_io_service().stopped())
                return;

            if (!error || error == boost::asio::error::message_size) {
                UdpReceiveOtherServer reciver = *((UdpReceiveOtherServer*) recv_buffer_);
                BOOST_LOG_TRIVIAL(debug) << "handle_receive Udp Once, fileSize=" << reciver.freeSpace;

                {
                    //critial section
                    boost::lock_guard<boost::recursive_mutex> lock(m_guard);
                    std::string ip = this->remote_endpoint_.address().to_string();
                    //std::string localIp = listenAddress.address().to_string();
                    BOOST_LOG_TRIVIAL(debug) << "critical section;ip=" << ip;

                    //if (ip != localIp) {
                        ServersResponce responce = ServersResponce(ip, reciver.freeSpace);
                        this->servers_.push_back(responce);
                    //}
                }


                start_receive();
            }
        }

        std::vector<ServersResponce> UdpOnce::getServers() {
            return this->servers_;
        }

        void UdpOnce::start_receive() {
            if (socket_.get_io_service().stopped())
                return;

            socket_.async_receive_from(
                    boost::asio::buffer(recv_buffer_, sizeof (UdpReceiveOtherServer)),
                    remote_endpoint_,
                    boost::bind(&UdpOnce::handle_receive, this,
                    boost::asio::placeholders::error,
                    boost::asio::placeholders::bytes_transferred));
        }

        UdpOnce::~UdpOnce() {
            delete[] recv_buffer_;
        }
    }
}

