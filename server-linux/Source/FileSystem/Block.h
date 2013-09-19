#pragma once
#include <string>
#include <fstream>
#include <iostream>
#include "../Exception/ExceptionFileNotOpened.h"
#include "FileStreamRead.h"
#include "FileStreamWrite.h"
#include "../Config.h"
using namespace std;
namespace FileSystem
{
	namespace Block
	{
		class Block
		{
			fstream* file;
		public:
			Block(unsigned int id);
			Block(unsigned int id, void* createBlock);
			StreamRead* readFile(unsigned int offset,unsigned int length);
			StreamWrite* writeFile(unsigned int offset,unsigned int length);
			bool checkFile(unsigned int offset,unsigned int length,string md5);
			~Block(void);  
		private:
			void createBlock();
		};
	}
}
