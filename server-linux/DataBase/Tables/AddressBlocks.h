#pragma once

#include "../SingletoneConn.h"
#include "../../Config.h"

namespace Database {
    namespace Tables {

        class AddressBlocks {
        public:
            AddressBlocks(Connection* conn);

            /**
             * get info into bloks_id
             * @param ip
             * @param fileSize
             * @return data into bloks table: bloks_id free space
             */
            ResultSet* getBlokFreeSpaceId(std::string ip, uint64_t fileSize);
            
            /**
             * Вставлчет даныне блока, в 2 таблицы
             * @return 
             */

            uint32_t insertBlock(std::string ip);
            
            /**
             * Запрос ip адресса блока 
             * @param ip -адресс котоырй извлеч из выборки
             * @param block_id 
             * @return 
             */
            ResultSet* getOtherServerForBlock(std::string ip, unsigned int block_id);
            
            /**
             * Смотри есть ли дургие блоки у которых поле ip не равно ip
             * @param block_id блоки котыре ищем на дургих серваках
             * @param ip ip котоырй исключить из выборки
             * @return  кол-во серверов
             */
            int countIssetOtherServers(unsigned int block_id, std::string ip);

            bool insertBlock(std::string ip,uint32_t idBlock);
            
            bool isCreateBlock(std::string ip,uint32_t idBlock);

            ~AddressBlocks();

        private:
            Connection* conn;
            const std::string TABLE_NAME;
        };
    }
}
