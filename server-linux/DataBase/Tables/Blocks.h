#pragma once
#include "../SingletoneConn.h"
#include <string>
#include <boost/log/trivial.hpp>

//@TODO: poveshat na path index
//@TODO: export databases; she was update!
namespace Database {
    namespace Tables {

        class Blocks {
        public:
            Blocks(Connection* conn);

            /**
             * free space file in table for file sie < BLOCK_SIZE
             * @param fileSize
             * @return str on table
             * @throws sql::SQLException 
             */
            ResultSet* freeSpaceBlock(uint32_t fileSize);


            /**
             * Вставка и изменение имени блока
             * @param path path to  block file
             * @param occuredSpace
             * @param ip
             * @throws sql::SQLException 
             * @return id- insert tables
             */
             uint32_t insertBlocks(std::string path, uint32_t occuredSpace,std::string ip);

            /**
             * delete records into path
             * @param path
             * @throws sql::SQLException 
             * @return 
             */
            bool deleteRecords(std::string path);

            /**
             * delete records into id rows
             * @param id
             * @throws sql::SQLException 
             * @return 
             */
            bool deleteRecords(uint32_t id);

            /**
             * update Occured Size into id
             * @param id
             * @param Occured
             * @throws sql::SQLException 
             * @return 
             */
            bool updateOccuredSize(uint32_t id, uint32_t occured);


            /**
             * update Occured Size into block path
             * @param path path on searsh records
             * @param occured new occured size
             * @throws sql::SQLException 
             * @return 
             */
            bool updateOccuredSize(std::string path, uint32_t occured);

            std::string GetPathToBlockByBlockId(uint32_t block_id);
            
            uint32_t GetIdByPathToBlock(std::string path);
            
            ~Blocks();
        private:
            Connection* conn;
            const std::string TABLE_NAME;
        };
    }
}


