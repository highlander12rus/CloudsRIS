#pragma once
#include <fstream>
using namespace std;

namespace FileSystem 
{
	class Stream 
	{
		protected:
			unsigned int offset;
			unsigned int dOffset;  //отступ от отступа
			unsigned int length;
			fstream* file = NULL;
		public:
			Stream(fstream* file, unsigned int offset, unsigned int length);	
		
		~Stream();	
	};
}
