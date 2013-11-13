#pragma once


#include <arpa/inet.h>

namespace Helper {

    class Network {
    public:
        
        /**
         * Конвертирование ip адресса из строки в unsigned int
         * @param ipStr - строка ip v4 адреса, вида: "127.0.0.1"
         * @return 
         */
        static uint32_t ipAddresToInt(char* ipStr);

        /**
         * конвертирование ip адресс из unsigned int в строку
         * @param ip - ip адрес
         * @return 
         */
        static char* ipIntToString(uint32_t ip);

    };

}