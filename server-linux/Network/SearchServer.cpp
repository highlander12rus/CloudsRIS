#include "SearchServer.h"

#include <iostream>
namespace Network {

    SearchServer::SearchServer(unsigned long fileSize, char* curentIp, unsigned int fileId) {
        this->fileSize = fileSize;
        this->curentIp = curentIp;
        this->fileId = fileId;
    }

    void SearchServer::search() {
        boost::asio::io_service io_service;

        Udp::UdpOnce* once = createOnce(io_service);
        std::cout << "Port get Once  " << once->getPort() << std::endl;
        unsigned short port = once->getPort();

        //@todo group_add_servers мб надо очищать?
        //запуск слушанья на открытом порту
        std::cout << "start un thrads reciver" << std::endl;
        boost::thread reciverThread(boost::bind(&SearchServer::reciverThreads, this,
                boost::ref(once)));

        sendBrotcast(port);
        
        sleep(/*WAITING_RESPONSE_TIME_UDP*/ 8);
        std::cout << "sleep complited, stop hreads reciver" << std::endl;
        io_service.stopped();
        //reciverThread.interrupt();
       // group_add_servers.join_all(); //ждем завершение обработки
        std::cout << "stop waaiting receive" << std::endl;
        delete once;
        //reciverThreads(socket);
    }

    SearchServer::~SearchServer() {
    }

    void SearchServer::sendBrotcast(unsigned short port) {
        uint32_t ip = Helper::Network::ipAddresToInt(curentIp);
        Udp::UdpBroatcastRecive brotcastSend(ip, port, fileSize, fileId);
        std::cout << "real ports" << port << std::endl << "real ip=" << ip << std::endl << "filesize=" << fileSize << std::endl;
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

        } while (was_send < sizeof (Udp::UdpBroatcastRecive)); //@todo: мб должно быть равенство
        std::cout << "data was send broadcast " << std::endl;

    }

    void SearchServer::reciveReponceIntoPort(boost::asio::ip::udp::socket& socket) {



    }

    void SearchServer::reciverThreads(Udp::UdpOnce* once) {
        once->start_receive();
        std::cout << "start service" << std::endl;
        once->getService().run();
    }

    void SearchServer::threadProccessingStruct(const Udp::UdpReceiveOtherServer& receiver) {
        std::cerr << "threadProccessingStruct:"
                << "Udp::UdpReceiveOtherServer.block_id="
                << receiver.block_id << std::endl
                << "offset=" << receiver.offset << std::endl
                << "length" << receiver.length << std::endl;

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

