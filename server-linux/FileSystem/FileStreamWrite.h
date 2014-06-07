#pragma once
#include <string>
#include "FileStream.h"

using namespace std;

namespace FileSystem {

    class StreamWrite : public Stream {
    public:
        StreamWrite(fstream* file, unsigned int offset, unsigned int length, string blockId);
        unsigned int write(char* buffer, unsigned int lengthBuffer);

        unsigned int getOffset();

        unsigned int getLength();

        /**
         * Вовраащет имя блока без расширения
         * @return 
         */
        string getBlockId();

    private:
        string m_BlockId;

    };
}
