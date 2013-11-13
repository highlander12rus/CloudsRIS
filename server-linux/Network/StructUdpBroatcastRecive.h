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
             * файл id  из таблицы files
             */
            unsigned int fileId;
            
            /**
             * Размер котоырй требуется найти на серваке
             */
            unsigned long fileSize;
            
            UdpBroatcastRecive(unsigned int ip, unsigned short port, unsigned long fileSize, unsigned int fileId) {
                this->fileSize= fileSize;
                this->ip = ip;
                this->port = port;
                this->fileId = fileId;
            }
            UdpBroatcastRecive() {
                this->fileSize= 0;
                this->ip = 0;
                this->port = 0;
            }
        };

    }
}
