#include "AllocatedBlocks.h"

namespace FileSystem {
    namespace Block {

        AllocatedBlocks::AllocatedBlocks(uint64_t sizeFile, std::string ip,
                Config* config, MongoLocal* locaMongo) {
            m_pConfig = config;
            m_BlockSize = config->getProperty<uint_32>("FileSysteam.block_size");
            m_pMongoLocal = locaMongo;

            m_SizeFile = sizeFile;
            m_Ip = ip;

            if (sizeFile > m_BlockSize) {
                //@todo: Сделать. чтобы оставшиеся чась блока добавлялась в стаую блок если есть
                this->createBlocks(sizeFile); //для больших файлов сразу создаем отдельный блок
            } else {
                this->searchSmall(sizeFile);
            }
        }

        std::vector<Block*> AllocatedBlocks::getBlocks() {
            return m_Blocks;
        }

        vector<StreamWrite*> AllocatedBlocks::getStreamWriter() {
            return m_pStreamWriters;
        }

        void AllocatedBlocks::createBlocks(uint_64 fileSize) {
            int blockCount = caclCountBlocks();

            for (int i = 0; i < blockCount - 1; i++) {
                createBlock(m_BlockSize);
            }
            
            uint_64 lengthFile = fileSize - m_BlockSize * (blockCount - 1);
            searchSmall(lengthFile);
        }

        void AllocatedBlocks::createBlock(uint_64 fileSize) {
            Local::Blocks blocks(m_pMongoLocal);
            string block_id = blocks.CreateBlock(fileSize);
            BOOST_LOG_TRIVIAL(debug) << "Create blocks complited id_bock=" << block_id
                    << "size in block=" << fileSize;

            Block* block = new FileSystem::Block::Block(m_pConfig, block_id + ".blb");
            m_Blocks.push_back(block);

            m_pStreamWriters.push_back(block->writeFile(0, fileSize, block_id));
        }

        int AllocatedBlocks::caclCountBlocks() {
            int blockCount = (m_SizeFile / m_BlockSize);
            if (blockCount * m_BlockSize != m_SizeFile) {
                blockCount++;
            }
            return blockCount;
        }

        void AllocatedBlocks::searchSmall(uint_64 fileSize) {
            Local::Blocks blocks(m_pMongoLocal);

            FileInformInBlock infoBlock = blocks.serachFreeSpaceInBlock(fileSize);
            string id_block = infoBlock.blockId;

            string pathToBlocks = m_pConfig->getProperty<string>("FileSysteam.folders_blocks");
            if (infoBlock.isIsset) {
                Block* block = new Block(pathToBlocks + id_block + ".blb");
                m_Blocks.push_back(block);
                m_pStreamWriters.push_back(block->writeFile(infoBlock.offset, fileSize, id_block));
            } else {
                createBlock(fileSize);
            }
        }

        AllocatedBlocks::~AllocatedBlocks() {
            BOOST_LOG_TRIVIAL(debug) << "delete in AllocatedBlocks";

            for (int i = 0; i < m_pStreamWriters.size(); i++)
                delete m_Blocks[i];
        }

    }
}