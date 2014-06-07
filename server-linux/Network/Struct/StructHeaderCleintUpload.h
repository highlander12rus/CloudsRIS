#ifndef STRUCTHEADERCLEINTUPLOAD_H
#define	STRUCTHEADERCLEINTUPLOAD_H

typedef long long uint_64;

struct HeaderCleintUpload {
public:
    char type;
    char token[129];
    char fileName[256];
    char dirictoryId[24]; //для бекапа тут хранится file_id
    uint_64 fileSize;
    
};


#endif	/* STRUCTHEADERCLEINTUPLOAD_H */

