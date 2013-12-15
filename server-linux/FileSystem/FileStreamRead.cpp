#include "FileStreamRead.h"

namespace FileSystem {

    StreamRead::StreamRead(fstream* file, unsigned int offset, unsigned int length) : Stream(file, offset, length) {
    }

    unsigned int StreamRead::read(char* buffer, unsigned int lengthBuffer) {

        if (dOffset >= length)
            return 0;

        else if (dOffset + lengthBuffer >= length)
            lengthBuffer = length - dOffset;
        file->seekg(offset + dOffset, file->beg);

        if (file->read(buffer, lengthBuffer))
            BOOST_LOG_TRIVIAL(debug) << "all characters read successfully.";
        else
            BOOST_LOG_TRIVIAL(debug) << "error: only " << file->gcount() << " could be read";

        BOOST_LOG_TRIVIAL(debug) << "stream reader: offset=" << offset
                << " dOffset" << dOffset << " lengthBuffer=" << lengthBuffer;
        BOOST_LOG_TRIVIAL(debug) << "buffer read in stream reader" << buffer;
        dOffset += lengthBuffer;

        file->close();

        return lengthBuffer;
    }

}
