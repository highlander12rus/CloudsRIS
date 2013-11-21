#pragma once

/**
 * Сруктура котороая посылается/принимается при рассылки проткаста
 */
namespace Network {
    namespace Udp {

        struct UdpBroatcastRecive {
            /**
             * ip address хранящийся в int
             */
            unsigned int ip; 
            unsigned short port;
            
            
            /**
             * Размер котоырй требуется найти на серваке
             */
            unsigned long fileSize;
            
            UdpBroatcastRecive(unsigned int ip, unsigned short port, unsigned long fileSize) {
                this->fileSize= fileSize;
                this->ip = ip;
                this->port = port;
            }
            UdpBroatcastRecive() {
                this->fileSize= 0;
                this->ip = 0;
                this->port = 0;
            }
        };

    }
}
