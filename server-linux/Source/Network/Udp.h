#include <boost/asio.hpp>
#include <boost/bind.hpp>

using boost::asio::ip::udp;
namespace Network 
{
	class Udp
	{
		private:
			int portListen;
		    int portReceive;
			boost::asio::io_service* io_service;
			udp::socket* socket;
			
		public:
			Udp(int portlisten, int portReceive);
			void sendBroadcast();
			void runReceive();
			void runClient();
			void runServer() ;
			void sendBrotcast(boost::array<char, 1024>* data);
			void pollServers();
			~Udp();		
			
			void handle_sendBroatcast(const boost::system::error_code& error, std::size_t bytes_transferred ); 
			void handle_receive_from (const boost::system::error_code& error, std::size_t bytes_transferred );
		
	};
}
