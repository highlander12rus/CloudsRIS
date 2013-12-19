<?php

defined('SYSPATH') OR die('No direct access allowed.');

class Auth_Site {
    private $user = NULL;

    const TIME_AUTH = 432000;//5 суток
    const USER_TABLE = 'users';
    
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
            $user->lifetime = time() + self::TIME_AUTH;
            $user->session_id = $this->generateUniqId();
            Cookie::set('user_auth', $user->session_id, self::TIME_AUTH);
            $user->save();

            $this->user = $user;
        }
        return $user->loaded();
    }

    public function get_user() {
        return $this->user;
    }

    public function logout() {
        Cookie::delete('user_auth');
        // Double check
        return !$this->logged_in();
    }

    /**
     * Checks if a session is active.
     * 
     * @return  boolean
     */
    public function logged_in() {
        $token = Cookie::get('user_auth');
        if($token === NULL)
            return false;
        $user = ORM::factory('User')
                ->where('session_id', '=', $token)
                ->find();

        if (!$user->loaded() || $user->lifetime < time()) {
            return false;
        }

        if (!$user)
            return FALSE;

        if ($user instanceof Model_User AND $user->loaded()) {
            $this->user = $user;
            return TRUE;
        }
    }
    
    /**
     * 
     * @return string "уникальный" индификатор
     */
    public function generateUniqId() {
        return hash('sha512', uniqid(mt_rand(0, 2E8), true));
    }
}
