
#include "AddressBlocks.h"
namespace Database {
    namespace Tables {

        AddressBlocks::AddressBlocks(Connection* conn) :
        TABLE_NAME("`address_blocks`") {
            this->conn = conn;
        }

        
        ResultSet* AddressBlocks::getBlokFreeSpaceId(std::string ip, uint64_t fileSize) {
            ResultSet* res;
            sql::PreparedStatement* prep_stmt;

            std::string query = "SELECT `blocks`.`address`, `blocks`.`occupied_space` " +
                    std::string("FROM `blocks`, `address_blocks` ") +
                    "WHERE `address_blocks`.`blok_id` = `blocks`.`id` AND " + 
                    "FreeSpace(?, `blocks`.`occupied_space`, ?) AND " + 
                    "`address_blocks`.`ip` = ? LIMIT 1";         
            
            prep_stmt = conn-> prepareStatement(query);
            
            prep_stmt->setUInt(1, BLOCK_SIZE);
            prep_stmt->setUInt(2, fileSize);
            prep_stmt->setString(3, ip);
 
            res = prep_stmt->executeQuery();
            delete prep_stmt;
            return res;
        }
        
        bool AddressBlocks::isCreateBlock(std::string ip,uint32_t idBlock)
        {
            ResultSet* res;
            sql::PreparedStatement* prep_stmt;
            bool ret=false;
            std::string query = "Select ip from `address_blocks` where ip = ? AND blok_id = ?;";         
            
            prep_stmt = conn-> prepareStatement(query);
            prep_stmt->setUInt(2, idBlock);
            prep_stmt->setString(1, ip);
 
            res = prep_stmt->executeQuery();
            delete prep_stmt;
            ret= res->last();
            
            return ret;
        }
        
        bool AddressBlocks::insertBlock(std::string ip,uint32_t idBlock) {
            
            bool res;
            sql::PreparedStatement* prep_stmt;
            bool ret=false;
            std::string query = "Insert into addres_blocks (`ip`,`blok_id`) VALUES (?,?);";         
            
            prep_stmt = conn-> prepareStatement(query);
            prep_stmt->setUInt(2, idBlock);
            prep_stmt->setString(1, ip);
 
            res = prep_stmt->execute();
            delete prep_stmt;
         
            
            return res;
        }
        
        AddressBlocks::~AddressBlocks() {
        }
    }
}

