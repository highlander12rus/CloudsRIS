#pragma once
#include "../SingletoneConn.h"
#include <string>

namespace Database {
    namespace Tables {

        class SecurityMethod {
        public:
            
            SecurityMethod(Connection* conn);

            /**
             * get method by id
             * @param id 
             * @return 
             */
            std::string getById(uint32_t id);
            
            /**
             * get id by security method
             * @param methodName
             * @return 
             */
            uint32_t getByMethod(std::string methodName);
            
            /**
             * Get all security method
             * @return 
             */
            ResultSet* getAll();
            
            ~SecurityMethod();
            
        private:
            Connection* conn;
            const std::string TABLE_NAME;

        };


    }
}