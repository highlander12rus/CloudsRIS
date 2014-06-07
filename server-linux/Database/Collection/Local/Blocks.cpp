
#include "Blocks.h"

namespace Database {
    namespace Collection {
        namespace Local {

            Blocks::Blocks(MongoLocal* local) : m_CollectionName("Blocks") {
                m_LocalDB = local;
            }

            string Blocks::CreateBlock(uint_64 fileSize) {
                OID newBlockId;
                newBlockId.init();
                
               /* BSONObj query = BSON(GENOID <<
                        "occupied_space" << (uint_64) 0 << //занятое проство, ставиться по умолчанию в 0
                        "time_created" << DATENOW <<
                        "is_created" << 0);

                string baseNameCollection = m_LocalDB->getConnectionCollection(m_CollectionName);
                m_LocalDB->getConnection()->insert(baseNameCollection, query);

                BSONElement oi;
                query.getObjectID(oi);

                BOOST_LOG_TRIVIAL(debug) << "Blocks new created id=" << oi.OID().toString();

                return oi.OID().toString();*/
                return newBlockId.toString();
            }

            FileInformInBlock Blocks::serachFreeSpaceInBlock(uint_64 fileSIze) {
                string baseNameCollection = m_LocalDB->getConnectionCollection(m_CollectionName);

                BSONObj filedsReturn = BSON("_id" << 1 << "occupied_space" << 1);
                BSONObj query = m_LocalDB->getConnection()->findOne(baseNameCollection,
                        Query(BSON("occupied_space" << GTE << fileSIze)).sort("occupied_space", -1),
                        &filedsReturn);

                if (query.isEmpty()) {
                    BOOST_LOG_TRIVIAL(debug) << "not serach free space";
                    return FileInformInBlock();
                }

                BSONElement oi;
                query.getObjectID(oi);
                string blockId = oi.OID().toString();
                
                baseNameCollection = m_LocalDB->getConnectionCollection("files");
                query = m_LocalDB->getConnection()->findOne(baseNameCollection,
                        Query(BSON("block_id" << blockId)).sort("offset", -1));
                
                
                //Ищем максимальынй отступ. чтобы знать куда писать
               
                uint_64 offset = query["offset"].Int();
                uint_64 length = query["length"].Int();
                uint_64 newOffset = offset + length;
                

                BOOST_LOG_TRIVIAL(debug) << "search block, _id=" << blockId;
                FileInformInBlock infoBlock(newOffset, blockId);
                return infoBlock;
            }

            void Blocks::UpdateInfo(string blockId, uint_32 length) {
                string baseNameCollection = m_LocalDB->getConnectionCollection(m_CollectionName);

                BOOST_LOG_TRIVIAL(debug) << "Update block info id=" << blockId;
                uint_32 blockSize = Config::Instance().getProperty<uint_32> ("FileSysteam.block_size");

                OID blockIdMongo;
                blockIdMongo.init(blockId);

                BSONObj fields = BSON("occupied_space" << 1);

                BSONObj query = m_LocalDB->getConnection()->findOne(baseNameCollection, Query(BSON("_id" << blockIdMongo)), &fields);
                string lol = query.toString();
                
                uint_64 newOccupiedSpace = blockSize;
                if (!query.isEmpty()) {
                    
                    newOccupiedSpace = query["occupied_space"].Long();
                }

                newOccupiedSpace = newOccupiedSpace - length;

                //update occupied space
                m_LocalDB->getConnection()->update(baseNameCollection, Query(BSON("_id" << blockIdMongo)),
                        BSON("occupied_space" << newOccupiedSpace), true);

            }

            Blocks::~Blocks() {
            }

        }
    }
}