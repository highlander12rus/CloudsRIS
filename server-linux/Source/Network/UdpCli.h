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
  udp_client(boost::asio::io_service& io_service)
    : socket_(io_service, udp::endpoint(boost::asio::ip::address_v4::broadcast(), 13))
  {
    socket_.set_option(boost::asio::ip::udp::socket::reuse_address(true));
	boost::asio::socket_base::broadcast option(true);
	socket_.set_option(option);

  }
  
  void send() 
  {
  udp::endpoint receiver_endpoint = udp::endpoint(boost::asio::ip::address_v4::broadcast(), 13);
  		boost::shared_ptr<std::string> message(
          new std::string("send message\n"));
   
  		socket_.async_send_to(boost::asio::buffer(*message), receiver_endpoint,
          boost::bind(&udp_client::handle_send, this, message,
            boost::asio::placeholders::error,
            boost::asio::placeholders::bytes_transferred));
  }

private:
  

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
