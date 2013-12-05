#pragma once
#include <string>
#include "ICurrentBaseOperation.h"
namespace Interface {
    namespace CurrentBaseOperation  {

        class ICurrentBaseOperationEditor :public ICurrentBaseOperation {
        public:
            /**
             * вставка нового значения в базу
             * @param token
             * @param value
             * @return 
             */
            virtual bool set(std::string token, std::string value)=0;
            /**
             * удаление значения из базы
             * @param token
             * @return 
             */
            virtual bool del(std::string token)=0;

        };

    }
}
typedef Interface::CurrentBaseOperation::ICurrentBaseOperationEditor IBaseEditor;