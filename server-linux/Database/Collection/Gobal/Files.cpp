#include "Files.h"


namespace Database {
    namespace Collection {
        namespace Global {

            Files::Files(MongoGlobal* global) {
                m_pMongoGlobal = global;
            }

            bool Files::isAccsesUserFile(string user_token, string file_id) {
                Users user(m_pMongoGlobal);
                string userId = user.getUserId(user_token);
                if (userId == "") {
                    BOOST_LOG_TRIVIAL(debug) << "session not exists";
                    return false;
                }

                OID user_id;
                user_id.init(userId);

                OID filesId;
                filesId.init(file_id);


                string baseNameCollectionFiels = m_pMongoGlobal->getConnectionCollection("folders");
                unsigned long long count = m_pMongoGlobal->getConnection()->count(baseNameCollectionFiels,
                        BSON("files._id" << filesId
                        << "user_id" << user_id));

                BOOST_LOG_TRIVIAL(debug) << "isAccsesUserFile cont files = " << count;
                return count > 0;
            }

            string Files::CreateFileInDirictory(string dirictoryId, string fileName, uint_64 fileSize) {
                OID fileId;
                fileId.init();

                string fileIdGenerate = fileId.toString();


                BSONObjBuilder build, push, fileBuilder, query;

                build.append("name", fileName);
                build.append("length", fileSize);
                build.append("_id", fileId);
                fileBuilder.append("files", build.obj());
                push.append("$push", fileBuilder.obj());

                OID dirictoryL;
                dirictoryL.init(dirictoryId);

                query.append("_id", dirictoryL);


                string baseNameCollection = m_pMongoGlobal->getConnectionCollection("folders");
                m_pMongoGlobal->getConnection()->update(baseNameCollection,
                        Query(query.obj()), push.obj());

                BOOST_LOG_TRIVIAL(debug) << "Create id for file = " << fileIdGenerate;
                return fileIdGenerate;
            }

            uint_64 Files::getFileLength(string file_id) {
                OID filesId;
                filesId.init(file_id);

                string baseNameCollectionFiels = m_pMongoGlobal->getConnectionCollection("folders");


                mongo::BSONObj res;

                /*std::vector<mongo::BSONObj> pipeline;
                pipeline.push_back(BSON("$unwind" << "$files"));
                pipeline.push_back(BSON("$match" << BSON("files._id" << filesId)));*/

                m_pMongoGlobal->getConnection()->runCommand("cloudsris",
                        BSON("aggregate" << "folders"
                        << "pipeline" << BSON_ARRAY(
                        BSON("$unwind" << "$files")
                        << BSON("$match" << BSON("files._id" << filesId)
                        ))), res);

                
                bo result = res["result"].Array()[0].Obj();
                uint_64 fileSize = result["files"].Obj()["length"].Long();

                BOOST_LOG_TRIVIAL(debug) << "getFileLength filesSize = " << fileSize;

                return fileSize;
            }

            Files::~Files() {
            }

        }
    }
}