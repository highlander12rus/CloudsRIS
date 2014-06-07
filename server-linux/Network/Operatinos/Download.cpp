#include "Download.h"


//проверяет есть лии файл в локальной области данного узла
namespace Network {
    namespace Tcp {
        namespace Operatinos {

            const char Download::USER_FILE_NOT_ACCESS = 1;
            const char Download::FILE_NOT_CURRENT_SERVER = 2;

            Download::pointer Download::create(boost::asio::io_service* io_service,
                    Config* config, MongoGlobal* mongoGlobal, MongoLocal* mongoLocal) {
                return pointer(new Download(io_service, config, mongoGlobal, mongoLocal));
            }

            tcp::socket& Download::socket() {
                return *m_pSocket;
            }

            void Download::start() {
                boost::asio::async_read(*m_pSocket, boost::asio::buffer(m_pBuffer, 8192),
                        boost::bind(&Download::handle_read, shared_from_this(),
                        boost::asio::placeholders::error,
                        boost::asio::placeholders::bytes_transferred));
            }

            Download::Download(boost::asio::io_service* io_service, Config* config,
                    MongoGlobal* mongoGlobal, MongoLocal* mongoLocal) {
                uint_32 bufferSize = config->getProperty<uint_32>("TCP.buffer_size");
                BOOST_LOG_TRIVIAL(debug) << "TCP upload buffer size = " << bufferSize;

                m_pBuffer = new char[bufferSize];
                m_pSocket = new tcp::socket(*io_service);


                m_pMongoGlobal = mongoGlobal;

                m_pMongoLocal = mongoLocal;

                m_BytesAllSend = 0;
                m_BytesLastRead = 0;
                m_BytesLastTransferred = 0;

                m_pConfig = config;

                m_pBufferReadFile = new char[m_pConfig->getProperty<uint_32>("FileSysteam.block_size")];
            }

            void Download::handle_read(const boost::system::error_code& error, size_t bytes_transferred) {
                if (m_BytesAllSend == 0) {
                    isEnd = false;
                    HeaderClientDownload* headerStruct = (HeaderClientDownload*) (m_pBuffer);

                    string userToken = headerStruct->token;
                    headerStruct->file_id[24] = '\0';
                    m_fileId = string(headerStruct->file_id).substr(0, 24);

                    BOOST_LOG_TRIVIAL(debug) << "header was read, token="
                            << headerStruct->token
                            << " file_id=" << m_fileId;

                    Collection::Global::Files file(m_pMongoGlobal);
                    if (!file.isAccsesUserFile(userToken, m_fileId)) {
                        BOOST_LOG_TRIVIAL(debug) << "user not access file where file_id" << m_fileId;
                        SendBinary((char*) (&USER_FILE_NOT_ACCESS), 1);

                        BOOST_LOG_TRIVIAL(debug) << "start delete this";
                        //delete this;
                        BOOST_LOG_TRIVIAL(debug) << "end delete this";
                        return; //файл не пользователя
                    }



                    Collection::Local::Files filesLocal(m_pMongoLocal);
                    if (!filesLocal.isExists(m_fileId)) {
                        BOOST_LOG_TRIVIAL(debug) << "file_id " << m_fileId << " not found curent server";
                        SendBinary((char*) (&FILE_NOT_CURRENT_SERVER), 1);

                        //--------------------------СДЕЛАТЬ ПОИСК ФАЙЛОВ НА ДРУГИХ СЕРВАКАХ!!--------------/

                        BOOST_LOG_TRIVIAL(debug) << "start delete this";
                        //delete this;
                        BOOST_LOG_TRIVIAL(debug) << "end delete this";
                        return;
                    }

                    m_FileSize = file.getFileLength(m_fileId);
                    BOOST_LOG_TRIVIAL(debug) << "File size into database = " << m_FileSize;


                    //set begining virable
                    string localDb = m_pMongoLocal->getConnectionCollection("files");
                    m_FileLocalCursor = m_pMongoLocal->getConnection()
                            ->query(localDb, QUERY("file_id" << m_fileId).sort("order"));

                    //отправляем файл       
                    BOOST_LOG_TRIVIAL(debug) << "Start File user download";
                    setVirableForReadFile();
                    //read first partion data
                    m_BytesLastRead = m_pStreamReader->read(m_pBufferReadFile, m_BufferCurentSize);
                    SendBinary(m_pBufferReadFile, m_BufferCurentSize);
                }

            }

            void Download::setVirableForReadFile() {
                static int lol = 0;
                BOOST_LOG_TRIVIAL(debug) << "\n\nlol=" << lol++ << "\n\n";
                m_BsonObjectCuent = m_FileLocalCursor->next();

                std::string pathToBlock = m_pConfig->getProperty<string>("FileSysteam.folders_blocks")
                        + m_BsonObjectCuent["block_id"].String()
                        + ".blb";

                uint_32 BufferSize = m_pConfig->getProperty<uint_32>("FileSysteam.block_size");
                BOOST_LOG_TRIVIAL(debug) << "1";
                uint_32 offset = m_BsonObjectCuent["offset"].Int();
                BOOST_LOG_TRIVIAL(debug) << "2";
                uint_32 length = m_BsonObjectCuent["length"].Int();
                BOOST_LOG_TRIVIAL(debug) << "3";

                m_BufferCurentSize = length > BufferSize ? BufferSize : length;
                BOOST_LOG_TRIVIAL(debug) << "\n\nm_BufferCurentSize=" << m_BufferCurentSize << "\n\n";
                FileSystem::Block::Block block(pathToBlock);
                m_pStreamReader = block.readFile(offset, length);
            }

            void Download::SendBinary(char* bytes, uint_32 length) {
                boost::asio::async_write(*m_pSocket, boost::asio::buffer(bytes, length),
                        boost::bind(&Download::handle_write, shared_from_this(),
                        boost::asio::placeholders::error,
                        boost::asio::placeholders::bytes_transferred));
            }

            void Download::handle_write(const boost::system::error_code& error, size_t bytes_transferred) {
                if (error) {
                    BOOST_LOG_TRIVIAL(debug) << "start delete this writer";
                    //delete this;
                    BOOST_LOG_TRIVIAL(debug) << "end delete this";
                    return;
                }


                if (isEnd) {
                    //привышен разме файла
                    BOOST_LOG_TRIVIAL(debug) << "File size is full, m_BytesAllSend"
                            << m_BytesAllSend
                            << " m_FileSize="
                            << m_FileSize;
                    Close();
                    return;
                }
                isEnd = !m_FileLocalCursor->more();

                m_BytesLastTransferred += bytes_transferred;
                m_BytesAllSend += bytes_transferred;


                if (m_BytesLastRead > m_BytesLastTransferred) {
                    BOOST_LOG_TRIVIAL(debug) << "Data not all full size, m_BytesLastRead = "
                            << m_BytesLastRead
                            << " bytes_transferred=" << bytes_transferred;

                    //данные были не все отправлены, до отправляем
                    uint_32 residue = m_BytesLastRead - m_BytesLastTransferred;
                    SendBinary(m_pBufferReadFile + m_BytesLastTransferred, residue);
                } else {
                    m_BytesLastTransferred = 0;

                    m_BytesLastRead = m_pStreamReader->read(m_pBufferReadFile, m_BufferCurentSize);
                    if (m_BytesLastRead == 0) {
                        if (m_FileLocalCursor->more()) {
                            BOOST_LOG_TRIVIAL(debug) << "start read next block";
                            setVirableForReadFile();
                            //read first partion data
                            m_BytesLastRead = m_pStreamReader->read(m_pBufferReadFile, m_BufferCurentSize);
                        } else {
                            BOOST_LOG_TRIVIAL(debug) << "block was all sending";
                            //конец файла
                            Close();
                            return;
                        }
                    }


                    SendBinary(m_pBufferReadFile, m_BufferCurentSize);
                }
            }

            void Download::Close() {
                //BOOST_LOG_TRIVIAL(debug) << "now connect clients TcpServer::sCountConnection= " << TcpServer::sCountConnection;
                //TcpServer::sCountConnection--;
                m_pSocket->close();
            }

            Download::~Download() {
                BOOST_LOG_TRIVIAL(debug) << "destructor Download";
                Close();
                delete[] m_pBufferReadFile;
                //delete[] m_pBuffer;
                /*
                 
                 delete m_pSocket;
                 */
            }

        }
    }
}