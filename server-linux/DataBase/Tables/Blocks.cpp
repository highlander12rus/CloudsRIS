#include "Blocks.h"

namespace Database {
    namespace Tables {

        Blocks::Blocks(Connection* conn) : TABLE_NAME("`blocks`") {
            this->conn = conn;
        }

        ResultSet* Blocks::freeSpaceBlock(uint32_t fileSize) {
            ResultSet* res;
            sql::PreparedStatement* prep_stmt;
            
            prep_stmt = conn-> prepareStatement("SELECT * FROM " + TABLE_NAME
                    + " WHERE `occupied_space` <= ?");
            prep_stmt->setUInt(1, fileSize);
            res = prep_stmt->executeQuery();

            delete prep_stmt; 
            return res;
        }

        bool Blocks::insertRecords(std::string path, uint32_t occuredSpace) {
            sql::PreparedStatement* prep_stmt;
            bool result = false;

            
            prep_stmt = conn->prepareStatement("INSERT INTO " +
                    TABLE_NAME + " (`address`, `occupied_space`) VALUES (?, ?)");
            prep_stmt->setString(1, path); 
            prep_stmt->setUInt(2, occuredSpace);
            result = prep_stmt->execute();

            delete prep_stmt;
            return result;
        }

        bool Blocks::deleteRecords(std::string path) {
            sql::PreparedStatement* prep_stmt;
            bool result = false;

            prep_stmt = conn->prepareStatement("DELETE FROM " +
                    TABLE_NAME + " WHERE `address` = ?");
            prep_stmt->setString(1, path); 
            result = prep_stmt->executeUpdate() > 0;

            delete prep_stmt;
            return result;
        }

        bool Blocks::deleteRecords(uint32_t id) {
            sql::PreparedStatement* prep_stmt;
            bool result = false;

            prep_stmt = conn->prepareStatement("DELETE FROM " +
                    TABLE_NAME + " WHERE `id` = ?");
            prep_stmt->setUInt(1, id);
            result = prep_stmt->executeUpdate() > 0;

            delete prep_stmt;
            return result;
        }

        bool Blocks::updateOccuredSize(unsigned int id, uint32_t occured) {
            sql::PreparedStatement* prep_stmt;
            bool result = false;

            prep_stmt = conn->prepareStatement("UPDATE " +
                    TABLE_NAME + "SET `occupied_space` = ? WHERE `id` = ?");
            prep_stmt->setUInt(1, occured);
            prep_stmt->setUInt(2, id);
            result = prep_stmt->executeUpdate() > 0;

            delete prep_stmt;
            return result;
        }

        bool Blocks::updateOccuredSize(std::string path, uint32_t occured) {
            sql::PreparedStatement* prep_stmt;
            bool result = false;

            prep_stmt = conn->prepareStatement("UPDATE " +
                    TABLE_NAME + "SET `occupied_space` = ? WHERE `occupied_space` = ?");
            prep_stmt->setUInt(1, occured);
            prep_stmt->setString(2, path);
            result = prep_stmt->executeUpdate() > 0;

            delete prep_stmt;
            return result;
        }

        Blocks::~Blocks() {

        }

    }
}