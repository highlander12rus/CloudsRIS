#include "FileStream.h"

namespace FileSystem {

    Stream::Stream(fstream* file, unsigned int offset, unsigned int length) {
        this->file = file;
        this->offset = offset;
        this->length = length;
        dOffset = 0;
    }

    Stream::~Stream() {
    };
}
