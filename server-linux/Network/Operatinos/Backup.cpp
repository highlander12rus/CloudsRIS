#include "Backup.h"

namespace Network {
    namespace Tcp {
        namespace Operatinos {

            char const Backup::OPERATION_BACKUP = 2;
            
            const char Backup::NOT_ACCESS_TOKEN = 1;
            const char Backup::NOT_SERVERS_FOR_UPLOADING = 2;
            const char Backup::SERVERS_RIDERECT = 3;

            Backup::pointer Backup::create(boost::asio::io_service* io_service,
                    Config* config, MongoGlobal* mongoGlobal, MongoLocal* mongoLocal) {
                return pointer(new Backup(io_service, config, mongoGlobal, mongoLocal));
            }
            
            Backup::Backup(boost::asio::io_service* io_service, Config* config,
                    MongoGlobal* mongoGlobal, MongoLocal* mongoLocal) {
                uint_32 bufferSize = config->getProperty<uint_32>("TCP.buffer_size");
                BOOST_LOG_TRIVIAL(debug) << "TCP upload buffer size = " << bufferSize;

                m_pBuffer = new char[bufferSize];
                m_pSocket = new tcp::socket(*io_service);

                m_pMongoLocal = mongoLocal;
                m_pMongoGlobal = mongoGlobal;
                m_pConfig = config;
                
                 m_BytesAllRecive = 0;
                    m_Order = 0;
            }

            void Backup::SendBinary(char* bytes, uint_32 length) {
                boost::asio::async_write(*m_pSocket, boost::asio::buffer(bytes, length),
                        boost::bind(&Backup::handle_write, shared_from_this(),
                        boost::asio::placeholders::error,
                        boost::asio::placeholders::bytes_transferred));
            }

            tcp::socket& Backup::socket() {
                
            }
            
            void Backup::start() {
                boost::asio::async_read(*m_pSocket, boost::asio::buffer(m_pBuffer, 8192),
                        boost::bind(&Backup::handle_read, shared_from_this(),
                        boost::asio::placeholders::error,
                        boost::asio::placeholders::bytes_transferred));
            }
            
            void Backup::setDataInMongoLocal() {
                Local::Files file(m_pMongoLocal);
                file.InsertInfo(m_FileIdGlobalDb, (*m_pBlockForReadFileIter)->getBlockId(),
                        (*m_pBlockForReadFileIter)->getOffset(),
                        (*m_pBlockForReadFileIter)->getLength(),
                        m_Order++);

                Local::Blocks blocks(m_pMongoLocal);
                blocks.UpdateInfo((*m_pBlockForReadFileIter)->getBlockId(),
                        (*m_pBlockForReadFileIter)->getLength());
                //if(m_pBlockForReadFileIter != m_pBlockForReadFile.begin()) {
                delete *m_pBlockForReadFileIter;
                //}

            }

            void Backup::handle_read(const boost::system::error_code& error, size_t bytes_transferred) {
               if (error != boost::asio::error::eof && error) {
                    BOOST_LOG_TRIVIAL(error) << "\nerror in handle_read  error code= "
                            << error.value() << "\n";
                            BOOST_LOG_TRIVIAL(debug) << "start delete this Upload";
                    //delete this;
                    BOOST_LOG_TRIVIAL(debug) << "end delete this Upload";
                    return;
                }


                if (m_BytesAllRecive == 0) {
                    HeaderCleintUpload* headerClient = (HeaderCleintUpload*) (m_pBuffer);
                    m_FileSize = headerClient->fileSize;
               
                    if (headerClient->type != OPERATION_BACKUP) {
                        BOOST_LOG_TRIVIAL(error) << "Не корректный запрос";

                        //delete this;
                        return;
                    }


                    //проверяем что пользователь с таким токеном есть
                    Global::Users user(m_pMongoGlobal);

                    string token = headerClient->token;
                    if (user.getUserId(token) == "") {
                        try {
                            m_pSocket->send(boost::asio::buffer(&Backup::NOT_ACCESS_TOKEN, 1));
                        } catch (boost::exception &e) {
                            BOOST_LOG_TRIVIAL(error) << "exception e=";
                        }
                        BOOST_LOG_TRIVIAL(debug) << "start delete this Backup 1";
                        //delete this;
                        BOOST_LOG_TRIVIAL(debug) << "end delete this Backup";
                        return;
                    }

                    string pathToBlock = m_pConfig->getProperty<string>("FileSysteam.folders_blocks");
                    string ip = m_pConfig->getProperty<string>("Others.ip");
                  
                    Block::AllocatedBlocks blocksForWriten(m_FileSize, ip, m_pConfig, m_pMongoLocal);
                    m_pBlockForReadFile = blocksForWriten.getStreamWriter();
                    m_pBlockForReadFileIter = m_pBlockForReadFile.begin();

                    //create file in global bd
                    Global::Files fileMongo(m_pMongoGlobal);

                    string dirictoryIdTest = headerClient->dirictoryId;
                    
                    m_FileIdGlobalDb = headerClient->dirictoryId;
BOOST_LOG_TRIVIAL(debug) << "\nBackup file_id global = " << m_FileIdGlobalDb << "\n";
                    m_pBuffer = m_pBuffer + sizeof (HeaderCleintUpload);
                }



                if (m_pBlockForReadFileIter == m_pBlockForReadFile.end() || m_BytesAllRecive >= m_FileSize) {
                    //Конец записи в файл
                    BOOST_LOG_TRIVIAL(debug) << "Запись файла закончена, m_BytesAllRecive="
                            << m_BytesAllRecive << " m_FileSize=" << m_FileSize;

                    setDataInMongoLocal();

                    //delete this;
                    return;
                }
                

                if ((*m_pBlockForReadFileIter)->write(m_pBuffer, bytes_transferred) == 0) {
                    m_pBlockForReadFileIter++;
                    if (m_pBlockForReadFileIter != m_pBlockForReadFile.end()) {

                        m_pBlockForReadFileIter--;
                        setDataInMongoLocal(); //hack
                        m_pBlockForReadFileIter++;

                        (*m_pBlockForReadFileIter)->write(m_pBuffer, bytes_transferred);
                    } else {
                        m_BytesAllRecive += bytes_transferred;
                        handle_read(error, 0);
                        return;
                    }
                }

                m_BytesAllRecive += bytes_transferred;
                boost::asio::async_read(*m_pSocket, boost::asio::buffer(m_pBuffer, 8192),
                        boost::bind(&Backup::handle_read, shared_from_this(),
                        boost::asio::placeholders::error,
                        boost::asio::placeholders::bytes_transferred));

            }

            void Backup::handle_write(const boost::system::error_code& error, size_t bytes_transferred) {

            }

            Backup::~Backup() {
                
                BOOST_LOG_TRIVIAL(debug) << "destructor Backup";
                //m_pSocket->close();
                
                /*delete[] m_pBuffer;
                 delete m_pSocket;*/
            }

        }
    }
}
            
  