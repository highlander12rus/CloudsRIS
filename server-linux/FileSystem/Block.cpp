#include "Block.h"


namespace FileSystem {
    namespace Block {

        Block::Block(std::string pathToBlock, unsigned long long oC) {
            this->occupied_space = oC;
            file = new fstream();
            file->open(pathToBlock.c_str(), ios::out | ios::binary | ios::in);
            if (file->fail())
                throw new Exception::FileSystem::FileNotOpened();

        }

        Block::Block(std::string pathToBlock, void* create, void* create2) {
            this->occupied_space = 0;
            string FileName = pathToBlock;
            file = new fstream();
            cout << FileName.c_str() << endl;
            file->open(FileName.c_str(), ios::out | ios::binary | ios::in | ios::trunc);
            if (file->fail())
                throw new Exception::FileSystem::FileNotOpened();
            this->createBlock();
        }

        void Block::createBlock() {
            char* newBlock = new char[BLOCK_SIZE];
            file->write(newBlock, BLOCK_SIZE);
            delete[] newBlock;
        }

        StreamRead* Block::readFile(unsigned int offset, unsigned int length) {
            if (BLOCK_SIZE >= offset + length)
                return new FileSystem::StreamRead(file, offset, length);
            return new FileSystem::StreamRead(file, offset, BLOCK_SIZE - (offset + length));

        }

        StreamWrite* Block::writeFile(unsigned int offset, unsigned int length) {
            if (BLOCK_SIZE >= offset + length)
                return new FileSystem::StreamWrite(file, offset, length);
            return new FileSystem::StreamWrite(file, offset, BLOCK_SIZE - (offset + length));
        }

        bool Block::checkFile(unsigned int offset, unsigned int length, string md5) {

        }

        Block::~Block(void) {
            file->close();
        }

    }
}
