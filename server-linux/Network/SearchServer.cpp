#include <boost/log/trivial.hpp>

#include "SearchServer.h"

#include <iostream>
namespace Network {

    SearchServer::SearchServer(unsigned long fileSize, char* curentIp) {
        this->fileSize = fileSize;
        this->curentIp = curentIp;
    }

    void SearchServer::search() {
        boost::asio::io_service io_service;

        Udp::UdpOnce* once = createOnce(io_service);
        unsigned short port = once->getPort();

        //запуск слушанья на открытом порту
        boost::thread reciverThread(boost::bind(&SearchServer::reciverThreads, this,
                boost::ref(once)));

        sendBrotcast(port);

        sleep(WAITING_RESPONSE_TIME_UDP);
        BOOST_LOG_TRIVIAL(debug) << "sleep complited, stop hreads reciver";
        io_service.stopped();
        BOOST_LOG_TRIVIAL(debug) << "stop waaiting receive";
         
         //Поулчаем список серверов
        std::vector<ServersResponce> servers = once->getServers();
        BOOST_LOG_TRIVIAL(debug) << "start print servers";
        for(std::vector<ServersResponce>::iterator it = servers.begin(); it != servers.end(); it++) {
            BOOST_LOG_TRIVIAL(debug) << "iteration servers ip =" << (*it).ip;
        }
        BOOST_LOG_TRIVIAL(debug) << "end print servers";
        
        delete once;
    }

    SearchServer::~SearchServer() {
    }
    
    std::vector<ServersResponce> SearchServer::getServers() {
        return this->servers_;
    }

    void SearchServer::sendBrotcast(unsigned short port) {
        uint32_t ip = Helper::Network::ipAddresToInt(curentIp);
        Udp::UdpBroatcastRecive brotcastSend(ip, port, fileSize);
        BOOST_LOG_TRIVIAL(debug) << "real ports" << port << std::endl << "real ip=" << ip << std::endl << "filesize=" << fileSize;
        //send message brotcast
        boost::asio::io_service io_service_brotcast;
        boost::asio::ip::udp::socket socket(io_service_brotcast);
        socket.open(boost::asio::ip::udp::v4());
        socket.set_option(boost::asio::ip::udp::socket::reuse_address(true));
        boost::asio::socket_base::broadcast option(true);
        socket.set_option(option);

        boost::asio::ip::udp::endpoint sendAddress(boost::asio::ip::address_v4::broadcast(),
                PORT_BROATCAST);

        std::size_t was_send = 0;
         BOOST_LOG_TRIVIAL(debug) << "start send tobroatcast";
        do {
            was_send += socket.send_to(boost::asio::buffer((char*) &brotcastSend, sizeof (Udp::UdpBroatcastRecive)),
                    sendAddress);

        } while (was_send < sizeof (Udp::UdpBroatcastRecive));
         BOOST_LOG_TRIVIAL(debug) << "data was send broadcast ";

    }

    void SearchServer::reciverThreads(Udp::UdpOnce* once) {
        once->start_receive();
         BOOST_LOG_TRIVIAL(debug) << "start service";
        once->getService().run();
    }

    Udp::UdpOnce* SearchServer::createOnce(boost::asio::io_service& io_service) {
        if (portError > MAX_CONNECTION_ERROR_PORT) {
            throw new Exception::Network::Udp::MaxSearchPort();
        }

        boost::random::mt19937 gen;
        boost::random::uniform_int_distribution<> dist(5000, 65000);

        int port = dist(gen);
        boost::asio::ip::udp::endpoint receiver_endpoint(boost::asio::ip::address_v4::from_string("127.0.0.1"),
                port);
        Udp::UdpOnce* once = new Udp::UdpOnce(io_service, receiver_endpoint);
        return once;
    }
}

