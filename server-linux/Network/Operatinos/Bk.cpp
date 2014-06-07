#include "Bk.h"

namespace Network {
    namespace Tcp {
        namespace Operatinos {
            const char Bk::OPERATION_BACKUP = 2;

            const char Bk::NOT_ACCESS_TOKEN = 1;
            const char Bk::NOT_SERVERS_FOR_UPLOADING = 2;
            const char Bk::SERVERS_RIDERECT = 3;

            Bk::pointer Bk::create(boost::asio::io_service* io_service,
                    Config* config, MongoGlobal* mongoGlobal, MongoLocal* mongoLocal) {
                return pointer(new Bk(io_service, config, mongoGlobal, mongoLocal));
            }

            Bk::Bk(boost::asio::io_service* io_service, Config* config,
                    MongoGlobal* mongoGlobal, MongoLocal* mongoLocal) : m_pBuffer(NULL) {
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

            void Bk::SendBinary(char* bytes, uint_32 length) {
                boost::asio::async_write(*m_pSocket, boost::asio::buffer(bytes, length),
                        boost::bind(&Bk::handle_write, shared_from_this(),
                        boost::asio::placeholders::error,
                        boost::asio::placeholders::bytes_transferred));
            }

            void Bk::setDataInMongoLocal() {
                if (m_Order > 0) {
                    delete *m_pBlockForReadFileIter;
                    m_pBlockForReadFileIter++;
                }
                Local::Files file(m_pMongoLocal);
                file.InsertInfo(m_FileIdGlobalDb, (*m_pBlockForReadFileIter)->getBlockId(),
                        (*m_pBlockForReadFileIter)->getOffset(),
                        (*m_pBlockForReadFileIter)->getLength(),
                        m_Order++);

                Local::Blocks blocks(m_pMongoLocal);
                blocks.UpdateInfo((*m_pBlockForReadFileIter)->getBlockId(),
                        (*m_pBlockForReadFileIter)->getLength());
            }

            tcp::socket& Bk::socket() {
                return *m_pSocket;
            }

            bool Bk::isAccessOperationCode(char type) {
                if (type != OPERATION_BACKUP) {
                    BOOST_LOG_TRIVIAL(error) << "Не корректный запрос";
                    return false;
                }
                return true;
            }

            bool Bk::firstInit() {
                HeaderCleintUpload* headerClient = (HeaderCleintUpload*) (m_pBuffer);
                m_FileSize = headerClient->fileSize;

                if (!isAccessOperationCode(headerClient->type)) {
                    return false;
                }

                m_BytesAllRecive = 0;
                m_Order = 0;

                //проверяем что пользователь с таким токеном есть
                Global::Users user(m_pMongoGlobal);

                string token = headerClient->token;
                if (user.getUserId(token) == "") {
                    try {
                        m_pSocket->send(boost::asio::buffer(&Bk::NOT_ACCESS_TOKEN, 1));
                    } catch (boost::exception &e) {
                        BOOST_LOG_TRIVIAL(error) << "exception e=";
                    }
                    BOOST_LOG_TRIVIAL(debug) << "start delete this Bk 1";
                    //delete this;
                    BOOST_LOG_TRIVIAL(debug) << "end delete this Bk";
                    return false;
                }

                string pathToBlock = m_pConfig->getProperty<string>("FileSysteam.folders_blocks");
                string ip = m_pConfig->getProperty<string>("Others.ip");
                uint_64 freeSpace = Helper::FileSystem::getFreeSpace(pathToBlock);

                Block::AllocatedBlocks blocksForWriten(m_FileSize, ip, m_pConfig, m_pMongoLocal);
                m_pBlockForReadFile = blocksForWriten.getStreamWriter();


                //create file in global bd
                Global::Files fileMongo(m_pMongoGlobal);

                string dirictoryIdTest = headerClient->dirictoryId;
                BOOST_LOG_TRIVIAL(debug) << "\n\ndirictoryIdTest=" << dirictoryIdTest << "\n\n";
                m_FileIdGlobalDb = dirictoryIdTest;

                m_pBuffer = m_pBuffer + sizeof (HeaderCleintUpload);

                m_pBlockForReadFileIter = m_pBlockForReadFile.begin();
                setDataInMongoLocal();
                return true;
            }

            void Bk::handle_read(const boost::system::error_code& error, size_t bytes_transferred) {
                BOOST_LOG_TRIVIAL(debug) << "\n\nlol=" << m_Order << "\n\n";
                if (m_Order == 16) {
                    int g = 0;
                }

                if (error != boost::asio::error::eof && error) {
                    BOOST_LOG_TRIVIAL(error) << "\nerror in handle_read  error code= "
                            << error.value() << "\n";
                    BOOST_LOG_TRIVIAL(debug) << "start delete this Bk";
                    //delete this;
                    BOOST_LOG_TRIVIAL(debug) << "end delete this Bk";
                    return;
                }

                if (m_BytesAllRecive == 0) {
                    if (!firstInit())
                        return;
                    else
                        bytes_transferred -= sizeof (HeaderCleintUpload);
                }

                int wasWrite = (*m_pBlockForReadFileIter)->write(m_pBuffer, bytes_transferred);

                BOOST_LOG_TRIVIAL(debug) << "\n\n\n m_BytesAllRecive=" << m_BytesAllRecive
                        << "\nwasWrite =" << wasWrite
                        << "m_FileSize=" << m_FileSize << "\n\n\n";

                if (m_BytesAllRecive + wasWrite >= m_FileSize) {
                    //Конец записи в файл
                    BOOST_LOG_TRIVIAL(debug) << "Запись файла закончена, m_BytesAllRecive="
                            << m_BytesAllRecive << " m_FileSize=" << m_FileSize;

                    //setDataInMongoLocal();
                    return;
                }

                if (wasWrite < bytes_transferred) {
                    if (m_Order <= m_pBlockForReadFile.size()) {
                        setDataInMongoLocal();
                        if (wasWrite > 0)
                            wasWrite += (*m_pBlockForReadFileIter)->write(m_pBuffer + wasWrite, bytes_transferred - wasWrite);
                    } else {
                        m_BytesAllRecive += bytes_transferred;
                        handle_read(error, 0);
                        return;
                    }
                }


                if (m_BytesAllRecive == 0) {
                    BOOST_LOG_TRIVIAL(debug) << "\n\n\nMove pointer!!!!!\n\n\n";
                    m_pBuffer = m_pBuffer - sizeof (HeaderCleintUpload);
                }

                m_BytesAllRecive += wasWrite;
                if (m_BytesAllRecive >= m_FileSize) {
                    //Конец записи в файл
                    BOOST_LOG_TRIVIAL(debug) << "Запись файла закончена, m_BytesAllRecive="
                            << m_BytesAllRecive << " m_FileSize=" << m_FileSize;

                    //setDataInMongoLocal();
                    return;
                }
                start();
            }

            void Bk::start() {
                boost::asio::async_read(*m_pSocket, boost::asio::buffer(m_pBuffer, 8192),
                        boost::bind(&Bk::handle_read, shared_from_this(),
                        boost::asio::placeholders::error,
                        boost::asio::placeholders::bytes_transferred));
            }

            void Bk::handle_write(const boost::system::error_code& error, size_t bytes_transferred) {

            }

            Bk::~Bk() {
                BOOST_LOG_TRIVIAL(debug) << "destructor Bk";
                m_pSocket->close();

                for (int i = 0; i < ipBackups.size(); i++) {
                    ipBackups[i]->close();
                }

                BOOST_LOG_TRIVIAL(debug) << "!!destructor Bk";

            }

        }
    }
}