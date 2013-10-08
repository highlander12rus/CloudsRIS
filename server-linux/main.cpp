//#include "DataBase/SingletoneConn.h"
//#include "DataBase/Tables/ServerFiles.h"
#include "FileSystem/Block.h"

//tmp include
#include "Config.h"
#include <string>
/*#include "Network/UdpBroatcast.h"
#include "Network/UdpOnce.h"
#include "Network/UdpClient.h"
#include <boost/thread.hpp>
#include <boost/bind.hpp>
#include <stdlib.h>*/


//using namespace FileSystem::Block;
//using boost::asio::ip::udp;

#include "DataBase/SingletoneConn.h"
#include "DataBase/Tables/Blocks.h"
#include "DataBase/Tables/SecurityMethod.h"
/*void send_to_socket(UdpBroatcast& server) {
    while (1) {
        int n;
        std::cout << "Enter chislo" << endl;
        std::cin >> n;
        server.send();
        std::cout << "data was send" << endl;
        sleep(5);
    }
}

void serverPort() {
    boost::asio::io_service io_service;
    string g = "once address";
    
    
    
    
    udp::endpoint listenAddress(boost::asio::ip::udp::v4(), PORT_LISTEN);
    
    
    boost::asio::ip::address_v4 targetIP;
        targetIP.from_string("192.168.89.132"); // Configure output IP address. HACKHACK--Hardcoded for Debugging

        boost::asio::ip::udp::endpoint myEndpoint; // Create endpoint on specified IP.
        myEndpoint.address(targetIP);
        myEndpoint.port(PORT_LISTEN);

    UdpOnce server(io_service, listenAddress, g);
    io_service.run();
}*/

int main(int argc, char *argv[]) {
    Database::Tables::SecurityMethod sm(Database::SingletoneConn::Instance().getConnection());
    Database::Tables::Blocks bloks(Database::SingletoneConn::Instance().getConnection());
  
    
  //  std::cout<<sm.getById(1)<<std::endl;
    /*boost::asio::io_service io_service;

    string g = "server brotcast";

    udp::endpoint listenaddress(boost::asio::ip::address_v4::broadcast(), PORT_BROATCAST);
    UdpBroatcast server(io_service, listenaddress, g);


    boost::thread_group threads;
    threads.create_thread(boost::bind(send_to_socket, boost::ref(server)));
    threads.create_thread(serverPort);

    io_service.run();
    threads.join_all();*/

    return 0;
}



