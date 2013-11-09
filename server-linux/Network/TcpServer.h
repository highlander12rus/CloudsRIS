#pragma once

#include "../Config.h"
#include "TcpSession.h"

#include <boost/bind.hpp>
#include <boost/shared_ptr.hpp>
#include <boost/enable_shared_from_this.hpp>
#include <boost/asio.hpp>
#include "../DataBase/SingletoneConn.h"
#include "../Interface/CurrentBaseOperations/ICurrentBaseOperationEditor.h"
#include "../DataBase/Tables/ServerFiles.h"
using boost::asio::ip::tcp;


namespace Network {
    namespace Tcp {

        class TcpServer {
        public:

            TcpServer(boost::asio::io_service* io_service, IBaseEditor * rI,Connection* connect);

        private:

            void start_accept();

            void handle_accept(TcpSession::pointer new_connection,
                    const boost::system::error_code& error);

            tcp::acceptor acceptor_;
            boost::asio::io_service* io_service;
            IBaseEditor * redisInstance;
            Connection* conn;
        };

    }
}