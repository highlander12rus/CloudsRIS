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
            
            
            ~ServerFiles();
        };
    }
}
