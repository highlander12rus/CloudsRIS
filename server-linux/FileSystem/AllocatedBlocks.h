#pragma once

#include <boost/log/trivial.hpp>
#include <vector>
#include  <math.h>
#include <string>


#include "Block.h"
#include "../Config.h"
#include "../Database/MongoDB.h"
#include "../Database/Collection/Local/Blocks.h"
#include "../Database/Collection/Local/Files.h"
#include "../FileSystem/FileStreamWrite.h"
#include "FileInformInBlock.h"

namespace FileSystem {
    namespace Block {

        using namespace std;
        using namespace Database;
        using namespace Database::Collection;
        using namespace FileSystem;
              
        
        class AllocatedBlocks {
        public:
           
            /**
             * 
             * @param sizeFile
             * @param ip
             * @param config
             * @param locaMongo
             */
            AllocatedBlocks(uint64_t sizeFile, std::string ip,
                Config* config, MongoLocal* locaMongo);

            /**
             * get vectors of found bloks
             * @return 
             */
            std::vector<Block*> getBlocks();

            /**
             * вовзращает блоки в которое можно записывать файлы
             * @return 
             */
            vector<StreamWrite*> getStreamWriter();
            
            ~AllocatedBlocks();
        private:
            
            /**
             * потоки для запис в файл
             */
            vector<StreamWrite*> m_pStreamWriters;
            
            Config* m_pConfig;
            
            /**
             * размер блока из файла конфигурации
             */
            uint_32 m_BlockSize;
            
            /**
             * локальная база сервера
             */
            MongoLocal* m_pMongoLocal;
            
            /**
             * считает количетво блокох исходя из объема
             * @return количество нужных блоков
             */
            int caclCountBlocks();


            uint64_t m_SizeFile;


            //@TODO: fix this it shit? use uint_32
            std::string m_Ip;
            
            std::vector<Block*> m_Blocks;


            /**
             * Создаем много блоков для заданого рамзмера файла
             * @param fileSize
             */
            void createBlocks(uint_64 fileSize);
            
            /**
             * Создает ОДИН блок
             * @param fileSize
             */
            void createBlock(uint_64 fileSize);

            /**
             * Ищет свободное место в других блоках по базе, если не находит созадет новый
             * @param fileSize
             */
            void searchSmall(uint_64 fileSize);


        };


    }
}