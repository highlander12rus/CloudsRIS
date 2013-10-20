#pragma once
#include <boost/function.hpp>
#include <vector>

namespace Event {

    /**
     * Singleton
     * @see http://habrahabr.ru/post/171471/
     * Абстрактный класс для созданиея своих событий
     */
    typedef boost::function<void()> EventCallback;
    
    class EventListend {
    public:

        static EventListend& Instance();

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

    private:

        EventListend() {
        };
        EventListend(const EventListend root);
        EventListend& operator=(const EventListend&);

    };

}