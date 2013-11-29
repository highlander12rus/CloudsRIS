<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_REST extends Controller_JSON
{
    /**
     * Тип авторизации используемой на сервере
     */

    const AUTH_TYPE = 'basic';

    //@todo: добавить логирование
    //@todo: рефракторинг
    public function before()
    {
        //Проверяем заголовок
        $auth = $this->request->headers('authorization');
        if ($auth === NULL) { //авторизация не указана. передаем способ авторизации
            throw HTTP_Exception::factory(401)->authenticate(self::AUTH_TYPE);
        } else {
            //пробуем разобрать заголовок
            $auth = UTF8::strtolower($auth);
            if (UTF8::strpos($auth, self::AUTH_TYPE) === FALSE) {
                throw new HTTP_Exception_412(); //не верынй заголовок
            }

            $auth = UTF8::trim($auth);
            list($type, $access_token) = explode(' ', $auth);
            $access_token = UTF8::trim($access_token);

            if (Auth::instance()->logged_in($access_token)) {
                //Обновляем время дествия токена
                Auth::instance()->get_user()->lifetime = time() + Auth_REST::LIFETIME_TOKEN;
                Auth::instance()->get_user()->save();
                $this->response->headers(array(
                    'expires' => date('r', Auth::instance()->getLeftTime()),
                ));
            } else {
                throw HTTP_Exception::factory(401)->authenticate(self::AUTH_TYPE);
            }
            //нет не каких исключений значит авторизированы

            parent::before();
        }
    }

}