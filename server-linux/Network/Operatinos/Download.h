#ifndef DOWNLOAD_H
#define	DOWNLOAD_H

#include <boost/bind.hpp>
#include <boost/asio.hpp>
#include <boost/log/trivial.hpp>
#include <boost/shared_ptr.hpp>
#include <boost/enable_shared_from_this.hpp>
#include <vector>

#include "../Struct/StructHeaderClientDownload.h"
#include "../../Database/MongoDB.h"
#include "../../Database/MongoGlobal.h"
#include "../../Database/Collection/Gobal/Files.h"
#include "../../Database/Collection/Local/Files.h"
#include "../../Config.h"
#include "../../Database/MongoLocal.h"
#include "../../FileSystem/Block.h"
#include "../../FileSystem/FileStreamRead.h"




namespace Network {
    namespace Tcp {
        namespace Operatinos {

            using namespace Database;
            using namespace Database::Collection;
            using boost::asio::ip::tcp;
            typedef long long uint_64;
            using mongo::DBClientCursor;
            using namespace std;

            /**
             * Класс отвечающий за загрузку файла клиентом т.е. отдачу файла с сервера
             */
            class Download : public boost::enable_shared_from_this<Download> {
            public:
                typedef boost::shared_ptr<Download> pointer;

                /**
                 * Текущий юзер не имеет досутп к данному файлу
                 */
                const static char USER_FILE_NOT_ACCESS;

                /**
                 * ФАйл находится не наэтом сервере
                 * ДАльше шлется по 4 байта ip адресса с которых можно скачать данный файл
                 */
                const static char FILE_NOT_CURRENT_SERVER;

                static pointer create(boost::asio::io_service* io_service,
                        Config* config, MongoGlobal* mongoGlobal, MongoLocal* mongoLocal);

                
                tcp::socket& socket();
                
                /**
                 * Запук ожидания прослушивания приема информации
                 */
                void start();
                
                ~Download();
                
            protected:
                
                std::auto_ptr<DBClientCursor> m_FileLocalCursor;
                BSONObj m_BsonObjectCuent;
                bool isEnd;
                
                
                Download(boost::asio::io_service* io_service, Config* config,
                        MongoGlobal* mongoGlobal, MongoLocal* mongoLocal);


                void SendBinary(char* bytes, uint_32 length);


                /**
                 * обработчик чтия данных от клиента
                 * 
                 * @param error
                 * @param bytes_transferred
                 * @return продолжать ли загрузку дальше
                 */
                virtual void handle_read(const boost::system::error_code& error, size_t bytes_transferred);

                /**
                 * Обработчик отправки данных клиенту
                 * @param error
                 * @param bytes_transferred
                 * @return 
                 */
                virtual void handle_write(const boost::system::error_code& error, size_t bytes_transferred);
          
                FileSystem::StreamRead* m_pStreamReader;

                /**
                 * Устанавливает перменные для чтения блока
                 */
                void setVirableForReadFile();


                /**
                 * Закрывает соединения
                 */
                void Close();

                tcp::socket* m_pSocket;

                /**
                 * Размер файла из БД
                 */
                uint_64 m_FileSize;


                MongoLocal* m_pMongoLocal;
                MongoGlobal* m_pMongoGlobal;

                
                
                /**
                 *  указатель на буфер
                 */
                char* m_pBuffer;

                /**
                 * Порция чтения файла
                 */
                char* m_pBufferReadFile;


                /**
                 * Сколько всего байт было отправленно
                 */
                uint_64 m_BytesAllSend;

                /**
                 * Сколько было прочитано из файла
                 */
                uint_32 m_BytesLastRead;

                /**
                 * Сколько было отправленно байт
                 */
                uint_32 m_BytesLastTransferred;

                uint_32 m_BufferCurentSize;

                /*vector<BSONObj> m_BSONObjs;
                vector<BSONObj>::iterator m_BSONObjsIter;*/


                //BSONObj* m_BSONObj;

                string m_fileId;


                Config* m_pConfig;
            };
        }
    }
}

#endif	/* DOWNLOAD_H */

