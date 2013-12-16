#pragma once

#include <string>

namespace Network {
    struct ServersResponce {
    public:
        unsigned long long sizeFree;
        std::string ip;
        
        /**
         * 
         * @param ip
         * @param freeSpace
         */
        ServersResponce (std::string& ip, unsigned long long freeSpace) {
            this->sizeFree = freeSpace;
            this->ip = ip;
        }
    };
}
