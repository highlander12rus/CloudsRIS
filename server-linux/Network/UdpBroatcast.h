#pragma once

#include "UdpServer.h"
#include "../Event/UdpBrotcastEventListener.h"

namespace Network {
    namespace Udp {

        class UdpBroatcast : public UdpServer {
        public:
            UdpBroatcast(boost::asio::io_service& io_service,
                    udp::endpoint& listenAddress);
            void send(char* buffer, int size);
            ~UdpBroatcast();
            
            void handle_send(const boost::system::error_code& error,
                    std::size_t bytes_transferred);

        protected:
            void handle_receive(boost::system::error_code& error,
                    std::size_t bytes_transferred);

        private:

        };


    }
}