    
    #pragma once

#include "EventListend.h"
#include <boost/system/error_code.hpp>
#include <boost/signal.hpp>

typedef boost::function<void(boost::system::error_code&, std::size_t)> EventBroatcast;

namespace Event {

    class UdpOnceEvent : private EventListend<EventBroatcast> {
      
    public:
        
        
         /**
          * Пришел udp brotcast
          */
         boost::signal<void(boost::system::error_code&, std::size_t)> OnRecieve;
         
         static UdpOnceEvent& Instance();
         
        
        /**
         * Добавление функции к событию, вызыватся будет один раз потом удалена
         * boost::bind(&CLASSNAME::METHOD, this)
         * @param ev
         */
        virtual void addEvent(EventBroatcast ev);

        /**
         * Удаление конкретного события
         * @todo: не факт что надо
         * @param ev
         */
        virtual void removeEvent(EventBroatcast ev);

        /**
         * Запуск всех событий
         */
        virtual void runAll(boost::system::error_code& error_code, std::size_t byte_transfer);

        /**
         * Удаление всех событий
         */
        virtual void removeAll();
        
    protected:
        UdpOnceEvent();
        UdpOnceEvent(const UdpOnceEvent& root);
        UdpOnceEvent& operator=(const UdpOnceEvent&);

    };
}



