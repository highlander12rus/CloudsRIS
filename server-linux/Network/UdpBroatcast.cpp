#pragma once

#include <boost/log/trivial.hpp>

#include <iostream>
#include <string>
#include <boost/filesystem.hpp> 
#include "UdpBroatcast.h"


namespace Network {
    namespace Udp {

        UdpBroatcast::UdpBroatcast(boost::asio::io_service& io_service,
                udp::endpoint& listenAddress) :
        socket_(io_service, listenAddress) {
            socket_.set_option(boost::asio::ip::udp::socket::reuse_address(true));
            boost::asio::socket_base::broadcast option(true);
            socket_.set_option(option);
            recv_buffer_ = new char[sizeof (UdpBroatcastRecive)];
            start_receive();
        }

        void UdpBroatcast::sendFreeSpaceRequest(UdpBroatcastRecive& reciver) {
            char* ipString = Helper::Network::ipIntToString(reciver.ip);

            boost::asio::ip::udp::endpoint sender_ep(boost::asio::ip::address::from_string(ipString), reciver.port);

            //опредяем свободынй размер
            boost::filesystem::path p(PATH_TO_BLOCK);
            unsigned long long freeSpaceL = 0;
            try {
                boost::filesystem::space_info s = boost::filesystem::space(p);
                freeSpaceL = s.free;
            } catch (boost::filesystem::filesystem_error &e) {
                BOOST_LOG_TRIVIAL(error) << e.what();
            }
            
            
            if (freeSpaceL > BLOCK_SIZE) {
                //@todo: предпологаем, что сервера живы и июазем это только для посика бльших файлов:)
                if(freeSpaceL > reciver.fileSize) {
                    freeSpaceL = reciver.fileSize;
                } else {
                    //расчет сколько блоков можно вместить
                    int countBlock = freeSpaceL / BLOCK_SIZE;
                    freeSpaceL = countBlock * BLOCK_SIZE;
                }
                
                Udp::UdpReceiveOtherServer freeSpace(freeSpaceL);
                socket_.async_send_to(boost::asio::buffer((char*) &freeSpace, sizeof (UdpReceiveOtherServer)),
                        sender_ep, boost::bind(&UdpBroatcast::handle_send, this,
                        boost::asio::placeholders::error,
                        boost::asio::placeholders::bytes_transferred)
                        );
            }

            delete[] ipString;
        }

        void UdpBroatcast::handle_receive(const boost::system::error_code& error,
                std::size_t bytes_transferred) {

            if (!error || error == boost::asio::error::message_size) {
                UdpBroatcastRecive reciver = *((UdpBroatcastRecive*) recv_buffer_); //hack преобразование из байтов в стурктуру
                sendFreeSpaceRequest(reciver);

                start_receive();
            }
        }

        void UdpBroatcast::handle_send(
                const boost::system::error_code& error,
                std::size_t bytes_transferred) {
            //После отправки ничего не делаем

        }

        void UdpBroatcast::start_receive() {
            socket_.async_receive_from(
                    boost::asio::buffer(recv_buffer_, sizeof (UdpBroatcastRecive)), remote_endpoint_,
                    boost::bind(&UdpBroatcast::handle_receive, this,
                    boost::asio::placeholders::error,
                    boost::asio::placeholders::bytes_transferred));
        }

        UdpBroatcast::~UdpBroatcast() {
            delete[] recv_buffer_;
        }
    }
}