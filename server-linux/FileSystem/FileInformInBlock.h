
#ifndef FILEINFORMINBLOCK_H
#define	FILEINFORMINBLOCK_H

#include <string>
using namespace std;
typedef long long uint_64;

namespace FileSystem {

    struct FileInformInBlock {
    public:
        uint_64 offset;
        string blockId;

        /**
         * найдена ли запись в БД
         */
        bool isIsset;

        FileInformInBlock() {
            isIsset = false;
        }

        FileInformInBlock(uint_64 offset, string blockId) {
            this->offset = offset;
            this->blockId = blockId;
            isIsset = true;
        }

    };
}
#endif	/* FILEINFORMINBLOCK_H */

