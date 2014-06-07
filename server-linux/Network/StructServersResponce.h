#pragma once

#include <string>

namespace Network {
    struct ServersResponce {
        unsigned long long sizeFree;
        std::string ip;
        
        /**
         * 
         * @param ip
         * @param freeSpace
         */
        ServersResponce (std::string& ip, long long freeSpace) {
            this->sizeFree = freeSpace;
            this->ip = ip;
        }
    };
}
