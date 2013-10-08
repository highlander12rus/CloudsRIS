

#include "SecurityMethod.h"
namespace Database {
    namespace Tables {

        SecurityMethod::SecurityMethod(Connection* conn) :
        TABLE_NAME("`security_method`") {
            this->conn = conn;
        }

        std::string SecurityMethod::getById(uint32_t id) {
            ResultSet* res;
            sql::PreparedStatement* prep_stmt;

            prep_stmt = conn-> prepareStatement("SELECT name FROM " + TABLE_NAME
                    + " WHERE `id` = ?");
            prep_stmt->setUInt(1, id);
            res = prep_stmt->executeQuery();
            res->next();
            std::string result = res -> getString(1);
            delete prep_stmt, res;
            return result;
        }

        uint32_t SecurityMethod::getByMethod(std::string methodName) {
            ResultSet* res;
            sql::PreparedStatement* prep_stmt;

            prep_stmt = conn-> prepareStatement("SELECT id FROM " + TABLE_NAME
                    + " WHERE `name` = ?");
            prep_stmt->setUInt(1, methodName);
            res = prep_stmt->executeQuery();
            res->next();
            uint32_t result = res->getUInt(1);
            delete prep_stmt, res;
            return result;
        }

        ResultSet* SecurityMethod::getAll() {
            ResultSet* res;
            sql::PreparedStatement* prep_stmt;

            prep_stmt = conn-> prepareStatement("SELECT * FROM " + TABLE_NAME);
            res = prep_stmt->executeQuery();
            delete prep_stmt;
            return res;
        }

        SecurityMethod::~SecurityMethod() {

        }

    }
}