#include "DataBase/SingletoneConn.h"
#include "DataBase/Tables/ServerFiles.h"
#include "FileSystem/Block.h"

//tmp include
#include <string>
#include "Network/UdpServer.h"
#include "Network/UdpCli.h"
#include <boost/thread.hpp>
#include <boost/bind.hpp>
#include <stdlib.h>

using namespace FileSystem::Block;

void send_to_socket(udp_server &server)
{
  //boost::asio::io_service io_service;
  //udp_client client(io_service);
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

int main(int argc, char *argv[])
{
		
  	boost::asio::io_service io_service;
  	
  	
	udp_server server(io_service);
	
	
	boost::thread_group threads;
	threads.create_thread(boost::bind(send_to_socket, boost::ref(server) ));
	///threads.join_all();

	io_service.run();
	
	return 0;
}
