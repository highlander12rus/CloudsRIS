#include "Users.h"

namespace Database {
    namespace Collection {
        namespace Global {

            Users::Users(MongoDB* global) {
                m_pMongoGlobal = global;
            }

            string Users::getUserId(string session_id) {
                //sleep(32312);
                string baseNameCollection = m_pMongoGlobal->getConnectionCollection("users");
                
                BOOST_LOG_TRIVIAL(debug) << "12324" << baseNameCollection;                                
                 DBClientConnection* lol = m_pMongoGlobal->getConnection();
                     bo query= lol->findOne(baseNameCollection, QUERY("session_id" << session_id));
              
                if(query.isEmpty()) {
                  BOOST_LOG_TRIVIAL(debug)  << "no exists user_id,  session " <<   session_id;
                  return "";
                }
                BOOST_LOG_TRIVIAL(debug) << "getUserId( user_id = " << query.getStringField("_id");
                
                BSONElement oi;
                query.getObjectID(oi);
                
                string userId =oi.OID().toString();
                return userId;
            }

            Users::~Users() {
            }
        }
    }
}