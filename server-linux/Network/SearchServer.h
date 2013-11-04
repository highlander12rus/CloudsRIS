#pragma once

#include "../Config.h"
#include "../Exception/MaxSearchPort.h"
#include "StructUdpBroatcastRecive.h"
#include "UdpBroatcast.h"

#include <exception>
#include <boost/asio.hpp>
#include <arpa/inet.h>

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
         * @param fileSize размер файла котоырй требуется найти
         * @param curentIp ip адрес текущего компьтера
         */
        SearchServer(unsigned long fileSize, char* curentIp);

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
         * @return  порт клиента на который будем ждать ответа
         */
        void reciveReponceIntoPort();

        /**
         * Устанавливает содениние и возращает номер порта. и обьект сокета в парамер
         * @param socket возращаеет сюда уставновленое соединение
         * @return 
         */
        unsigned short randomPort(boost::asio::ip::udp::socket & socket);
        
        //@todo: мб следующийе две функции вынести в Utility класс?
        /**
         * Конвертирование ip адресса из строки в unsigned int
         * @param ipStr - строка ip v4 адреса, вида: "127.0.0.1"
         * @return 
         */
        uint32_t ipAddresToInt(char* ipStr);
        
        /**
         * конвертирование ip адресс из unsigned int в строку
         * @param ip - ip адрес
         * @return 
         */
        char* ipIntToString(uint32_t ip);
    };

}
