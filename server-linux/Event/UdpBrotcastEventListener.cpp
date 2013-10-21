#include "UdpBrotcastEventListener.h"

namespace Event {

    UdpBrotcastEventListener& UdpBrotcastEventListener::Instance() {
        static UdpBrotcastEventListener theSingleInstance;
        return theSingleInstance;
    }

    void UdpBrotcastEventListener::addEvent(EventBroatcast ev) {
        this->OnRecieve.connect(ev);
    }

    void UdpBrotcastEventListener::removeEvent(EventBroatcast ev) {
        //@TODO: Удалить
    }

    void UdpBrotcastEventListener::runAll(boost::system::error_code& error_code, std::size_t byte_transfer) {
        this->OnRecieve(error_code, byte_transfer);
        this->removeAll(); //Удаляем сразу после того как все исполнились, они нам не нуны больше
    }

    void UdpBrotcastEventListener::removeAll() {
        //@TODO: не будет ли тут утечки?
        this->OnRecieve.disconnect_all_slots();
    }

    UdpBrotcastEventListener::UdpBrotcastEventListener() {
    }

    UdpBrotcastEventListener::UdpBrotcastEventListener(const UdpBrotcastEventListener & root) {
    }
}

