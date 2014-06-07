
#pragma once

#include <boost/log/trivial.hpp>
#include "../../../Config.h"
#include <string>
#include <mongo/client/dbclient.h>
#include <mongo/bson/bson.h>

#include "../../MongoLocal.h"


typedef unsigned int uint_32;

namespace Database {
    namespace Collection {
        namespace Local {

            /**
             * Локальная таблица Files
             * 
             */
            class Files {
            public:

                Files(MongoLocal* local);


                /**
                 * Проверяет существует ли файл в локальнйо базе
                 * 
                 * @param file_id
                 * @return 
                 */
                bool isExists(string file_id);

                /**
                 * Обновляет или добавлет инфу о файле
                 * @param fileId id файла по которому обновить
                 * @param blockId id блока по которому обвновлять
                 * @param offset
                 * @param length
                 * @param order
                 */
                void InsertInfo(string fileId, string blockId, uint_32 offset, uint_32 length, uint_32 order);

                ~Files();

            private:
                MongoDB* m_LocalDB;
                const string m_CollectionName;
            };
        }
    }
}
