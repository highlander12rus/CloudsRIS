#pragma once

#include "../Config.h"
#include "../Exception/MaxSearchPort.h"
#include "StructUdpBroatcastRecive.h"
#include "StructUdpReceiveOtherServer.h"
#include "UdpOnce.h"


#include "../Helper/Network.h"

#include <exception>
#include <iostream>
#include <boost/asio.hpp>
#include <boost/thread/recursive_mutex.hpp>
#include <boost/thread/thread.hpp>
#include <boost/bind.hpp>

//для генерации случайного порта
#include <boost/random/mersenne_twister.hpp>
#include <boost/random/uniform_int_distribution.hpp>

//typedef unsigned int uint32_t;
namespace Network {

    /**
     *  Выполняет поиск места куда загружать файл
     *  ВНИМАНИЕ: Даннаый класс лучше выполнять в другом потоке!
     */
    class SearchServer {
    public:
        /**
         * 
         * @param fileSize размер файла котоырй требуется найти @todo: мб убрать из pапросить из базы?
         * @param curentIp ip адрес текущего компьтера
         * @param fileId id файла из таблицы files
         */
        SearchServer(unsigned long fileSize, char* curentIp, unsigned int fileId);

        /**
         * Запуск поиска
         * @throws Exception::Network::Udp::MaxSearchPort
         * @todo: в будущем будет возращать список серверов
         */
        void search();

        ~SearchServer();
    private:
        unsigned long fileSize;
        char* curentIp;
        unsigned int fileId;


        //for threads jobs
        boost::thread_group group_add_servers;
        boost::recursive_mutex m_guard; //critical section
        //-------

        /**
         * Количество ошибок при открытие порта
         */
        char portError;


        /**
         * Рассылает brotcast сообщенина на досутпный обьем на сервере
         * @param port номер порта который слать в теле запроса
         */
        void sendBrotcast(unsigned short port);

        /**
         * Ждет ответ от серверов на порт. котоырй передан в sendBrotcast()
         * @param socket сокет по которому установленно соедиднение которое слушать
         * @return  порт клиента на который будем ждать ответа
         */
        void reciveReponceIntoPort(boost::asio::ip::udp::socket& socket);

        /**
         * Устанавливает содениние и возращает номер порта. и обьект сокета в парамер
         * @return 
         */
        Udp::UdpOnce* createOnce(boost::asio::io_service& io_service);

    public:
        /**
         * @todo: мб тоже вунести в хелпер?
         * Крутит цикл по принятию ответов 
         * @param once
         */
        void reciverThreads(Udp::UdpOnce* once);
        /**
         * Обработка принятых данных от клиента
         * @param receiver
         */
        void threadProccessingStruct(const Udp::UdpReceiveOtherServer& receiver);
    };

}
