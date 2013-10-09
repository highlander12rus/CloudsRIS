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

        ServerFiles::~ServerFiles() {
        }
    }
}
