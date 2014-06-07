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
            long long freeSpace;

            /**
             * 
             * @param freeSpace
             */
            UdpReceiveOtherServer(long long freeSpace) {
                this->freeSpace = freeSpace;
            }

            UdpReceiveOtherServer() {
                this->freeSpace = freeSpace;
            }
        };

    }
}
