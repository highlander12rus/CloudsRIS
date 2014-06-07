#pragma once

#include <string>
#include <fstream>
#include <iostream>
#include <boost/log/trivial.hpp>

#include "../Config.h"
#include "../Exception/ExceptionFileNotOpened.h"
#include "FileStreamRead.h"
#include "FileStreamWrite.h"


namespace FileSystem {
    namespace Block {

        
        using namespace std;
        typedef unsigned int uint_32;
        
        class Block {
            
        public:
            
            
            /**
             * Если известен буть до блока (с названием)
             * @param pathToBlock
             */
            Block(std::string pathToBlock);
            
            /**
             * Создать новый блок
             * @param config параметры конфигурации из файла конфигурации (для получение места хренения блоков)
             * @param newNameBlock имя новго блока (например id из базы)
             */
            Block(Config* config, std::string newNameBlock);
            
            /**
             * stream чтения данных из блока
             * @param offset сколько отсутпить в блоке
             * @param length длинна файла в блоке
             * @return 
             */
            StreamRead* readFile(uint_32 offset, uint_32 length);
            
            
            /**
             * stream записи данных в блок
             * @param offset сколько отсутпить в блоке
             * @param length длинна файла в блоке
             * @return 
             */
            StreamWrite* writeFile(uint_32 offset, uint_32 length, std::string blockId);
            
            /**
             * проверка блока на корректность
             * @param offset
             * @param length
             * @param md5
             * @return 
             */
            bool checkFile(unsigned int offset, unsigned int length, string md5);
            
            ~Block(void);
            

            
        private:
            std::string m_pathToBlock;
            fstream* m_pFile;
            
            /**
             * Создает блок и заполняет его 0-ми
             * @param blockSize размер создаваемого блока в батах
             */
            void createBlock(uint_32 blockSize);
        };
    }
}
