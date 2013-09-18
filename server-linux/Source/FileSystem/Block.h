#include <string>
#include <fstream>
#include "../Exception/ExceptionFileNotOpened.h"
#include "FileStreamRead.h"

using namespace std;
namespace FileSystem
{
	namespace Block
	{
		class Block
		{
			fstream* file;
		public:
			Block(unsigned int);
			StreamRead* readFile(unsigned int offset,unsigned int length);
			int writeFile(unsigned int offset,unsigned int length);
			bool checkFile(unsigned int offset,unsigned int length,string md5);
			~Block(void);  
		};
	}
}
