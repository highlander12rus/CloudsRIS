#pragma once
#include <boost/array.hpp>
#include <boost/bind.hpp>
#include <boost/shared_ptr.hpp>
#include <boost/asio.hpp>
#include <iostream>

#include "../Config.h"
#include "UdpClient.h"

using namespace std;
using boost::asio::ip::udp;

namespace Network {
    namespace Udp {

        class UdpServer {
        public:

            /**
             * 
             * @param io_service
             * @param listenAddress
             * @param bind function call when was data recive
             */
            udp_server(boost::asio::io_service& io_service, udp::endpoint& listenAddress);

        protected:
            virtual void handle_receive(const boost::system::error_code& error,
                    std::size_t bytes_transferred) = 0;

            start_receive();
        protected:
            udp::socket socket_;
            udp::endpoint remote_endpoint_;
            boost::array<char, 1> recv_buffer_;
        };
    }
}