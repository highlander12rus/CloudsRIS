#include "Upload.h"

namespace Network {
    namespace Tcp {
        namespace Operatinos {


            const char Upload::NOT_ACCESS_TOKEN = 1;
            const char Upload::NOT_SERVERS_FOR_UPLOADING = 2;
            const char Upload::SERVERS_RIDERECT = 3;
            char const Upload::OPERATION_UPLOADING = 1;

            Upload::pointer Upload::create(boost::asio::io_service* io_service,
                    Config* config, MongoGlobal* mongoGlobal, MongoLocal* mongoLocal) {
                return pointer(new Upload(io_service, config, mongoGlobal, mongoLocal));
            }

            Upload::Upload(boost::asio::io_service* io_service, Config* config,
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

            void Upload::SendBinary(char* bytes, uint_32 length) {
                boost::asio::async_write(*m_pSocket, boost::asio::buffer(bytes, length),
                        boost::bind(&Upload::handle_write, shared_from_this(),
                        boost::asio::placeholders::error,
                        boost::asio::placeholders::bytes_transferred));
            }

            void Upload::BackupSendData(char* data, uint_32 length) {
                //@TODO тут возможно лучше aсинхронно отправлять
                BOOST_LOG_TRIVIAL(debug) << "отправка данных бекапа серверам...";

                for (std::vector<tcp::socket* >::iterator it = ipBackups.begin();
                        it != ipBackups.end(); it++) {
                    try {
                        (*it)->send(boost::asio::buffer(data, length));
                    } catch (exception &e) {
                        BOOST_LOG_TRIVIAL(error) << "\nОшибка загрузкки файла!\n";
                    }
                }
            }

            void Upload::SearchBackUpServers() {
                BOOST_LOG_TRIVIAL(debug) << "Старт поиска серверов для бекапа";
                string ip = m_pConfig->getProperty<string>("Others.ip");
                int machineBackup = m_pConfig->getProperty<int>("Others.machine_backup");


                SearchServer serversBackup(m_FileSize, (char*) ip.c_str(), m_pConfig);
                serversBackup.search();
                vector<ServersResponce> servers = serversBackup.getServers();
                if (machineBackup > servers.size()) {
                    BOOST_LOG_TRIVIAL(debug) << "Печаль беда. не достаточно машин для бекапа, будем делать на "
                            << servers.size();
                }

                unsigned short portForBackup = m_pConfig->getProperty< unsigned short >("TCP.port_listen_backup");
                for (int i = 0; i < servers.size() && i < machineBackup; i++) {
                    try {
                        boost::asio::io_service* io_service = new boost::asio::io_service();
                        boost::asio::ip::tcp::endpoint tcp_server(boost::asio::ip::address::from_string(servers[i].ip),
                                portForBackup);
                        boost::asio::ip::tcp::socket* socket_ = new boost::asio::ip::tcp::socket(*io_service);

                        socket_->connect(tcp_server);
                        ipBackups.push_back(socket_);
                    } catch (exception &e) {
                        BOOST_LOG_TRIVIAL(error) << "\nОшибка Соединения с бекапом, ищим другой для бекапа!\n"
                                << e.what();
                        machineBackup++;
                    }
                }

            }

            void Upload::setDataInMongoLocal() {
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

            tcp::socket& Upload::socket() {
                return *m_pSocket;
            }

            bool Upload::firstInit() {
                HeaderCleintUpload* headerClient = (HeaderCleintUpload*) (m_pBuffer);
                m_FileSize = headerClient->fileSize;

                if (headerClient->type != OPERATION_UPLOADING) {
                    BOOST_LOG_TRIVIAL(error) << "Не корректный запрос";


                    return false;
                }

                m_BytesAllRecive = 0;
                m_Order = 0;

                SearchBackUpServers();
                m_pBuffer[0] = 2;


                //проверяем что пользователь с таким токеном есть
                Global::Users user(m_pMongoGlobal);

                string token = headerClient->token;
                if (user.getUserId(token) == "") {
                    try {
                        m_pSocket->send(boost::asio::buffer(&Upload::NOT_ACCESS_TOKEN, 1));
                    } catch (boost::exception &e) {
                        BOOST_LOG_TRIVIAL(error) << "exception e=";
                    }
                    BOOST_LOG_TRIVIAL(debug) << "start delete this Upload 1";
                    //delete this;
                    BOOST_LOG_TRIVIAL(debug) << "end delete this Upload";
                    return false;
                }

                string pathToBlock = m_pConfig->getProperty<string>("FileSysteam.folders_blocks");
                string ip = m_pConfig->getProperty<string>("Others.ip");
                uint_64 freeSpace = Helper::FileSystem::getFreeSpace(pathToBlock);
                if (freeSpace < m_FileSize) {
                    //проверяем есть ли место под файл, если нет посылаем список ip адресов

                    //пока загружается целым файлом на сервер, в будщем сделать чтоб по блокам на разные севера
                    //сдлеать возвращение по кол-во подключений на сервере

                    char* ipChar = (char*) ip.c_str();
                    SearchServer serversUploading(m_FileSize, ipChar, m_pConfig);
                    serversUploading.search();
                    vector<ServersResponce> servers = serversUploading.getServers();
                    if (servers.size() > 0) {
                        ServersResponce serverInfo = servers[0];
                        uint_32 ip = Helper::Network::ipAddresToInt((char*) serverInfo.ip.c_str());
                        m_pSocket->write_some(boost::asio::buffer(&ip, 1));
                        BOOST_LOG_TRIVIAL(debug) << "riderect into ip=" << serverInfo.ip;
                        BOOST_LOG_TRIVIAL(debug) << "start delete this Upload 1";
                        // delete this;
                        BOOST_LOG_TRIVIAL(debug) << "end delete this Upload";

                    } else {
                        //серверов нет
                        BOOST_LOG_TRIVIAL(debug) << "Нет серверов для загруки файла";
                        m_pSocket->write_some(boost::asio::buffer(&Upload::NOT_SERVERS_FOR_UPLOADING, 1));
                        BOOST_LOG_TRIVIAL(debug) << "start delete this Upload 1";
                        //delete this;
                        BOOST_LOG_TRIVIAL(debug) << "end delete this Upload";
                    }
                    return false;
                }

                Block::AllocatedBlocks blocksForWriten(m_FileSize, ip, m_pConfig, m_pMongoLocal);
                m_pBlockForReadFile = blocksForWriten.getStreamWriter();


                //create file in global bd
                Global::Files fileMongo(m_pMongoGlobal);

                string dirictoryIdTest = headerClient->dirictoryId;
                m_FileIdGlobalDb = fileMongo.CreateFileInDirictory(headerClient->dirictoryId,
                        headerClient->fileName,
                        headerClient->fileSize);

                for (int i = 0; i < 24; i++)
                    headerClient->dirictoryId[i] = m_FileIdGlobalDb[i];

                BackupSendData(m_pBuffer, sizeof (HeaderCleintUpload));
                m_pBuffer[0] = 1;


                m_pBuffer = m_pBuffer + sizeof (HeaderCleintUpload);

                m_pBlockForReadFileIter = m_pBlockForReadFile.begin();
                setDataInMongoLocal();
                return true;
            }

            void Upload::handle_read(const boost::system::error_code& error, size_t bytes_transferred) {
                BOOST_LOG_TRIVIAL(debug) << "\n\nlol=" << m_Order << "\n\n";
                if (m_Order == 16) {
                    int g = 0;
                }

                if (error != boost::asio::error::eof && error) {
                    BOOST_LOG_TRIVIAL(error) << "\nerror in handle_read  error code= "
                            << error.value() << "\n";
                    BOOST_LOG_TRIVIAL(debug) << "start delete this Upload";
                    //delete this;
                    BOOST_LOG_TRIVIAL(debug) << "end delete this Upload";
                    return;
                }

                if (m_BytesAllRecive == 0) {
                    if (!firstInit())
                        return;
                    else 
                       bytes_transferred -= sizeof (HeaderCleintUpload);  
                }

                BackupSendData(m_pBuffer, bytes_transferred);

                int wasWrite = (*m_pBlockForReadFileIter)->write(m_pBuffer, bytes_transferred);
                
                BOOST_LOG_TRIVIAL(debug) << "\n\n\n m_BytesAllRecive=" << m_BytesAllRecive
                        << "\nwasWrite =" << wasWrite 
                        <<"m_FileSize=" << m_FileSize <<"\n\n\n";
                
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

            void Upload::start() {
                boost::asio::async_read(*m_pSocket, boost::asio::buffer(m_pBuffer, 8192),
                        boost::bind(&Upload::handle_read, shared_from_this(),
                        boost::asio::placeholders::error,
                        boost::asio::placeholders::bytes_transferred));
            }

            void Upload::handle_write(const boost::system::error_code& error, size_t bytes_transferred) {

            }

            Upload::~Upload() {
                BOOST_LOG_TRIVIAL(debug) << "destructor Upload";
                m_pSocket->close();

                for (int i = 0; i < ipBackups.size(); i++) {
                    ipBackups[i]->close();
                }

                BOOST_LOG_TRIVIAL(debug) << "!!destructor Upload";

            }

        }
    }
}