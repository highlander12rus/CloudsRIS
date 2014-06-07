
#include <iostream>
#include <cstdlib>
#include <string>



#include "Database/MongoDB.h"
#include "Database/MongoGlobal.h"
#include "Database/MongoLocal.h"

#include "Config.h"
#include "Network/TcpServerBk.h"
#include "Network/TcpServerDownload.h"
#include "Network/TcpServerUpload.h"

#include "Network/UdpBroatcast.h"

#include <boost/log/trivial.hpp>
#include <boost/asio.hpp>
#include <boost/thread.hpp>


using namespace Database;
using boost::asio::ip::udp;
using namespace std;
using boost::asio::ip::tcp;

void broatcastTaskRecive() {
    boost::asio::io_service io_service;
    Config* config = &(Config::Instance());

    unsigned short port = config->getProperty<unsigned short>("UDP.port_broadcast");
    udp::endpoint listenaddress(boost::asio::ip::address_v4::broadcast(), port);
    Network::Udp::UdpBroatcast server(io_service, listenaddress, config);
    io_service.run();
}

void startTcpServerUpload() {
     boost::asio::io_service io_service;
    Config* config = &(Config::Instance());

    unsigned short bindIp = config->getProperty<unsigned short>("TCP.port_listen_upload");
    
    MongoGlobal* mongoGlobal = &(MongoGlobal::sInstance());
    MongoLocal* mongoLocal = &(MongoLocal::sInstance());

    string ip = config->getProperty<string>("Others.ip");
    tcp::endpoint endPoint (boost::asio::ip::address_v4::from_string(ip), bindIp);
    
    Network::Tcp::TcpServerUpload serv(&io_service, config, mongoGlobal, mongoLocal, endPoint);
    io_service.run();
}

void startTcpServerDownload() {
     boost::asio::io_service io_service;
    Config* config = &(Config::Instance());

    unsigned short bindIp = config->getProperty<unsigned short>("TCP.port_listen_download");   
    
    MongoGlobal* mongoGlobal = &(MongoGlobal::sInstance());
    MongoLocal* mongoLocal = &(MongoLocal::sInstance());

    tcp::endpoint endPoint (tcp::v4(), bindIp);
    Network::Tcp::TcpServerDownload serv(&io_service, config, mongoGlobal, mongoLocal,  endPoint);
    io_service.run();
}

void startTcpServerBackup() {
    boost::asio::io_service io_service;
    Config* config = &(Config::Instance());

    unsigned short bindIp = config->getProperty<unsigned short>("TCP.port_listen_backup"); 
    
    MongoGlobal* mongoGlobal = &(MongoGlobal::sInstance());
    MongoLocal* mongoLocal = &(MongoLocal::sInstance());

    tcp::endpoint endPoint (tcp::v4(), bindIp);
    Network::Tcp::TcpServerBk serv(&io_service, config, mongoGlobal, mongoLocal,  endPoint);
    io_service.run();
}

int main(int argc, const char **argv) {

    BOOST_LOG_TRIVIAL(debug) << "Server was started";

    boost::thread_group threads;
    threads.create_thread(broatcastTaskRecive);
    
    threads.create_thread(startTcpServerUpload);
    threads.create_thread(startTcpServerBackup);
    threads.create_thread(startTcpServerDownload);
    

    threads.join_all();

    return EXIT_SUCCESS;
}