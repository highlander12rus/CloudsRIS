#pragma once
#include <exception>
using namespace std;

namespace Exception
{
	namespace FileSystem
	{
		class FileNotOpened: public exception
		{
		  virtual const char* what() const throw();
		 
		};

	}

}
