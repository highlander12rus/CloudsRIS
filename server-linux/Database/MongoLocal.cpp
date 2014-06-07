#include "MongoLocal.h"


namespace Database {

    /**
     * @throws mongo::DBException - если соединение с базой небыло установленно 
     */
    MongoLocal& MongoLocal::sInstance() {
        static MongoLocal theSingleInstance;

        return theSingleInstance;
    }

    MongoLocal::MongoLocal() : MongoDB() {
        string port = Config::Instance().getProperty<string>("DatabaseLocal.port");
        string address = Config::Instance().getProperty<string>("DatabaseLocal.address");
        string tableName = Config::Instance().getProperty<string>("DatabaseLocal.table");

        string connection = address + ":" + port;
        BOOST_LOG_TRIVIAL(debug) << "local connection string to DB = " << connection;

        MongoDB::connection(connection);
        MongoDB::setTableName(tableName);
    }

    MongoLocal::MongoLocal(const MongoLocal& orig) {
    }

    MongoLocal::~MongoLocal() {
    }

}