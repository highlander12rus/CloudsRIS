#ifndef STRUCTHEADERCLIENTDOWNLOAD_H
#define	STRUCTHEADERCLIENTDOWNLOAD_H

typedef unsigned int uint_32;

/**
 * Структура когда клиент хочет скачать файл
 */
struct HeaderClientDownload {
public:
    char type;
    char token [129];
    char file_id[25];
};


#endif	/* STRUCTHEADERCLIENTDOWNLOAD_H */

