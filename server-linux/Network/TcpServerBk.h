#pragma once

#include "../Config.h"
#include "./Operatinos/Bk.h"

#include <boost/bind.hpp>
#include <boost/shared_ptr.hpp>
#include <boost/enable_shared_from_this.hpp>
#include <boost/asio.hpp>


#include "../Database/MongoGlobal.h"
#include "../Database/MongoLocal.h"


namespace Network {
    namespace Tcp {
        using boost::asio::ip::tcp;
        using namespace Operatinos;
        
        class TcpServerBk {
        public:


            /**
             * Количество подключенных сейчас клиентов(только внешняя сеть)
             */
            static unsigned int sCountConnection;

            /**
             * @param io_service
             * @param config
             * @param mongoGlobal
             * @param mongoLocal
             * @param endPoint адресс на который вешать соединение
             */
            TcpServerBk(boost::asio::io_service* io_service, Config* config, 
            MongoGlobal* mongoGlobal, MongoLocal* mongoLocal, tcp::endpoint& endPoint);

        private:

            /**
             * Запуск ожидания подключения
             */
            void start_accept();

            /**
             * действие при подключение
             * @param new_connection
             * @param error
             */
            void handle_accept(Bk::pointer new_connection,
                    const boost::system::error_code& error);

            tcp::acceptor* m_pAcceptor;
            boost::asio::io_service* io_service;

            Config* m_pConfig;
            MongoGlobal* m_pMongoGlobal;
            MongoLocal* m_pMongoLocal;



        };

    }
}
