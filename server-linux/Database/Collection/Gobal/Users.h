#ifndef USERS_H
#define	USERS_H

#include <boost/log/trivial.hpp>
#include <string>

#include <mongo/client/dbclient.h>
#include <mongo/bson/bson.h>
#include "../../MongoDB.h"
#include "../../MongoGlobal.h"

typedef long long uint_64;

using namespace mongo;
using namespace bson;
using namespace std;

namespace Database {
    namespace Collection {
        namespace Global {

            class Users {
            public:
                
                Users(MongoDB* global);

                /**
                 * Получение id пользователя по сессии
                 * @param session_id
                 * @return 
                 */
                string getUserId(string session_id);

                virtual ~Users();
            private:
                MongoDB* m_pMongoGlobal;
            };
        }
    }
}
#endif	/* USERS_H */

