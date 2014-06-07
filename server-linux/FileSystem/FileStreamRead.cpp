#include "FileStreamRead.h"

namespace FileSystem 
{
	StreamRead::StreamRead(fstream* file, unsigned int offset, unsigned int length): Stream(file,offset,length){}

	unsigned int StreamRead::read(char* buffer, unsigned int lengthBuffer)
	{
		if(dOffset >=  length)
			return 0;
			
		else if(dOffset + lengthBuffer >= length)
			lengthBuffer =  length - dOffset;	

		file->seekg (offset + dOffset,file->beg);
		file->read(buffer, lengthBuffer);
		dOffset += lengthBuffer;
		return lengthBuffer;	
	}		
			
}
