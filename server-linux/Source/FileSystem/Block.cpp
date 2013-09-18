#include "Block.h"


namespace FileSystem
{
	namespace Block
	{
			Block::Block(unsigned int id)
			{
			// connection to database realization
				string FileName ="test.bl";
				fstream* file= new fstream(); 
				file->open (FileName,ios::out | ios::binary| ios::in| ios::app );
				if (file->fail())
					throw new Exception::FileSystem::FileNotOpened();
				
				
			}

			StreamRead* Block::readFile(unsigned int offset,unsigned int length)
			{
				if(BLOCK_SIZE >= offset + length)
					return new FileSystem::StreamRead(file, offset, length);
				return new FileSystem::StreamRead(file, offset, BLOCK_SIZE-(offset + length) );

			}

			int Block::writeFile(unsigned int offset,unsigned int length)
			{

			}

			bool Block::checkFile(unsigned int offset,unsigned int length,string md5)
			{

			}

			Block::~Block(void)
			{
				file->close();
			}
  
	{
}
