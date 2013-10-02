#pragma once
#include <boost/array.hpp>
#include <boost/bind.hpp>
#include <boost/shared_ptr.hpp>
#include <boost/asio.hpp>
#include <iostream>

#include "../Config.h"
#include "UdpCli.h"

using namespace std;
using boost::asio::ip::udp;

class udp_server {
    
   

public:

    /**
     * 
     * @param io_service
     * @param listenAddress
     * @param bind function call when was data recive
     * @param idStr
     */
    udp_server(boost::asio::io_service& io_service, udp::endpoint& listenAddress, string idStr)
    : socket_(io_service, listenAddress) {
        socket_.set_option(boost::asio::ip::udp::socket::reuse_address(true));
        boost::asio::socket_base::broadcast option(true);
        socket_.set_option(option);
        id = idStr;

        start_receive();
    }
    
    

    /**
     * send broatcast message
     * @param bind function call when was send data
     */

    /*void send(boost::bind& bind) 
    {
          udp::endpoint receiver_endpoint = udp::endpoint(boost::asio::ip::address_v4::broadcast(), PORT_BROATCAST);
                  boost::shared_ptr<std::string> message(
            new std::string("send message\n"));
   
                  socket_.async_send_to(boost::asio::buffer(*message), receiver_endpoint,
            boost::bind(&udp_server::handle_send, this, message,
              boost::asio::placeholders::error,
              boost::asio::placeholders::bytes_transferred));
    }*/
protected:
    virtual void handle_receive(const boost::system::error_code& error,
            std::size_t bytes_transferred) = 0;
    
    
    //@TODO: delete
        string id;     
    void start_receive() {
        socket_.async_receive_from(
        boost::asio::buffer(recv_buffer_), remote_endpoint_,
        boost::bind(&udp_server::handle_receive, this,
          boost::asio::placeholders::error,
          boost::asio::placeholders::bytes_transferred));
    }


    /*{
      if (!error || error == boost::asio::error::message_size)
      {
        boost::shared_ptr<std::string> message(
            new std::string("dsdsad\n"));


                  std::cout << "send data to clients....." << endl;
		
                  boost::asio::ip::address_v4 targetIP;
                  targetIP.from_string("192.168.89.130");                 // Configure output IP address. HACKHACK--Hardcoded for Debugging

                  boost::asio::ip::udp::endpoint myEndpoint;                  // Create endpoint on specified IP.
                  myEndpoint.address(targetIP);
                  myEndpoint.port(PORT_LISTEN);
	

                  boost::asio::io_service io_service ;
		
                  udp_client client(io_service);
		
                  string g = "test ";
                  client.send(g, myEndpoint);
                  client.start_receive();
                  io_service.run();
                  cout << "Send client complitefd" << endl;
                
        cerr<<"handle receive "  <<   id << "\n" <<endl;
        start_receive();
      }
    }*/

    /*virtual void handle_send(boost::shared_ptr<std::string> message,
        const boost::system::error_code& error,
        std::size_t bytes_transferred);
    {
    }*/
protected:
    udp::socket socket_;
    udp::endpoint remote_endpoint_;
    boost::array<char, 1> recv_buffer_;
};
