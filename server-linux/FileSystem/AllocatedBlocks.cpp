#include "AllocatedBlocks.h"

namespace FileSystem {
    namespace Block {

        AllocatedBlocks::AllocatedBlocks(uint64_t sizeFile) {
            if (sizeFile > BLOCK_SIZE) {
                this->serachBig();
            } else {
                this->searchSmall();
            }
        }

        std::vector<Block> AllocatedBlocks::getVectors() {

        }

        void AllocatedBlocks::serachBig() {

        }

        void AllocatedBlocks::searchSmall() {

        }

        AllocatedBlocks::~AllocatedBlocks() {
        }

    }
}