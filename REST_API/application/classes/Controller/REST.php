<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_REST extends Controller_JSON
{
    /**
     * Тип авторизации используемой на сервере
     */

    const AUTH_TYPE = 'cloudsris';

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
            if (UTF8::strpos($auth, '=') === FALSE) {
                throw new HTTP_Exception_412(); //не верынй заголовок
            }

            list($type, $access_token) = explode('=', $auth);
            $type = UTF8::trim($type);
            $access_token = UTF8::trim($access_token);

            if (UTF8::strtolower($type) != self::AUTH_TYPE)
                throw new HTTP_Exception_412(); //не верынй заголовок

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