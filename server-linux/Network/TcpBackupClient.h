#pragma once
#include <boost/uuid/uuid.hpp>            // uuid class
#include <boost/uuid/uuid_generators.hpp> // generators
#include <boost/uuid/uuid_io.hpp>         // streaming operators etc.
#include <boost/lexical_cast.hpp>
#include "../Helper/Crypto.h"
#include "../Interface/CurrentBaseOperations/ICurrentBaseOperationEditor.h"

class TcpBackupClient {
public:
    
    
    /**
     * 
     * @param file_id файл котоырй бекапим
     * @param editor что использвоать для доабвления в базу ключ->значние
     */
    TcpBackupClient(unsigned int file_id,
            Interface::CurrentBaseOperation::ICurrentBaseOperationEditor* editor);

    /**
     * Запуск бекапа
     */
    void start();

    ~TcpBackupClient();

private:
    unsigned int file_id;
    
    Interface::CurrentBaseOperation::ICurrentBaseOperationEditor* editorProvader;

    /**
     * генерирует занчнеие value и вставлет в БД ключ - знач
     */
    void generateAndSetDataInRedis();

};
