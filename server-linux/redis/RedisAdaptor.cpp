

#include "RedisAdaptor.h"
namespace redis {

    RedisAdaptor::RedisAdaptor(RedisConnection* connection) {
        this->conn = connection;
    }

    std::string RedisAdaptor::get(std::string token) {
        return this->conn->getConn().get(token);
    }

    bool RedisAdaptor::exists(std::string token) {
        return this->conn->getConn().exists(token);
    }

    bool RedisAdaptor::set(std::string token, std::string value) {
        this->conn->getConn().set(token, value);
        return this->conn->getConn().exists(token);
    }

    bool RedisAdaptor::del(std::string token) {
        return this->conn->getConn().del(token);
    }

    RedisAdaptor::~RedisAdaptor() {
    }
}