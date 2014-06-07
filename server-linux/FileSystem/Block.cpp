#include "Block.h"


namespace FileSystem {
    namespace Block {

        Block::Block(std::string pathToBlock) {
            m_pathToBlock = pathToBlock;
            BOOST_LOG_TRIVIAL(debug) << "Open block into path " << pathToBlock;
            
            //проверка что такой блок существует
            m_pFile = new fstream();
            m_pFile->open(m_pathToBlock.c_str(), ios::out | ios::binary | ios::in);
            if (m_pFile->fail())
                throw new Exception::FileSystem::FileNotOpened();
            //m_pFile->close();
            
            BOOST_LOG_TRIVIAL(debug) << "Block was opend,  path " << pathToBlock;
        }

        Block::Block(Config* config, std::string newNameBlock) {
            m_pathToBlock = config->getProperty<std::string>("FileSysteam.folders_blocks")
                    + newNameBlock;

            BOOST_LOG_TRIVIAL(debug) << "Create new block into path " << m_pathToBlock;

            m_pFile = new fstream();
            m_pFile->open(m_pathToBlock.c_str(), ios::out | ios::binary | ios::in | ios::trunc);
            if (m_pFile->fail())
                throw new Exception::FileSystem::FileNotOpened();

            uint_32 blockSize = config->getProperty<uint_32>("FileSysteam.block_size");
            createBlock(blockSize);

            //m_pFile->close();
            BOOST_LOG_TRIVIAL(debug) << "Block was created, path " << m_pathToBlock;
        }

        //@todo: сделать заполнение через буфер, ато сейчас требуется выделить blockSize памяти

        void Block::createBlock(uint_32 blockSize) {
            //@todo: сделать с помоштю fallocate пред выделение местан а жеском диске
            char* newBlock = new char[blockSize];
            m_pFile->write(newBlock, blockSize);
            delete[] newBlock;
        }

        StreamRead* Block::readFile(uint_32 offset, uint_32 length) {
            uint_32 blockSize = Config::Instance().getProperty<uint_32>("FileSysteam.block_size"); //@todo: shit :)

            BOOST_LOG_TRIVIAL(debug) << "Block open streamReader, blockSize = " << blockSize;
            
            if (blockSize >= offset + length) {
                BOOST_LOG_TRIVIAL(debug) << "Open block stream read for smal files ";
                return new FileSystem::StreamRead(m_pFile, offset, length);
            }
             BOOST_LOG_TRIVIAL(debug) << "Open block stream read for Big files ";
            return new FileSystem::StreamRead(m_pFile, offset, blockSize - (offset + length));
        }

        StreamWrite* Block::writeFile(unsigned int offset, unsigned int length, std::string blockId) {
            uint_32 blockSize = Config::Instance().getProperty<uint_32>("FileSysteam.block_size"); //@todo: shit :)

            BOOST_LOG_TRIVIAL(debug) << "Block open streamWriter, blockSize = " << blockSize;
            
            if (blockSize >= offset + length) {
                BOOST_LOG_TRIVIAL(debug) << "Open block stream writer for smal files ";
                return new FileSystem::StreamWrite(m_pFile, offset, length, blockId);
            }
            BOOST_LOG_TRIVIAL(debug) << "Open block stream writer for Big files ";
            return new FileSystem::StreamWrite(m_pFile, offset, blockSize - (offset + length), blockId);
        }

        bool Block::checkFile(unsigned int offset, unsigned int length, string md5) {

        }

        Block::~Block(void) {
        }

    }
}
