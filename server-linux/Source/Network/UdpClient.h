
#include <iostream>
#include <boost/array.hpp>
#include <boost/asio.hpp>
#include <boost/bind.hpp>
#include <boost/shared_ptr.hpp>


#include <string>
using namespace std;
using boost::asio::ip::udp;
namespace Network {
	class UdpClient{
			private:
			udp::socket* socket_;
  			udp::endpoint remote_endpoint_;
  			boost::array<char, 1> recv_buffer_;
			boost::asio::io_service* io_service;
			
			void start_receive();
			void handle_receive(const boost::system::error_code& error,std::size_t /*bytes_transferred*/);
			void handle_send(boost::shared_ptr<std::string> /*message*/,const boost::system::error_code& /*error*/,std::size_t /*bytes_transferred*/);
			public:
			UdpClient();
			void runService();
			void SendMessage(string in);
			void runClient();
			~UdpClient();
	};
}
