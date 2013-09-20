#include "Udp.h"
#include <iostream>

using namespace std;

namespace Network 
{

	Udp::Udp(int portlisten, int portReceive)
	{
		this->portListen = portListen;
		this->portReceive = portReceive;
		io_service = new boost::asio::io_service();
	}
	
	void Udp::runClient()
	{
 
		/*	//boost::asio::io_service io_service;

			udp::endpoint receiver_endpoint = udp::endpoint(boost::asio::ip::address_v4::broadcast(), 13);

		//TUTU TIP OBIVL
			udp::socket socket(*io_service);
			socket->open(udp::v4());

			socket->set_option(boost::asio::ip::udp::socket::reuse_address(true));
			boost::asio::socket_base::broadcast option(true);
			socket->set_option(option);

			boost::array<char, 1> send_buf  = {{ 0 }};
			socket->send_to(boost::asio::buffer(send_buf), receiver_endpoint);

			boost::array<char, 128> recv_buf;
			udp::endpoint sender_endpoint;
			size_t len = socket->receive_from(
				boost::asio::buffer(recv_buf), sender_endpoint);

			std::cout.write(recv_buf.data(), len);*/
		
	}
	
	void Udp::runServer() 
	{
	    socket = new udp::socket(*io_service, udp::endpoint(boost::asio::ip::address_v4::broadcast(), 13));
  
		socket->set_option(boost::asio::ip::udp::socket::reuse_address(true));
		boost::asio::socket_base::broadcast option(true);
		socket->set_option(option);
		
		runReceive();
	
		
		
		/*while(1)
		{
		
		  boost::array<char, 1> recv_buf;
		cout << 4 << endl;
		  udp::endpoint remote_endpoint;
		  boost::system::error_code error;
		  socket->receive_from(boost::asio::buffer(recv_buf),
		      remote_endpoint, 0, error);

		  if (error && error != boost::asio::error::message_size)
		    throw boost::system::system_error(error);

		  std::string message = "Lolol \n";

		  boost::system::error_code ignored_error;
		  /*socket->send_to(boost::asio::buffer(message),
		      remote_endpoint, 0, ignored_error);
		}*/
	}
	
	void runReceive() 
	{
		boost::array<char, 1> recv_buf;
		udp::endpoint remote_endpoint;
		socket->async_receive_from(
          boost::asio::buffer(recv_buf), remote_endpoint,
          boost::bind(&Udp::handle_receive_from, this,
            boost::asio::placeholders::error,
            boost::asio::placeholders::bytes_transferred));
	}
	
	void Udp::sendBroadcast()
	{
		std::string message = "Lolol \n";
		socket->async_send(boost::asio::buffer(message), 
		boost::bind(&Udp::handle_sendBroatcast, this,
          boost::asio::placeholders::error,
          boost::asio::placeholders::bytes_transferred));
	}
	

	void Udp::handle_sendBroatcast (
 		 const boost::system::error_code& error, // Result of operation.
  		std::size_t bytes_transferred           // Number of bytes sent.
	)
	{
			if (error && error != boost::asio::error::message_size)
		    	throw boost::system::system_error(error);
		    
			cout << "Udp::handle_sendBroatcast" << endl;
			runReceive();
	}
	
	void Udp::handle_receive_from (
 		 const boost::system::error_code& error, // Result of operation.
  		std::size_t bytes_transferred           // Number of bytes sent.
	)
	{
			cout << "Udp::handle_receive_from" << endl;
	}
	
	
	void Udp::sendBrotcast(boost::array<char, 1024>* data)
	{
	
	}
	
	void Udp::pollServers()
	{
	
	}
	
	Udp::~Udp()
	{
		delete io_service, socket;
	}		
		
	
}
