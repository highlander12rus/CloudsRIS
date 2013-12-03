#include "Network.h"

namespace Helper {

    uint32_t Network::ipAddresToInt(char* ipStr) {
        struct sockaddr_in sa;
        inet_pton(AF_INET, ipStr, &(sa.sin_addr));
        return sa.sin_addr.s_addr;
    }

    char* Network::ipIntToString(uint32_t ip) {
        char* str = new char[INET_ADDRSTRLEN];
        inet_ntop(AF_INET, &ip, str, INET_ADDRSTRLEN);
        return str;
    }

}