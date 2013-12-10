
#include "Crypto.h"

namespace Helper {

    Crypto::Crypto(std::string& str) {
        this->string_cypto = str;
    }

    /**
     * Выполянем хешированеи стркои в sha512
     * @see example http://www.askyb.com/cpp/openssl-sha512-hashing-example-in-cpp/
     * @return 512 бит хеша
     */
    unsigned char* Crypto::getHashSha512() {

        unsigned char* digest = new unsigned char[SHA512_DIGEST_LENGTH];
        char* str = (char *) string_cypto.c_str();


        SHA512((unsigned char*) &str, strlen(str),
                (unsigned char*) digest);

        return digest;
    }

    /**
     * конвертиурет строку из 512 битого хеша в строку
     * @param hash
     * @return 
     */
    std::string Crypto::sha512ToString(unsigned char* hash) {
        char mdString[SHA512_DIGEST_LENGTH * 2];

        for (int i = 0; i < SHA512_DIGEST_LENGTH; i++)
            sprintf(&mdString[i * 2], "%02x", (unsigned int) hash[i]);

        return std::string(mdString);
    }

    Crypto::~Crypto() {
    }

}