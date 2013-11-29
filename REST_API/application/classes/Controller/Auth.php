<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Auth extends Controller_JSON
{

    /**
     * Выполняет авторизацию пользователя
     */
    public function action_get()
    {
        //Проверяем заголовок
        $auth = $this->request->headers('authorization');
        if ($auth === NULL) { //авторизация не указана. передаем способ авторизации
            throw HTTP_Exception::factory(401)->authenticate('CloudsRIS');
        } else {
            //пробуем разобрать заголовок
            if(UTF8::strpos($auth, 'Login') === FALSE) {
                throw new HTTP_Exception_412(); //не верынй заголовок
            }
            $auth = UTF8::str_ireplace("Login", "", $auth);
            
            list($email, $password) = explode('=', $auth);
            $email = UTF8::trim($email);
            $password = UTF8::trim($password);
            $password = UTF8::strtolower($password);
          //  echo $password ;
            if(!Auth::instance()->login($email, $password)) {
                throw HTTP_Exception::factory(401)->authenticate('CloudsRIS');
            }
        }
        //Авторизация пройдена шлем необходимые заголовки
        $this->response->headers(array(
            'expires' => date('r', Auth::instance()->getLeftTime()),
        ));

        $this->json->token = Auth::instance()->getToken();
    }
}