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

            prep_stmt = conn-> prepareStatement("SELECT * FROM `server_files` JOIN blocks on blocks.id = block_id   WHERE `server_files`.`file_id` = ?");
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
            prep_stmt->setString(2, ip);
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

        bool ServerFiles::updateFileOffsetByIdAndOrder(uint32_t fileId, uint32_t order, uint32_t offset) {
            sql::PreparedStatement* prep_stmt;
            prep_stmt = conn-> prepareStatement("UPDATE `server_files` SEt `offset`=? WHERE `file_id`=? AND `order`=?;");
            prep_stmt->setUInt(1, offset);
            prep_stmt->setUInt(2, fileId);
            prep_stmt->setUInt(3, order);

            bool res = prep_stmt->execute();
            delete prep_stmt;
            return res;
        }

        uint32_t ServerFiles::GetBlockIdByFileIdAndOrder(uint32_t fileId, uint32_t order) {
            ResultSet* res;
            uint32_t id = 0;
            sql::PreparedStatement* prep_stmt;
            prep_stmt = conn-> prepareStatement("Select `block_id` from " + TABLE_NAME +
                    " where file_id = ? AND order = ?");
            prep_stmt->setUInt(1, fileId);
            prep_stmt->setUInt(2, order);
            res = prep_stmt->executeQuery();
            delete prep_stmt;
            if (res->next()) {
                id = res->getInt(1);
            }
            delete res;
            return id;
        }
        
        bool ServerFiles::updateBlockIdByFileIdAndOrder(uint32_t block_id, uint32_t file_id, uint32_t order) {
            sql::PreparedStatement* prep_stmt;
            prep_stmt = conn-> prepareStatement("UPDATE `server_files` SET `block_id`=? WHERE `file_id`=? AND `order`=?;");
            prep_stmt->setUInt(1, block_id);
            prep_stmt->setUInt(2, file_id);
            prep_stmt->setUInt(3, order);

            bool res = prep_stmt->execute();
            delete prep_stmt;
            return res;
        }
        

        ServerFiles::~ServerFiles() {
        }
    }
}
