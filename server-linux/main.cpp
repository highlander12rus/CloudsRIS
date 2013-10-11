//#include "DataBase/SingletoneConn.h"
//#include "DataBase/Tables/ServerFiles.h"
#include "FileSystem/Block.h"
#include <fstream>

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
#include <boost/filesystem.hpp>
#include "DataBase/SingletoneConn.h"
/*#include "DataBase/Tables/Blocks.h"
#include "DataBase/Tables/SecurityMethod.h"
#include "DataBase/Tables/AddressBlocks.h"*/
#include "FileSystem/AllocatedBlocks.h"
#include "boost/threadpool.hpp"
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
// Some example tasks
void first_task()
{
   std::cout << "first task is running\n" ;
}

void second_task()
{
   std::cout << "second task is running\n" ;
}
int main(int argc, char *argv[]) {
    
    //boost::filesystem::path dir("blockWareHouse");
   // boost::filesystem::create_directory(dir);
    
    //FileSystem::Block::AllocatedBlocks test(23, "127.0.0.1");
    
    // Create fifo thread pool container with two threads.
   boost::threadpool::pool tp(5);
   
   // Add some tasks to the pool.
   tp.schedule(&first_task);
   tp.schedule(&second_task);   
  
   //  Wait until all tasks are finished.
   tp.wait();
    
    
    //Database::Tables::SecurityMethod sm(Database::SingletoneConn::Instance().getConnection());
    //Database::Tables::Blocks bloks(Database::SingletoneConn::Instance().getConnection());
  /* Database::Tables::AddressBlocks test(Database::SingletoneConn::Instance().getConnection());
   sql::ResultSet* testRes =  test.getBlokFreeSpaceId("test", 51201);
   
   while(testRes -> next()) {
       std::cout << testRes->getString(1) << " " << testRes->getUInt(2) << endl;
   }*/
            
    
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



