
#include "AllocatedBlocks.h"

namespace FileSystem {
    namespace Block {

        AllocatedBlocks::AllocatedBlocks(uint64_t sizeFile, std::string ip) {
            this->sizeFile = sizeFile;
            this->ip = ip;

            if (sizeFile > BLOCK_SIZE) {
                this->createBlock(); //для больших файлов сразу создаем отдельный блок
            } else {
                this->searchSmall();
            }
        }

        std::vector<Block*> AllocatedBlocks::getVectors() {
            return blocks;
        }

        //@TODO: блокировка таблицы!

        void AllocatedBlocks::createBlock() {
            int blockCount = round();
            sql::Connection* con = Database::SingletoneConn::Instance().getConnection();
            Database::Tables::Blocks block(con);
            for (int i = 0; i < blockCount; i++) {
                //@todo: подумать с базой мб как то лучше можно а не обращатся к ней в цикле

                uint32_t idInsert = block.insertBlocks(PATH_TO_BLOCK, 0, ip);

                std::stringstream pathToFile;
                pathToFile << PATH_TO_BLOCK << "block_" << idInsert << ".blb";
                string path = pathToFile.str();
                blocks.push_back(new Block(path, NULL, NULL));
            }
        }

        int AllocatedBlocks::round() {
            int blockCount = (sizeFile / BLOCK_SIZE);
            if (blockCount * BLOCK_SIZE != sizeFile) {
                blockCount++;
            }
            return blockCount;
        }

        void AllocatedBlocks::searchSmall() {
            sql::Connection* con = Database::SingletoneConn::Instance().getConnection();
            Database::Tables::AddressBlocks addresBlock(con);
            ResultSet* res = addresBlock.getBlokFreeSpaceId(ip, sizeFile);

            if (res->next()) {
                std::cout << "path to block = " << res->getString(1) << "occured = " << res->getInt64(2) << std::endl;
                blocks.push_back(new Block(res->getString(1), res->getInt64(2)));
            } else {
                this->createBlock();
            }
        }

        AllocatedBlocks::~AllocatedBlocks() {
            for (int i = 0; i < blocks.size(); i++) {
                delete blocks[i];
                blocks[i] = NULL;
            }
        }

    }
}