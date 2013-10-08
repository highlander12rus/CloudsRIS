#pragma once
/* 
 * File:   UdpBroatcast.h
 * Author: vfs
 *
 * Created on 29 Сентябрь 2013 г., 1:23
 */
#include "UdpServer.h"
namespace Network {
    namespace Udp {

        class UdpBroatcast : public UdpServer {
        public:
            UdpBroatcast(boost::asio::io_service& io_service,
                    udp::endpoint& listenAddress);
            void send();
            ~UdpBroatcast();




            void handle_send(boost::shared_ptr<std::string> message,
                    const boost::system::error_code& error,
                    std::size_t bytes_transferred);

        protected:
            void handle_receive(const boost::system::error_code& error,
                    std::size_t bytes_transferred);

        private:

        };


    }
}