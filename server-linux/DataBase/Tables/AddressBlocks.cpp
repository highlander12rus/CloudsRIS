
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
            std::string query = "Select ip from `address_blocks` where ip = ? AND blok_id = ?";         
            
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
            std::string query = "Insert into address_blocks (`ip`,`blok_id`) VALUES (?,?);";         
            
            prep_stmt = conn-> prepareStatement(query);
            prep_stmt->setUInt(2, idBlock);
            prep_stmt->setString(1, ip);
 
            res = prep_stmt->execute();
            delete prep_stmt;
         
            
            return res;
        }
        
        
        ResultSet* AddressBlocks::getOtherServerForBlock(std::string ip, unsigned int block_id) {
            ResultSet* res;
            sql::PreparedStatement* prep_stmt;
            
            std::string query = "SELECT `address_blocks`.`blok_id`, `address_blocks`.`ip` FROM `address_blocks` WHERE `address_blocks`.`ip` != ?  AND `address_blocks`.`blok_id` = ?";
            prep_stmt = conn-> prepareStatement(query);
            prep_stmt->setString(1, ip);
            prep_stmt->setUInt(2, block_id);
            res = prep_stmt->executeQuery();
            return res;
        }
        
        int AddressBlocks::countIssetOtherServers(unsigned int block_id, std::string ip) {
            ResultSet* res;
            sql::PreparedStatement* prep_stmt;
            
            std::string query = "SELECT `address_blocks`.`blok_id` FROM `address_blocks` WHERE `address_blocks`.`ip` != ?  AND `address_blocks`.`blok_id` = ?";
            prep_stmt = conn-> prepareStatement(query);
            prep_stmt->setString(1, ip);
            prep_stmt->setUInt(2, block_id);
            res = prep_stmt->executeQuery();
            
            int count = res->rowsCount();
            delete res, prep_stmt;
            return count;
        }
        
        AddressBlocks::~AddressBlocks() {
        }
    }
}

