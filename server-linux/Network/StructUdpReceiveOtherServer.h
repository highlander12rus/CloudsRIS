#pragma once
/**
 * Сруктура котороая посылается/принимается при рассылки проткаста
 */
namespace Network {
    namespace Udp {

        struct UdpReceiveOtherServer {
            
            /**
             * Размер свободного пространства
             */
            unsigned long long freeSpace;

            /**
             * 
             * @param freeSpace
             */
            UdpReceiveOtherServer(unsigned long long freeSpace) {
                this->freeSpace = freeSpace;
            }

            UdpReceiveOtherServer() {
                this->freeSpace = freeSpace;
            }
        };

    }
}
