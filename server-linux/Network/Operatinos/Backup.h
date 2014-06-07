#pragma once

#include <vector>
#include <exception>
#include <boost/bind.hpp>
#include <boost/asio.hpp>
#include <boost/shared_ptr.hpp>
#include <boost/enable_shared_from_this.hpp>
#include <boost/log/trivial.hpp>
#include <string>

#include "../Struct/StructHeaderCleintUpload.h"

#include "../../Database/MongoDB.h"
#include "../../Database/MongoGlobal.h"
#include "../../Database/MongoLocal.h"
#include "../../Config.h"
#include "../../Database/Collection/Gobal/Users.h"
#include "../../Database/Collection/Gobal/Files.h"

#include "../../Database/Collection/Local/Blocks.h"
#include "../../Database/Collection/Local/Files.h"

#include "../../Helper/FileSystem.h"
#include "../../Helper/Network.h"

#include "../../FileSystem/AllocatedBlocks.h"
#include "../../FileSystem/Block.h"
#include "../../FileSystem/FileStreamWrite.h"

typedef long long uint_64;
using namespace std;
using namespace FileSystem;
using namespace Database;
using namespace Database::Collection;
using boost::asio::ip::tcp;
typedef unsigned int uint_32;

using mongo::DBClientCursor;



namespace Network {
    namespace Tcp {
        namespace Operatinos {

            class Backup : public boost::enable_shared_from_this<Backup> {
            public:


                typedef boost::shared_ptr<Backup> pointer;

                /**
                 * Опреация бекапа
                 */
                static char const OPERATION_BACKUP;

                static const char NOT_ACCESS_TOKEN;
                static const char NOT_SERVERS_FOR_UPLOADING;
                /**
                 * на текущем сервер нет места, дальше идет список ip адресов куда обращаться
                 */
                static const char SERVERS_RIDERECT;



                static pointer create(boost::asio::io_service* io_service,
                        Config* config, MongoGlobal* mongoGlobal, MongoLocal* mongoLocal);


                ~Backup();
                tcp::socket& socket();

                /**
                 * Запук ожидания прослушивания приема информации
                 */
                void start();

            protected:

                Backup(boost::asio::io_service* io_service, Config* config,
                        MongoGlobal* mongoGlobal, MongoLocal* mongoLocal);

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

                void SendBinary(char* bytes, uint_32 length);


                /**
                 * Порядок файла
                 */
                int m_Order;

                string m_FileIdGlobalDb;


                /**
                 * Список ip адрессов для бекапа
                 */
                std::vector<boost::asio::ip::tcp::socket*> ipBackups;



                vector<StreamWrite*> m_pBlockForReadFile;
                vector<StreamWrite*>::iterator m_pBlockForReadFileIter;

                /**
                 *  указатель на буфер
                 */
                char* m_pBuffer;

                tcp::socket* m_pSocket;

                MongoLocal* m_pMongoLocal;
                MongoGlobal* m_pMongoGlobal;
                Config* m_pConfig;


                uint_64 m_FileSize;






                /**
                 * Порция чтения файла
                 */
                char* m_pBufferReadFile;


                /**
                 * Сколько всего байт было принято
                 */
                uint_64 m_BytesAllRecive;

                /**
                 * Сколько было записано в блок
                 */
                uint_32 m_BytesLastWrite;

                /**
                 * Сколько было отправленно байт
                 */
                uint_32 m_BytesLastRecive;

                uint_32 m_BufferCurentSize;

                /**
                 * Установка в локальную базу информации о файле и блоке в котором находится файл
                 * @param offset отступ в блоке
                 * @param length длина файла в блоке
                 */
                void setDataInMongoLocal();

            };

        }
    }
}