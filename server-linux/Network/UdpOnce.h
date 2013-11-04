#pragma once


#include "UdpServer.h"

namespace Network {
    namespace Udp {

        class UdpOnce : public UdpServer  {
        public:
            UdpOnce(boost::asio::io_service& io_service,
                    udp::endpoint& listenAddress);

            ~UdpOnce();



             void handle_send(boost::shared_ptr<std::string> message,
                    const boost::system::error_code& error,
                    std::size_t bytes_transferred);

        protected:
           void handle_receive(boost::system::error_code& error,
                    std::size_t bytes_transferred);
        private:

        };
    }
}



