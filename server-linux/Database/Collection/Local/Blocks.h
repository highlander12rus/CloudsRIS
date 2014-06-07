#pragma once

#include <string>
#include <boost/log/trivial.hpp>
#include "../../../Config.h"

#include <mongo/client/dbclient.h>
#include <mongo/bson/bson.h>
#include "../../MongoLocal.h"
#include "../../../FileSystem/FileInformInBlock.h"




namespace Database {
    namespace Collection {
        namespace Local {

            typedef unsigned int uint_32;
            typedef long long uint_64;
            using namespace std;
            using namespace mongo;
            using namespace bson;
            using namespace FileSystem;

            class Blocks {
            public:
                Blocks(MongoLocal* local);


                /**
                 * Создает новый блок с текущем временем создания и 
                 * меткой is_created = false
                 * в качестве пути используетсья id из базы
                 * @param fileSize размер будущего файла
                 * @return id нового блока из базы
                 */
                string CreateBlock(uint_64 fileSize);

                
                FileInformInBlock  serachFreeSpaceInBlock(uint_64 fileSIze);

                /**
                 * Обвноялет информацию о занятом пространстве в блоке
                 * @param blockId id блока у которого требуется обнвоить
                 * @param length размер котоырй был добавлен
                 */
                void UpdateInfo(string blockId, uint_32 length);

                ~Blocks();
            private:
                MongoDB* m_LocalDB;
                const string m_CollectionName;
            };
        }
    }
}

