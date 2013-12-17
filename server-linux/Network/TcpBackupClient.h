#pragma once
#include <boost/uuid/uuid.hpp>            // uuid class
#include <boost/uuid/uuid_generators.hpp> // generators
#include <boost/uuid/uuid_io.hpp>         // streaming operators etc.
#include <boost/lexical_cast.hpp>
#include <boost/log/trivial.hpp>
#include <boost/asio.hpp>

#include <sstream>
#include <vector>
#include <string>
#include <exception>

#include "../Helper/Crypto.h"
#include "../Interface/CurrentBaseOperations/ICurrentBaseOperationEditor.h"
#include "../DataBase/SingletoneConn.h"
#include"../DataBase/Tables/ServerFiles.h"
#include "../Config.h"
#include "../DataBase/Tables/AddressBlocks.h"
#include "SearchServer.h"
#include "StructServersResponce.h"
#include "../FileSystem/Block.h"
#include "../FileSystem/FileStreamRead.h"

/**
 * ЗАпускать в другом потоке
 */

class TcpBackupClient {
public:


    /**
     * 
     * @param file_id файл котоырй бекапим
     * @param editor что использвоать для доабвления в базу ключ->значние
     */
    TcpBackupClient(unsigned int file_id, IBaseEditor * editor, Connection* connect);

    /**
     * Запуск бекапа
     */
    void start();

    ~TcpBackupClient();

private:
    unsigned int file_id;
    Connection* conn;
    
    /**
     * Информация о блокаха
     */
    ResultSet* result_db = NULL;

    IBaseEditor* editorProvader;

    /**
     * 
     * генерирует занчнеие value и вставлет в БД ключ - знач
     * @param length длина файла в блоке из БД
     * @param order номер блока и файла из БД
     * @param offset из БД
     * @return token
     */
    std::string generateAndSetDataInRedis(unsigned int length,  unsigned int order, unsigned int offset);

    /**
     * Сначало ищет сервера а потом загружает
     */
    void searchAndDownloads(); 
    
    /**
     * Загрузка файла меньше BLOCK_SIZE
     */
    void download_single_block();
    
    /**
     * Загрузка файла из блока на дургой (Запускать в другом потоке)
     * @param length инфа из БД server_files
     * @param order инфа из БД server_files
     * @param offset инфа из БД server_files
     * @param ip куда грузить
     * @return удачная ли загрузка
     */
    bool downloadBlock(std::string pathToBlock, unsigned int length,  unsigned int order, unsigned int offset, std::string ip);
   
};

struct SendHeadersClientTcp {
public:
    char token[128];
    unsigned long long file_size;
   
};