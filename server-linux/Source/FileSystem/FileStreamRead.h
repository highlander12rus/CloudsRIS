#include "FileStream.h"

namespace FileSystem 
{
	class StreamRead : public  Stream
	{
		unsigned int read(char* buffer, unsigned int lengthBuffer);		
			
	};
}
