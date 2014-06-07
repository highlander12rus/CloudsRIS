#pragma once

#include <boost/log/trivial.hpp>

#include <mongo/client/dbclient.h>
#include <mongo/bson/bson.h>
#include "../../MongoDB.h"
#include "../../MongoGlobal.h"
#include "Users.h"

typedef long long uint_64;

namespace Database {
    namespace Collection {
        namespace Global {

            using namespace mongo;
            using namespace bson;

            class Files {
            public:
                Files(MongoGlobal* global);
                
                /**
                 * Проверет есть ли у пользователя user_id осутп к файлу file_id
                 * @param user_id
                 * @param file_id
                 * @return 
                 */
                bool isAccsesUserFile(string user_token, string file_id);

                /**
                 * Вставляет новый файл в дирикторию и возвращает id
                 * @param dirictoryId
                 * @param FileName
                 * @param fileSize
                 * @return  id файла
                 */
                string CreateFileInDirictory(string dirictoryId, string FileName, uint_64 fileSize);
                
                /**
                 * Получение размера файла
                 * @param file_id
                 * @return 
                 */
                uint_64 getFileLength(string file_id);
                
                virtual ~Files();
            private:
                
                MongoDB* m_pMongoGlobal;
            };
        }
    }
}
