#pragma once
#include <string>
#include "../Interface/CurrentBaseOperations/ICurrentBaseOperationEditor.h"
#include "RedisConnection.h"

using namespace Interface::CurrentBaseOperation;

namespace redis {

    class RedisAdaptor :public ICurrentBaseOperationEditor {
    public:
        
        RedisAdaptor(RedisConnection* connection);
        
        std::string get(std::string token);
        
        bool exists(std::string token);
        
        bool set(std::string token, std::string value);
        
        bool del(std::string token);
        
        ~RedisAdaptor();
        
    private:
     RedisConnection * conn;
    };

}

