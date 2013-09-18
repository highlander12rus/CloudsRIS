#include "ExceptionFileNotOpened.h"
namespace Exception
{
	namespace FileSystem
	{
		
		  const char* FileNotOpened::what() const throw()
		  {
		    return "File Open Error";
		  }
		

	}

}
