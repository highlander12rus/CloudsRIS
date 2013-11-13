#pragma once
#include <string>

#include <boost/asio.hpp>
#include <boost/array.hpp>
#include <boost/bind.hpp>


#include "StructUdpBroatcastRecive.h"
#include "StructUdpReceiveOtherServer.h"
#include "../Helper/Network.h"
#include "../Config.h"

using boost::asio::ip::udp;
namespace Network {
    namespace Udp {
        
        class UdpBroatcast {
        public:
            UdpBroatcast(boost::asio::io_service& io_service,
                    udp::endpoint& listenAddress);
            
            void sendFreeSpaceRequest(UdpBroatcastRecive& recive);
            
            ~UdpBroatcast();
            
            udp::socket* getSocket();
    

            void start_receive();
            
        protected:
            void handle_receive(const boost::system::error_code& error,
                    std::size_t bytes_transferred);
            
            void handle_send(const boost::system::error_code& error,
                    std::size_t bytes_transferred);

       
            /**
             * Структура котoрую требутся принять
             */
            char* recv_buffer_;
            udp::socket socket_;
            udp::endpoint remote_endpoint_;

        };


    }
}