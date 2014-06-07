#ifndef MONGOLOCAL_H
#define	MONGOLOCAL_H

#include <string>
#include <boost/log/trivial.hpp>
#include "MongoDB.h"


namespace Database {

    using namespace std;
    
    class MongoLocal : public MongoDB {
    public:
        static MongoLocal& sInstance();
        void connection(string connection);

        ~MongoLocal();
    private:
        MongoLocal();
        MongoLocal(const MongoLocal& orig);
        MongoLocal& operator=(const MongoLocal&);

    };
}

#endif	/* MONGOLOCAL_H */

