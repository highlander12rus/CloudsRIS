#pragma once
#include <boost/array.hpp>
#include <boost/bind.hpp>
#include <boost/shared_ptr.hpp>
#include <boost/asio.hpp>
#include <iostream>
using namespace std;
using boost::asio::ip::udp;

class udp_client
{


public:
 //udp::endpoint(boost::asio::ip::address_v4::broadcast(), 13)
  udp_client(boost::asio::io_service& io_service)
    : socket_(io_service)
  {
    socket_.open(udp::v4());
    socket_.set_option(boost::asio::ip::udp::socket::reuse_address(true));
	boost::asio::socket_base::broadcast option(true);
	socket_.set_option(option);

  }
  
  
   void send(string messageStr, udp::endpoint& address) 
  {
  		boost::shared_ptr<std::string> message(
          new std::string(messageStr));
   
  		socket_.async_send_to(boost::asio::buffer(*message), address,
          boost::bind(&udp_client::handle_send, this, message,
            boost::asio::placeholders::error,
            boost::asio::placeholders::bytes_transferred));
  }
  
  void start_receive()
  {
    socket_.async_receive_from(
        boost::asio::buffer(recv_buffer_), remote_endpoint_,
        boost::bind(&udp_client::handle_receive, this,
          boost::asio::placeholders::error,
          boost::asio::placeholders::bytes_transferred));
  }


	

private:

  

  void handle_receive(const boost::system::error_code& error,
      std::size_t /*bytes_transferred*/)
  {
    if (!error || error == boost::asio::error::message_size)
    {
      boost::shared_ptr<std::string> message(
          new std::string("dsdsad\n"));

      socket_.async_send_to(boost::asio::buffer(*message), remote_endpoint_,
          boost::bind(&udp_client::handle_send, this, message,
            boost::asio::placeholders::error,
            boost::asio::placeholders::bytes_transferred));
		cerr<<"handle receive"<<endl;
      //start_receive();
    }
  }	  

  void handle_send(boost::shared_ptr<std::string> /*message*/,
      const boost::system::error_code& /*error*/,
      std::size_t /*bytes_transferred*/)
  {
  	std::cout << "data was send" <<endl;
  }

  udp::socket socket_;
  udp::endpoint remote_endpoint_;
  boost::array<char, 1> recv_buffer_;
};
