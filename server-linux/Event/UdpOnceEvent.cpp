#include "UdpOnceEvent.h"

namespace Event {

    UdpOnceEvent& UdpOnceEvent::Instance() {
        static UdpOnceEvent theSingleInstance;
        return theSingleInstance;
    }

    void UdpOnceEvent::addEvent(EventBroatcast ev) {
        this->OnRecieve.connect(ev);
    }

    void UdpOnceEvent::removeEvent(EventBroatcast ev) {
        //@TODO: Удалить
    }

    void UdpOnceEvent::runAll(boost::system::error_code& error_code, std::size_t byte_transfer) {
        this->OnRecieve(error_code, byte_transfer);
        this->removeAll(); //Удаляем сразу после того как все исполнились, они нам не нуны больше
    }

    void UdpOnceEvent::removeAll() {
        //@TODO: не будет ли тут утечки?
        this->OnRecieve.disconnect_all_slots();
    }

    UdpOnceEvent::UdpOnceEvent() {
    }

    UdpOnceEvent::UdpOnceEvent(const UdpOnceEvent & root) {
    }
}

