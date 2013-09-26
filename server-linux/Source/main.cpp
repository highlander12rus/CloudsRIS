#include "DataBase/SingletoneConn.h"
#include "DataBase/Tables/ServerFiles.h"
#include "FileSystem/Block.h"

//tmp include
#include "Config.h"
#include <string>
#include "Network/UdpServer.h"
#include "Network/UdpCli.h"
#include <boost/thread.hpp>
#include <boost/bind.hpp>
#include <stdlib.h>

using namespace FileSystem::Block;
using boost::asio::ip::udp;


void send_to_socket(udp_server& server)
{

  while(1) 
  {
    int n;
    std::cout << "Enter chislo" << endl;
    std::cin >> n;
	server.send();
	std::cout << "data was send" << endl;
	sleep(5);
  }
}



void serverPort()
{
	boost::asio::io_service io_service;
	string g = "once address";	
	udp::endpoint listenAddress (boost::asio::ip::udp::v4() , PORT_LISTEN);
	udp_server server(io_service, listenAddress, g);
	io_service.run();
}

int main(int argc, char *argv[])
{
		
  	boost::asio::io_service io_service;
  	
  	string g = "server brotcast";
  	
  	udp::endpoint listenaddress (boost::asio::ip::address_v4::broadcast(), PORT_BROATCAST);
	udp_server server(io_service, listenaddress, g);
	
	
	boost::thread_group threads;
	threads.create_thread(boost::bind(send_to_socket, boost::ref(server) ));
	threads.create_thread(serverPort);

	io_service.run();
	threads.join_all();
	
	return 0;
}




