#pragma once
#include <boost/function.hpp>
#include <vector>

namespace Event {

    /**
     * Singleton
     * @see http://habrahabr.ru/post/171471/
     * Абстрактный класс для созданиея своих событий
     */
    
    
    template <class T>
    class EventListend {
    public:

        

        /**
         * Добавление функции к событию, вызыватся будет один раз потом удалена
         * boost::bind(&CLASSNAME::METHOD, this)
         * @param ev
         */
        virtual void addEvent(T ev) = 0;
        
        /**
         * Удаление конкретного события
         * @todo: не факт что надо
         * @param ev
         */
        virtual void removeEvent(T ev) = 0;
        
        
        /**
         * Удаление всех событий
         */
        virtual void removeAll() = 0;


    };

}