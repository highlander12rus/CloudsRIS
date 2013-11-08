#pragma once
#include <string>
namespace Interface {
    namespace CurrentBaseOperation {

        class ICurrentBaseOperation {
        public:
            /**
             * проверка на существование токена
             * @param token
             * @return 
             */
           virtual bool exists(std::string token) = 0;
            /**
             * получение значение по токену
             * @param token
             * @return 
             */
           virtual std::string get(std::string token) = 0;

        private:

        };

    }
}

