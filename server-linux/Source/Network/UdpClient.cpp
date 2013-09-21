#include "UdpClient.h"

namespace Network {
	UdpClient::UdpClient()
		{
			io_service=new boost::asio::io_service();
		}
		void UdpClient::SendMessage(string in)
		{
				boost::shared_ptr<std::string> message(new std::string(in));
		  		socket_->async_send_to(boost::asio::buffer(*message), remote_endpoint_,
		     	boost::bind(&UdpClient::handle_send, this, message,
		        boost::asio::placeholders::error,
		        boost::asio::placeholders::bytes_transferred));
		        cerr<<"send message"<<endl;
		}
		
		void UdpClient::runClient()
		{
			socket_=new udp::socket(*io_service, udp::endpoint(boost::asio::ip::address_v4::broadcast(), 13));
			 start_receive();
			 
		}
		void UdpClient::runService()
		{
		io_service->run();
		}
		void UdpClient::start_receive()
	  {
		socket_->async_receive_from(
		    boost::asio::buffer(UdpClient::recv_buffer_), remote_endpoint_,
		    boost::bind(&UdpClient::handle_receive, this,
		      boost::asio::placeholders::error,
		      boost::asio::placeholders::bytes_transferred));
	  }

	  void UdpClient::handle_receive(const boost::system::error_code& error,
		  std::size_t /*bytes_transferred*/)
	  {
		if (!error || error == boost::asio::error::message_size)
		{
		  boost::shared_ptr<std::string> message(
		      new std::string("123\n"));

		  socket_->async_send_to(boost::asio::buffer(*message), remote_endpoint_,
		      boost::bind(&UdpClient::handle_send, this, message,
		        boost::asio::placeholders::error,
		        boost::asio::placeholders::bytes_transferred));

		  start_receive();
		}
	  }

	  void UdpClient::handle_send(boost::shared_ptr<std::string> /*message*/,
		  const boost::system::error_code& /*error*/,
		  std::size_t /*bytes_transferred*/)
	  {
	  cerr<<"send message handle"<<endl;
	  }
	UdpClient::~UdpClient()
	{
		delete io_service, socket_;
	}	  
}
