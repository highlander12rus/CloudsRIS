#pragma once
#include "FileStreamWrite.h"

namespace FileSystem {

    StreamWrite::StreamWrite(fstream* file, unsigned int offset, unsigned int length) : Stream(file, offset, length) {
    }

    unsigned int StreamWrite::write(char* buffer, unsigned int lengthBuffer) {
        if (dOffset >= length)
            return 0;

        else if (dOffset + lengthBuffer >= length)
            lengthBuffer = length - dOffset;

        file->seekg(offset + dOffset, file->beg);
        file->write(buffer, lengthBuffer);
        dOffset += lengthBuffer;
        return lengthBuffer;
    }

    StreamWrite::~StreamWrite()  {
    };

}
