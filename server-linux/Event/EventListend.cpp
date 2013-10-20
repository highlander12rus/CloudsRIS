
#include "EventListend.h"

namespace Event {

   EventListend& EventListend::Instance() {
        static EventListend theSingleInstance;
        return theSingleInstance;
    }
}

