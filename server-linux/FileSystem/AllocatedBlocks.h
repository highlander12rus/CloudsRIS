#pragma once
#include "../Config.h"
#include "../DataBase/SingletoneConn.h"
#include "Block.h"
#include <vector>
#include  <math.h>
#include <sstream>
#include "../DataBase/Tables/Blocks.h"
#include "../DataBase/Tables/AddressBlocks.h"

namespace FileSystem {
    namespace Block {

        
        class AllocatedBlocks {
        public:
            /**
             * 
             * @param sizeFile
             * @param ip
             */
            AllocatedBlocks(uint64_t sizeFile, std::string ip);
            
            /**
             * get vectors of found bloks
             * @return 
             */
            std::vector<Block*> getVectors();
            
            ~AllocatedBlocks();
        private:
            /**
             * округление вверх для больших чисел
             * @return 
             */
            int round();
            uint64_t sizeFile;
            
            //@TODO: fix this it shit
            std::string ip;
            
            std::vector<Block*> blocks;
            
            
            /**
             * search bloks for big files(files > BLOCK_SIZE)
             */
            void createBlock();
            
            /**
             * search bloks for smal files(files <= BLOCK_SIZE)
             */
            void searchSmall();
            
            
        };


    }
}