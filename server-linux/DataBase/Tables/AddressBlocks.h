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
            
            
            
            ~AddressBlocks();

        private:
            Connection* conn;
            const std::string TABLE_NAME;
        };
    }
}