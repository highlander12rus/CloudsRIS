<?php

defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Authorization user use social network sush as Vkontakte, Facebook, Twitter for REST api
 */
class Auth_REST {

    const LIFETIME_TOKEN = 86400; // 24 * 60 * 60;

    private $user = NULL;

    /**
     * 
     * @param string $email
     * @param string|sha512 $password hash password algotithm sha512
     * @return boolean авторизирован или нет
     */
    public function login($email, $password) {
        $user = ORM::factory('User')
                ->where('email', '=', $email)
                ->where('password', '=', $password)
                ->find();

        if ($user->loaded()) {
            $user->lifetime = time() + self::LIFETIME_TOKEN;
            $user->session_id = $this->generateUniqId();
            $user->save();

            $this->user = $user;
        }
        return $user->loaded();
    }

    public function get_user() {
        return $this->user;
    }

    public function logout() {
        //Меняем время досутпа у токена
        DB::update(self::USER_TABLE)->parameters(array(
            'lifetime' => time() - 3600
        ))->execute();

        // Double check
        return !$this->logged_in();
    }

    /**
     * Checks if a session is active.
     *
     * @param string token token users into bd
     * @return  boolean
     * @throw HTTP_Exception_401 - пользователь не авторизирован
     */
    public function logged_in($token) {
        $user = ORM::factory('User')
                ->where('session_id', '=', $token)
                ->find();

        if (!$user->loaded() || $user->lifetime < time()) {
            throw HTTP_Exception::factory(401)->authenticate('CloudsRIS');
        }

        if (!$user)
            return FALSE;

        if ($user instanceof Model_User AND $user->loaded()) {
            $this->user = $user;
            return TRUE;
        }
    }

    /**
     * Возращает токен
     * @return null|string null - если токена нет
     */
    public function getToken() {
        if ($this->user !== NULL)
            return $this->user->session_id;
        else
            return NULL;
    }

    public function getLeftTime() {
        if ($this->user !== NULL)
            return $this->user->lifetime;
        else
            return NULL;
    }

    /**
     * 
     * @return string "уникальный" индификатор
     */
    private function generateUniqId() {
        return hash('sha512', uniqid(mt_rand(0, 2E8), true));
    }

}
