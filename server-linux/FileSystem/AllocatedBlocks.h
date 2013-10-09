#pragma once
#include "../Config.h"
#include "../DataBase/SingletoneConn.h"
#include "Block.h"
#include <vector>

namespace FileSystem {
    namespace Block {

        
        class AllocatedBlocks {
        public:
            /**
             * 
             * @param sizeFile
             */
            AllocatedBlocks(uint64_t sizeFile);
            
            /**
             * get vectors of found bloks
             * @return 
             */
            std::vector<Block> getVectors();
            
            ~AllocatedBlocks();
        private:
            
            /**
             * search bloks for big files(files > BLOCK_SIZE)
             */
            void serachBig();
            
            /**
             * search bloks for smal files(files <= BLOCK_SIZE)
             */
            void searchSmall();
            
            
        };


    }
}