#include "MongoGlobal.h"


namespace Database {

    /**
     * @throws mongo::DBException - если соединение с базой небыло установленно 
     */
    MongoGlobal& MongoGlobal::sInstance() {
        static MongoGlobal theSingleInstance;

        return theSingleInstance;
    }

    MongoGlobal::MongoGlobal() {
        string port = Config::Instance().getProperty<string>("DatabaseGlobal.port");
        string address = Config::Instance().getProperty<string>("DatabaseGlobal.address");
        string tableName = Config::Instance().getProperty<string>("DatabaseGlobal.table");

        string connection = address + ":" + port;
        BOOST_LOG_TRIVIAL(debug) << "Global connection string to DB = " << connection;


        MongoDB::connection(connection);
        MongoDB::setTableName(tableName);

    }

    MongoGlobal::MongoGlobal(const MongoGlobal& orig) {
    }

    MongoGlobal::~MongoGlobal() {
    }

}