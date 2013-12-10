#include "ServerFiles.h"

namespace Database {
    namespace Tables {

        ServerFiles::ServerFiles(Connection* conn) :
        TABLE_NAME("`server_files`") {
            this->conn = conn;
        }

        ResultSet* ServerFiles::getById(uint32_t id) {
            ResultSet* res;
            sql::PreparedStatement* prep_stmt;

            prep_stmt = conn-> prepareStatement("SELECT * FROM " + TABLE_NAME
                    + " WHERE `id` = ?");
            prep_stmt->setUInt(1, id);
            res = prep_stmt->executeQuery();
            delete prep_stmt;
            return res;
        }

        ResultSet* ServerFiles::getByFileId(uint32_t fileId) {
            ResultSet* res;
            sql::PreparedStatement* prep_stmt;

            prep_stmt = conn-> prepareStatement("SELECT * FROM " + TABLE_NAME
                    + " WHERE `file_id` = ?");
            prep_stmt->setUInt(1, fileId);
            res = prep_stmt->executeQuery();
            delete prep_stmt;
            return res;
        }

        ResultSet* ServerFiles::GetInfoByFileId(uint32_t fileId, std::string ip) {
            ResultSet* res;
            sql::PreparedStatement* prep_stmt;
            prep_stmt = conn-> prepareStatement("CALL `cloudsris`.`fileInfo`(?,?);");
            prep_stmt->setUInt(1, fileId);
            prep_stmt->setString(1, ip);
            res = prep_stmt->executeQuery();
            delete prep_stmt;
            return res;
        }

        bool ServerFiles::fileSpliter(uint32_t fileId, uint32_t blockId, uint32_t writeSize) {
            sql::PreparedStatement* prep_stmt;
            prep_stmt = conn-> prepareStatement("CALL `cloudsris`.`fileSpliter`(?,?,?);");
            prep_stmt->setUInt(1, fileId);
            prep_stmt->setUInt(2, blockId);
            prep_stmt->setUInt(3, writeSize);
            bool res = prep_stmt->execute();
            delete prep_stmt;
            return res;
        }
        
       /* bool updateFileOffsetByIdAndOrder(uint32_t fileId,uint32_t order)
        {
            sql::PreparedStatement* prep_stmt;
            prep_stmt = conn-> prepareStatement("UPDATE `cloudsris`.`server_files` SEt col='value'");
            prep_stmt->setUInt(1, fileId);
            prep_stmt->setUInt(2, order);
            
            bool res = prep_stmt->execute();
            delete prep_stmt;
            return res;
        }*/
        
        ServerFiles::~ServerFiles() {
        }
    }
}
