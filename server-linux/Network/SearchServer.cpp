#include <boost/log/trivial.hpp>

#include "SearchServer.h"

#include <iostream>
namespace Network {

    bool CompareServersResponce (ServersResponce x, ServersResponce y) {
        return x.ip == y.ip;
    }
    
    SearchServer::SearchServer(unsigned long fileSize, char* curentIp, Config* config) {
        this->fileSize = fileSize;
        this->curentIp = curentIp;
        m_Config = config;
    }

    void SearchServer::startPause() {
        long long time = m_Config->getProperty<long long>("UDP.waiting_responce_time_udp");
        struct timespec tim;
        tim.tv_sec = 0;
        tim.tv_nsec = time * NANO_SECOND_MULTIPLIER;
        nanosleep(&tim, NULL);

    }

    void SearchServer::search() {
        boost::asio::io_service* io_service = new boost::asio::io_service();

        Udp::UdpOnce* once = createOnce(*io_service);
        unsigned short port = once->getPort();

        BOOST_LOG_TRIVIAL(debug) << "start udp search, port=" << port;

        //запуск слушанья на открытом порту
        boost::thread reciverThread(boost::bind(&SearchServer::reciverThreads, this,
                boost::ref(once)));

        sendBrotcast(port);


        startPause();

        sleep(2);
        BOOST_LOG_TRIVIAL(debug) << "sleep complited, stop hreads reciver";
        io_service->stop();

        //Поулчаем список серверов
        servers_ = once->getServers();
        BOOST_LOG_TRIVIAL(debug) << "start print servers";
        string curentIp = m_Config->getProperty<string>("Others.ip");
        servers_.erase( unique(servers_.begin(), servers_.end(), CompareServersResponce), servers_.end() ); 
        
  

        for (std::vector<ServersResponce>::iterator it = servers_.begin(); it != servers_.end(); ) {
            //BOOST_LOG_TRIVIAL(debug) << "iteration servers ip =" << (*it).ip;
            if ((*it).ip == curentIp) {
                servers_.erase(it);
            } else {
                it++;
            }
        }

        for (std::vector<ServersResponce>::iterator it = servers_.begin(); it != servers_.end(); it++) {
            BOOST_LOG_TRIVIAL(debug) << "iteration servers ip =" << (*it).ip;
        }

        BOOST_LOG_TRIVIAL(debug) << "end print servers";

        delete once;
        delete io_service;
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

        unsigned short port_broadcast = m_Config->getProperty<unsigned short>("UDP.port_broadcast");


        boost::asio::ip::udp::endpoint sendAddress(boost::asio::ip::address_v4::broadcast(), port_broadcast);

        std::size_t was_send = 0;
        BOOST_LOG_TRIVIAL(debug) << "start send to broatcast";
        do {
            try{
            was_send += socket.send_to(boost::asio::buffer((char*) &brotcastSend, sizeof (Udp::UdpBroatcastRecive)),
                    sendAddress);
            } catch (std::exception &e) {
               BOOST_LOG_TRIVIAL(error) << "\nnot send broatcast\n"; 
            }

        } while (was_send < sizeof (Udp::UdpBroatcastRecive));
        BOOST_LOG_TRIVIAL(debug) << "data was send broadcast ";

    }

    void SearchServer::reciverThreads(Udp::UdpOnce* once) {
        once->start_receive();
        BOOST_LOG_TRIVIAL(debug) << "start service";
        once->getService().run();
    }

    Udp::UdpOnce* SearchServer::createOnce(boost::asio::io_service& io_service) {
        BOOST_LOG_TRIVIAL(debug) << "start generate new port for udp search";

        boost::random::mt19937 gen;
        boost::random::uniform_int_distribution<> dist(5000, 65000);

        int port = dist(gen);
        boost::asio::ip::udp::endpoint receiver_endpoint(boost::asio::ip::udp::v4(), port);
        Udp::UdpOnce* once = new Udp::UdpOnce(io_service, receiver_endpoint);
        return once;
    }
}

