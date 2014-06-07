#include "MongoDB.h"

namespace Database {

    void MongoDB::connection(string connection) {
        m_Conn = new DBClientConnection();
        std::string errmsg;
        m_Conn->connect(connection);
    }

    DBClientConnection* MongoDB::getConnection() {
        return m_Conn;
    }

    string MongoDB::getBaseName() {
        return m_TableName;
    }

    string MongoDB::getConnectionCollection(string collection) {
        return m_TableName + "." + collection;
    }
    
    void MongoDB::setTableName(string table) {
        m_TableName = table;
    }

    MongoDB::MongoDB() {
    }

    MongoDB::MongoDB(const MongoDB& orig) {
    }

    MongoDB::~MongoDB() {
    }

}