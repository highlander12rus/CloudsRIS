#pragma once
#include "FileStreamWrite.h"

namespace FileSystem {

    StreamWrite::StreamWrite(fstream* file, unsigned int offset, unsigned int length,
            string blockId) : Stream(file, offset, length) {
        m_BlockId = blockId;
    }

    string StreamWrite::getBlockId() {
        return m_BlockId;
    }
    
    unsigned int StreamWrite::getOffset() {
        return offset;
    }

    unsigned int StreamWrite::getLength() {
        return length;
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



}
