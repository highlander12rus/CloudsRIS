#include "DataBase/SingletoneConn.h"
#include "DataBase/Tables/ServerFiles.h"
#include "FileSystem/Block.h"

//tmp include
#include <string>
#include <fstream>
#include "FileSystem/FileStreamWrite.h"
#include "FileSystem/FileStreamRead.h"

using namespace FileSystem::Block;
int main()
{
		

	Block blockObj(1);//,NULL);// = new Block(1, NULL);
	string FileName ="testfile.test";
	fstream	file;
	file.open(FileName.c_str(),ios::out | ios::binary| ios::in );

	int size;
	file.seekg (0,file.end);
	size = file.tellg();
	file.seekg (0);
	char* buffer = new char[size];
	file.read(buffer,size);
	
	FileSystem::StreamWrite* streamm = blockObj.writeFile(0, size);
	streamm->write(buffer,size);

	FileSystem::StreamRead* streamRead = blockObj.readFile(size, size);
	char* bufferRead = new char[size];
	
	fstream	file1;
	file1.open("readTest.test", ios::out | ios::binary| ios::in | ios::trunc );
	streamRead->read(bufferRead, size);
	file1.write(bufferRead, size);
	

	delete[] buffer, bufferRead;
	return 0;
}
