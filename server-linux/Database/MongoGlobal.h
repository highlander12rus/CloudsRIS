#ifndef MONGOGLOBAL_H
#define	MONGOGLOBAL_H

#include <boost/log/trivial.hpp>
#include "MongoDB.h"


namespace Database {

    class MongoGlobal : public MongoDB {
    public:
        static MongoGlobal& sInstance();

        ~MongoGlobal();
    private:
        MongoGlobal();
        MongoGlobal(const MongoGlobal& orig);
        MongoGlobal& operator=(const MongoGlobal&);

    };
}


#endif	/* MONGOGLOBAL_H */




