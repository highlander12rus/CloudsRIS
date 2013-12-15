#include "Config.h"
#include <string>
#include <exception>

#include <boost/log/trivial.hpp>

#include <boost/asio.hpp>
#include <boost/thread.hpp>
#include "Network/UdpBroatcast.h"

#include <iostream>
#include <boost/array.hpp>
#include "redis/RedisAdaptor.h"
#include "Interface/CurrentBaseOperations/ICurrentBaseOperationEditor.h"
#include "Network/TcpServer.h"

using boost::asio::ip::udp;

/**
 * Поток котоырй слушает broatcast и ждет приема на него
 */
void broatcastTaskRecive() {
    boost::asio::io_service io_service;

    udp::endpoint listenaddress(boost::asio::ip::address_v4::broadcast(), PORT_BROATCAST);
    Network::Udp::UdpBroatcast server(io_service, listenaddress);
    io_service.run();

}

void startTcpServer() {
    boost::asio::io_service io_service;

    IBaseEditor * IRedis = new redis::RedisAdaptor(&redis::RedisConnection::Instance());
    
    Network::Tcp::TcpServer serv(&io_service, IRedis, Database::SingletoneConn::Instance().getConnection());
    io_service.run();
}


int main(int argc, char *argv[]) {
   
    BOOST_LOG_TRIVIAL(debug) << "Start Server";
    boost::thread_group threads;
    //threads.create_thread(boost::bind(broatcastTaskRecive, boost::cref(io_service)));
    threads.create_thread(broatcastTaskRecive);
    threads.create_thread(startTcpServer);
    

    threads.join_all();

    return 0;
}



