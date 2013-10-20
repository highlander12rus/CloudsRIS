#pragma once

#include "EventListend.h"
#include <boost/signal.hpp>

namespace Event {

    class UdpBrotcastEventListener : public EventListend {
    
        
    public:
         /**
          * Пришел udp brotcast
          */
         boost::signal<void()> OnRecieve;
         
        
        /**
         * Добавление функции к событию, вызыватся будет один раз потом удалена
         * boost::bind(&CLASSNAME::METHOD, this)
         * @param ev
         */
        virtual void addEvent(EventCallback ev);

        /**
         * Удаление конкретного события
         * @todo: не факт что надо
         * @param ev
         */
        virtual void removeEvent(EventCallback ev);

        /**
         * Запуск всех событий
         */
        virtual void runAll();

        /**
         * Удаление всех событий
         */
        virtual void removeAll();

    };
}

