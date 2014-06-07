
#include <boost/asio/error.hpp>

#include "TcpServerBk.h"

namespace Network {
    namespace Tcp {

        unsigned int TcpServerBk::sCountConnection = 0;

        TcpServerBk::TcpServerBk(boost::asio::io_service* io_service, Config* config,
                MongoGlobal* mongoGlobal, MongoLocal* mongoLocal, tcp::endpoint& endPoint) {
            this->io_service = io_service;

            //unsigned short port_listen = config->getProperty<unsigned short>("TCP.port_listen");
            //BOOST_LOG_TRIVIAL(debug) << "Start TCP server in port =" << port_listen;

            m_pAcceptor = new tcp::acceptor(*io_service, endPoint/*tcp::endpoint(/*tcp::v4(), port_listen)*/);
            m_pConfig = config;
            m_pMongoGlobal = mongoGlobal;
            m_pMongoLocal = mongoLocal;

            start_accept();
        }

        void TcpServerBk::start_accept() {
            Bk::pointer new_connection =
                    Bk::create(io_service, m_pConfig, m_pMongoGlobal, m_pMongoLocal);

            m_pAcceptor->async_accept(new_connection->socket(),
                    boost::bind(&TcpServerBk::handle_accept, this, new_connection,
                    boost::asio::placeholders::error));
        }

        void TcpServerBk::handle_accept(Bk::pointer new_connection,
                const boost::system::error_code& error) {
            BOOST_LOG_TRIVIAL(debug) << "Connected new clients, errors code=" << error;
            if (!error) {
                //TcpServerBk::sCountConnection++;
                //BOOST_LOG_TRIVIAL(debug) << "Connection clients count =" << TcpServerBk::sCountConnection;
                BOOST_LOG_TRIVIAL(debug) << "2";
                new_connection->start();
                start_accept();
            } 
        }



    }
}