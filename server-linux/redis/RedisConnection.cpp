
#include "RedisConnection.h"
#include "../Config.h"

namespace redis {

    RedisConnection& RedisConnection::Instance() {
        static RedisConnection theSingleInstance;
        return theSingleInstance;
    }

    redis::client& RedisConnection::getConn() {
        return *shared_c;
    }

    RedisConnection::RedisConnection() {
        std::string host = REDIS_HOST;
        shared_c = boost::shared_ptr<redis::client>(new redis::client(host));
    }

    RedisConnection::RedisConnection(const RedisConnection& orig) {
    }

    RedisConnection::~RedisConnection() {
    }
}
