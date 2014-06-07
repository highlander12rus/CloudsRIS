#include "Files.h"

namespace Database {
    namespace Collection {
        namespace Local {

            Files::Files(MongoLocal* local) : m_CollectionName("files") {
                m_LocalDB = local;
            }

            void Files::InsertInfo(string fileId, string blockId, uint_32 offset, uint_32 length, uint_32 order) {
                string baseNameCollection = m_LocalDB->getConnectionCollection(m_CollectionName);
                m_LocalDB->getConnection()->insert(baseNameCollection, BSON(
                        "file_id" << fileId
                        << "block_id" << blockId
                        << "offset" << offset
                        << "order" << order
                        << "length" << length
                        ));

            }

            bool Files::isExists(string file_id) {
                string baseNameCollection = m_LocalDB->getConnectionCollection(m_CollectionName);

                unsigned long long count = m_LocalDB->getConnection()->count(baseNameCollection, BSON("file_id" << file_id));
                return count > 0;
            }


            Files::~Files() {
            }

        }
    }
}