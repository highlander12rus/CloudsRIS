#pragma once

#include "../SingletoneConn.h"
#include "../../Config.h"

namespace Database {
    namespace Tables {

        class Files {
        public:
            Files(Connection* conn);

            /**
             * Устанавливает поле is_loaded в значение true
             * @param file_id
             * @return 
             */
            bool setFieldIsLoadedFilesInTrue(unsigned int file_id);

            ~Files();
        private:
            Connection* conn;
            const std::string TABLE_NAME;

        };
    }
}