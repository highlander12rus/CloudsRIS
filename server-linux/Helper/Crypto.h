#pragma once

#include <string.h>
#include <string>
#include <sstream>
#include <iomanip>  
#include <openssl/sha.h>
#include <stdio.h>

/**
 * добави в параметры компиляции -lcrypto
 */

namespace Helper {

    class Crypto {
    public:
        /**
         * 
         * @param str срока с которой дальше буедм колдовать
         */
        Crypto(std::string& str);

        /**
         * Выполянем хешированеи стркои в sha512
         * @return 512 бит хеша
         */
        unsigned char* getHashSha512();

        /**
         * конвертиурет строку из 512 битого хеша в строку
         * @param hash
         * @return 
         */
        std::string sha512ToString(unsigned char* hash);

        ~Crypto();
    private:
        std::string string_cypto;
    };
}


