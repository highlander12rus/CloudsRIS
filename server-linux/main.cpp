#include "Config.h"
#include <string>
#include <exception>

#include <boost/log/trivial.hpp>

#include <boost/asio.hpp>
#include <boost/thread.hpp>
#include "Network/UdpBroatcast.h"
#include "Network/SearchServer.h"

#include <iostream>
#include <boost/array.hpp>

using boost::asio::ip::udp;

void searchServe() {
    while (1) {
        char ip[] = "127.0.0.1";
        Network::SearchServer search(45, ip);
        search.search();
        sleep(10);
    }
}

/**
 * Поток котоырй слушает broatcast и ждет приема на него
 */
void broatcastTaskRecive() {
    boost::asio::io_service io_service;

    udp::endpoint listenaddress(boost::asio::ip::address_v4::broadcast(), PORT_BROATCAST);
    Network::Udp::UdpBroatcast server(io_service, listenaddress);
    io_service.run();

}


int main(int argc, char *argv[]) { 
    BOOST_LOG_TRIVIAL(debug) << "Hello World";
    boost::thread_group threads;
    //threads.create_thread(boost::bind(broatcastTaskRecive, boost::cref(io_service)));
            threads.create_thread(broatcastTaskRecive);
    threads.create_thread(searchServe);

    threads.join_all();

    return 0;
}



