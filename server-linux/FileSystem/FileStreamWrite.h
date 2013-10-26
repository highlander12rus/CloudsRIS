#pragma once
#include "FileStream.h"

namespace FileSystem {

    class StreamWrite : public Stream {
    public:
        StreamWrite(fstream* file, unsigned int offset, unsigned int length);
        unsigned int write(char* buffer, unsigned int lengthBuffer);
        ~StreamWrite();
    };
}
