<?php

defined('SYSPATH') OR die('No direct access allowed.');

class Auth_Site {
    private $user = NULL;

    const LIFETIME_TOKEN = 432000;//5 суток
    const USER_TABLE = 'users';
    
    /**
     * 
     * @param string $email
     * @param string|sha512 $password hash password algotithm sha512
     * @return boolean авторизирован или нет
     */
    public function login($email, $password) {
        $user = MangoDB::instance()
                ->getDb('users')
                ->findOne(array(
            'login' => $email,
            'password' => $password,
        ));
$token = $this->generateUniqId();
        if (!empty($user)) {
            $newData = array('$set' => array(
                    'lifetime' => time() + self::LIFETIME_TOKEN,
                    'session_id' => $token
            ));


            $usersNew = MangoDB::instance()
                    ->getDb('users')
                    ->update(array(
                '_id' => $user['_id'],
                    ), $newData);

            $user = MangoDB::instance()
                    ->getDb('users')
                    ->findOne(array(
                'login' => $email,
                'password' => $password,
            ));
        }
        $this->user = $user;
        Cookie::set('user_auth', $token);
        return !empty($user);
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
        $user = MangoDB::instance()
                ->getDb('users')
                ->findOne(array(
            'session_id' => $token,
        ));

        if (empty($user) || $user['lifetime'] < time()) {
            return false;
        }

        if (empty($user))
            return FALSE;
        
        //Обвноялем время действия токена
         $newData = array('$set' => array(
                    'lifetime' => time() + self::LIFETIME_TOKEN,
            ));

        $usersNew = MangoDB::instance()
                    ->getDb('users')
                    ->update(array(
                '_id' => $user['_id'],
                    ), $newData);

            $user = MangoDB::instance()
                    ->getDb('users')
                    ->findOne(array(
                '_id' => $user['_id'],
            ));
        
        
        $this->user = $user;
        return TRUE;
    }
    
    /**
     * 
     * @return string "уникальный" индификатор
     */
    public function generateUniqId() {
        return hash('sha512', uniqid(mt_rand(0, 2E8), true));
    }
}
