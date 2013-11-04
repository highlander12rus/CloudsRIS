#include "SearchServer.h"

#include <iostream>
namespace Network {

    SearchServer::SearchServer(unsigned long fileSize, char* curentIp) {
        this->fileSize = fileSize;
        this->curentIp = curentIp;
    }

    void SearchServer::search() {
        boost::asio::io_service io_service;
        boost::asio::ip::udp::socket socket(io_service);

        unsigned short port = randomPort(socket);
        sendBrotcast(port);
    }

    SearchServer::~SearchServer() {
    }

    void SearchServer::sendBrotcast(unsigned short port) {
        uint32_t ip = ipAddresToInt(curentIp);
        Udp::UdpBroatcastRecive brotcastSend(ip, port, fileSize);
        std::cout << "real ports" << port <<std::endl << "real ip=" << ip << std::endl<< "filesize=" << fileSize <<std::endl;
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
        std::cout << "start send tobroatcast" << std::endl;
        do {
            was_send += socket.send_to(boost::asio::buffer((char*) &brotcastSend, sizeof (Udp::UdpBroatcastRecive)),
                    sendAddress);

        } while (was_send <= sizeof (Udp::UdpBroatcastRecive)); //@todo: мб меньшее
        std::cout << "data was send broadcast " <<  std::endl;
        //socket.close();

    }

    void SearchServer::reciveReponceIntoPort() {
    }

    unsigned short SearchServer::randomPort(boost::asio::ip::udp::socket & socket) {
        if (portError > MAX_CONNECTION_ERROR_PORT) {
            throw new Exception::Network::Udp::MaxSearchPort();
        }

        boost::random::mt19937 gen;
        boost::random::uniform_int_distribution<> dist(5000, 65000);

        try {
            int port = dist(gen);
            boost::asio::ip::udp::endpoint receiver_endpoint(boost::asio::ip::udp::v4(), port);
            socket.open(boost::asio::ip::udp::v4());
            return static_cast<unsigned short> (port);
        } catch (std::exception & e) {
            //it is shit, very shit
            randomPort(socket);
        }

    }

    uint32_t SearchServer::ipAddresToInt(char* ipStr) {
        struct sockaddr_in sa;
        inet_pton(AF_INET, ipStr, &(sa.sin_addr));
        return sa.sin_addr.s_addr;
    }

    char* SearchServer::ipIntToString(uint32_t ip) {
        char str[INET_ADDRSTRLEN];
        inet_ntop(AF_INET, &ip, str, INET_ADDRSTRLEN);
        return str;
    }

}

