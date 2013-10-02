#pragma once
#include "FileStream.h"

namespace FileSystem 
{
	class StreamRead : public  Stream
	{	
		public:
		StreamRead(fstream* file, unsigned int offset, unsigned int length);
		unsigned int read(char* buffer, unsigned int lengthBuffer);		
			
	};
}
