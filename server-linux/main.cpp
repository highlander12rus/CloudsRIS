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

#include "redis/RedisAdaptor.h"
#include "Interface/CurrentBaseOperations/ICurrentBaseOperationEditor.h"
#include "Network/TcpServer.h"

#include "redis/RedisConnection.h"

int main(int argc, char *argv[]) {
    
   
    std::cerr << "dsda" << std::endl;
    boost::asio::io_service io_service;
    
    IBaseEditor * IRedis = new redis::RedisAdaptor(&redis::RedisConnection::Instance());
    
    Network::Tcp::TcpServer serv (&io_service,IRedis,Database::SingletoneConn::Instance().getConnection());
    io_service.run();
    
   
    return 0;
}



