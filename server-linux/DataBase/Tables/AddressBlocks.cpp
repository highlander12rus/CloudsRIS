
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
                    "`address_blocks`.`ip` = ?";         
            
            prep_stmt = conn-> prepareStatement(query);
            
            prep_stmt->setUInt(1, BLOCK_SIZE);
            prep_stmt->setUInt(2, fileSize);
            prep_stmt->setString(3, ip);
 
            res = prep_stmt->executeQuery();
            delete prep_stmt;
            return res;
        }

        AddressBlocks::~AddressBlocks() {
        }
    }
}

