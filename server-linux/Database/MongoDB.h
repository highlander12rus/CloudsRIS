#ifndef MONGODB_H
#define	MONGODB_H

#include <string>

#include "mongo/client/dbclient.h"
#include "../Config.h"

using namespace std;
using namespace mongo;

namespace Database {

    /**
     * singletons
     */
    class MongoDB {
    public:
        DBClientConnection* getConnection();

        string getBaseName();
        
        
        void setTableName(string table); //перемииновать в setBaseName


        /**
         * Устанавливает соединение с базой
         * @param connection строка соединения вида 127.0.0.1:25698
         * @throws mongo::DBException
         */
        void connection(string connection);

        /**
         * Вовзращает строку вида имя_бд.имя_коллекции
         * @param collection имя колекции
         * @return имя_бд.имя_коллекции
         */
        string getConnectionCollection(string collection);


        MongoDB(const MongoDB& orig);
        MongoDB& operator=(const MongoDB&);

        MongoDB();
        ~MongoDB();

    protected:



    private:
        DBClientConnection* m_Conn;
        string m_TableName;

    };
}
#endif	/* MONGODB_H */

