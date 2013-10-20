#include "UdpBrotcastEventListener.h"

namespace Event {

    void UdpBrotcastEventListener::addEvent(EventCallback ev) {
        this->OnRecieve.connect(ev);
    }

    void UdpBrotcastEventListener::removeEvent(EventCallback ev) {
    }

    void UdpBrotcastEventListener::runAll() {
        this->OnRecieve();
        this->removeAll();//Удаляем сразу после того как все исполнились, они нам не нуны больше
    }

    void UdpBrotcastEventListener::removeAll() {
        this->OnRecieve.disconnect_all_slots();
    }
}

