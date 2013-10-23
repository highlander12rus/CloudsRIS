#pragma once
#include "redisclient.h"
#include <string>
#include <boost/shared_ptr.hpp>

namespace redis {

    class RedisConnection {
    public:

        static RedisConnection& Instance();
        redis::client& getConn();
        
    private:


        boost::shared_ptr<redis::client> shared_c;

        RedisConnection();
        RedisConnection(const RedisConnection& orig);
        ~RedisConnection();
        RedisConnection& operator=(const RedisConnection&);
    };

}