#pragma once

/**
 * ИСключение бросается если было максимальное кол-во попыток найти порт
 */

#include <exception>
using namespace std;

namespace Exception {
    namespace Network {
        namespace Udp {

            class MaxSearchPort : public exception {
                virtual const char* what() const throw ();

            };
        }

    }

}


