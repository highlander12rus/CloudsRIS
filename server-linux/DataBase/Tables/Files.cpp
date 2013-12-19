/* 
 * File:   Files.cpp
 * Author: vfs
 * 
 * Created on 19 Декабрь 2013 г., 22:41
 */

#include "Files.h"

namespace Database {
    namespace Tables {

        Files::Files(Connection* conn) :
        TABLE_NAME("`files`") {
            this->conn = conn;
        }

        bool Files::setFieldIsLoadedFilesInTrue(unsigned int file_id) {

            bool res;
            sql::PreparedStatement* prep_stmt;
            bool ret = false;
            std::string query = "UPDATE files SET `is_loaded`=1 WHERE id=?";

            prep_stmt = conn-> prepareStatement(query);
            prep_stmt->setUInt(1, file_id);

            res = prep_stmt->execute();
            delete prep_stmt;


            return res;
        }

        Files::~Files() {
        }

    }
}


