#pragma once
#include "../SingletoneConn.h"
#include <string>

using namespace std;
using namespace sql;

namespace Database {
    namespace Tables {
        //reflaction on table Server_files in mysql

        class ServerFiles {
        private:
            Connection* conn;
            const std::string TABLE_NAME;
        public:

            ServerFiles(Connection* conn);

            /**
             * get all data by id into rows
             * For manipulation data set con -> setAutoCommit(0); in 1
             * @param id
             * @return 
             */
            ResultSet* getById(uint32_t id );

            /**
             * obtain records on the field file_id
             * @param fileId field into table
             * @return 
             */
            ResultSet* getByFileId(uint32_t fileId);
            
            /**
             * получает информацию из базы с помощью сохраненной процедуры 
             * возвращяет сет содержащий:
             * порядок, сдвиг, адрес, длинну
             * @param fileId
             * @param ip
             * @return 
             */
            ResultSet* GetInfoByFileId(uint32_t fileId,std::string ip);
            /**
             * вызывает хранимую процедуру для файлов размером превыщающих
             * размер блока в системе, дробит записи на части.
             * @param fileId
             * @param blockId
             * @param writeSize
             * @return 
             */
            bool fileSpliter(uint32_t fileId, uint32_t blockId, uint32_t writeSize);
            /**
             * вставка сдвига файла в блоке в таблицу
             * @param fileId
             * @param order
             * @param offset
             * @return 
             */
            bool updateFileOffsetByIdAndOrder(uint32_t fileId,uint32_t order,uint32_t offset);
            /**
             * возвращает идинтификатор блока по  ид файла и номеру кусочка
             * @param fileId
             * @param order
             * @return 
             */
            uint32_t GetBlockIdByFileIdAndOrder(uint32_t fileId,uint32_t order);
            
            /**
             * 
             * @param block_id
             * @param file_id
             * @param order
             * @return 
             */
            bool updateBlockIdByFileIdAndOrder(uint32_t block_id, uint32_t file_id, uint32_t order);
            
            ~ServerFiles();
        };
    }
}
