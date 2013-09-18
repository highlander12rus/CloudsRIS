#include "FileStreamRead.h"

namespace FileSystem 
{

	unsigned int read(char* buffer, unsigned int lengthBuffer)
	{
		if(dOffset >=  length)
			return 0;
			
		else if(dOffsset + lengthBuffer >= length)
			lengthBuffer =  length - dOffsset;	

		file->seekg (0, offset + dOfsset);
		file->read(buffer, lengthBuffer);
		dOffset += lengthBuffer;
		return lengthBuffer;	
	}		
			
}
