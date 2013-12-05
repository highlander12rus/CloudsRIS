#pragma once

#include "StructServersResponce.h"

#include <vector>
#include <string>

#include <boost/asio.hpp>
#include <boost/array.hpp>
#include <boost/bind.hpp>
#include <boost/thread/lock_guard.hpp> 
#include <boost/thread/recursive_mutex.hpp>

using namespace boost::asio::ip;

namespace Network {
    namespace Udp {

        class UdpOnce {
        public:
            UdpOnce(boost::asio::io_service& io_service,
                    udp::endpoint& listenAddress);

            ~UdpOnce();

            /**
             * Запуск прослушивания
             */
            void start_receive();
            unsigned short getPort();
            boost::asio::io_service& getService();
            std::vector<ServersResponce> getServers();

        protected:

            void handle_receive(const boost::system::error_code& error,
                    std::size_t bytes_transferred);
        private:
            char* recv_buffer_;
            udp::socket socket_;
            udp::endpoint remote_endpoint_;
            
           
            std::vector<ServersResponce> servers_;
            
            
            udp::endpoint listenAddress;
            
            //for critical sections
 
            boost::recursive_mutex  m_guard;

        };
    }
}



