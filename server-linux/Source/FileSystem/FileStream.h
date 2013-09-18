#include <fstream>
using namespace std;

namespace FileSystem 
{
	class Stream 
	{
		private:
			unsigned int offset;
			unsigned int dOffset;  //отступ от отступа
			unsigned int length;
			fstream* file;
		public:
			Stream(fstream* file, unsigned int offset, unsigned int length);	
		
		~Stream();	
	};
}
