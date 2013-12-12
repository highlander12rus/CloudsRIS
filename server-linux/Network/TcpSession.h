#pragma once
#include "../Config.h"
#include <boost/bind.hpp>
#include <boost/shared_ptr.hpp>
#include <boost/enable_shared_from_this.hpp>
#include <boost/asio.hpp>
#include <boost/log/trivial.hpp>
#include <sstream>
#include <stdlib.h>
#include "../FileSystem/Block.h"
#include "../FileSystem/AllocatedBlocks.h"
#include"../FileSystem/FileStreamWrite.h"
#include "../DataBase/SingletoneConn.h"
#include "../DataBase/Tables/Blocks.h"
#include "../Interface/CurrentBaseOperations/ICurrentBaseOperationEditor.h"
#include "../Helper/StringExtended.h"
#include"../DataBase/Tables/ServerFiles.h"
#include <string>
#include <vector>
#define TYP_INIT 0 
#define TYP_SMLE 1 
#define TYP_BIGE 2 
using boost::asio::ip::tcp;

namespace Network {
    namespace Tcp {

        class TcpSession
        : public boost::enable_shared_from_this<TcpSession> {
        public:
            typedef boost::shared_ptr<TcpSession> pointer;

            static pointer create(boost::asio::io_service& io_service, IBaseEditor * rI, Connection* connect);


            tcp::socket& socket();

            void start();
            ~TcpSession();
        private:

            TcpSession(boost::asio::io_service& io_service, IBaseEditor * rI, Connection* connect);
            void send(char msg);

            /**
             *
             * разбор заголовков
             */
            void parseHeaders();
            /**
             * первый проход с модом w
             * @param bytes_transferred
             */
            void wModeWorkFirst(size_t bytes_transferred);
            /**
             * действие с входящим параметром "w"
             * @param bytes_transferred
             */
            void wModeWork(size_t bytes_transferred);
            /**
             * первый проход с модом s
             * @param bytes_transferred
             */
            void sModeWorkFirst(size_t bytes_transferred);
            /**
             * действие с входящим параметром "s"
             * @param bytes_transferred
             */
            void sModeWork(size_t bytes_transferred);
            
            void handle_write(const boost::system::error_code& /*error*/, size_t /*bytes_transferred*/);
            /**
             * функция преобразующая из сетевого порядка байт в число
             * @param src байтовый массив
             * @return 
             */
            unsigned long long htonll(unsigned long long src);
            /**
             * отправка файла
             */
            void sendFile();
            /**
             * отправка бинарных данных
             * @param buff буфер
             * @param n размер буфера
             */
            void sendBinary(char* buff, unsigned int n);
            void handle_read(const boost::system::error_code& error, size_t bytes_transferred);
            void handle_write_binary(const boost::system::error_code& error, size_t bytes_transferred);
            char g[BUFFER_SIZE];
            tcp::socket socket_;
            std::stringstream token;
            unsigned long long byte_read_count;
            unsigned long long file_size;
            IBaseEditor * redisInstance;
            std::string mod;
            FileSystem::Block::AllocatedBlocks* blockMass;
            //текущий обрабатываемый блока
            int blockThis;
            FileSystem::StreamWrite* strWrite;
            unsigned long long byte_write_block;
            Connection* conn;
            unsigned int idFile;
            char* requestMessage;
            unsigned long long offset;
            int order;
            unsigned long long block_id;
            FileSystem::Block::Block* BlockSMode;
            //virable and function for read file and send clinet
            FileSystem::StreamRead *sreadBock = NULL;   
            /**
             * Количесво байтов которые было прочитано перед отправкой из sreadBock
             */
            unsigned long long  bytes_last_read = 0;
            
            /**
             * Количество байтов которое было отправленно после чтения sreadBock
             */
            unsigned long long  bytes_last_transferred = 0;
            
            /**
             * Блкои скачиваемого файла из БД
             */
            ResultSet* result_read = NULL;
            
            /**
             * Размер который осталось послать до завершение чтение из блока
             */
           // unsigned long long block_length = 0;
            
            char* buffer_for_read = new char[BUFFER_SIZE];
            
            /**
             * Устанавливает sreadBlock  bytes_last_read и bytes_last_transferred
             * для нового чтени блока
             */
            void set_virable_for_read_block ();
            
            /**
             * Отправялет клиенту новый кусок данных
             */
            void sendToClientNewPartionData();
        };
    }
}