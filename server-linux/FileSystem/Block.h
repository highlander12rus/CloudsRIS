#pragma once
#include <string>
#include <fstream>
#include <iostream>
#include "../Exception/ExceptionFileNotOpened.h"
#include "FileStreamRead.h"
#include "FileStreamWrite.h"
#include "../Config.h"
using namespace std;
namespace FileSystem {
    namespace Block {

        class Block {
            fstream* file;
        public:
            Block(std::string pathToBlock, unsigned long long oC);
            Block(std::string pathToBlock, void* createBlock, void* create2);
            StreamRead* readFile(unsigned int offset, unsigned int length);
            StreamWrite* writeFile(unsigned int offset, unsigned int length);
            bool checkFile(unsigned int offset, unsigned int length, string md5);
            ~Block(void);
            unsigned long long occupied_space;
            std::string pathToBlockID;
        private:
            void createBlock();
        };
    }
}
