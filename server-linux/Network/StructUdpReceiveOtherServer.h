#pragma once
/**
 * Сруктура котороая посылается/принимается при рассылки проткаста
 */
namespace Network {
    namespace Udp {

        struct UdpReceiveOtherServer {
            /**
             * Номер блока из базы, потребуется пересылать дальше
             */
            unsigned int block_id; //для того чтобы точно знать к какому блоку относятся данные, далее следуют указывать при дублирование блока

            /**
             * длинна данных, не может быть больше BLOCK_SIZE
             */
            unsigned long long length; //длину c offset сколько слать 

            /**
             * отступ в блоки с которого начинать писать данные
             */
            unsigned long long offset;

            /**
             * 
             * @param block_id
             * @param length
             * @param offset
             */
            UdpReceiveOtherServer(unsigned int block_id, unsigned long long length,
                    unsigned long long offset) {
                this->block_id = block_id;
                this->length = length;
                this->offset = offset;
            }

            UdpReceiveOtherServer() {
                this->block_id = 0;
                this->length = 0;
                this->offset = 0;
            }
        };

    }
}
