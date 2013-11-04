
#include "MaxSearchPort.h"

namespace Exception {
    namespace Network {
        namespace Udp {

            const char* MaxSearchPort::what() const throw () {
                return "The maximum number of attempts to find a free port";
            }
        }
    }
}

