<?php

defined('SYSPATH') OR die('No direct access allowed.');

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
        $user = MangoDB::instance()
                ->getDb('users')
                ->findOne(array(
            'login' => $email,
            'password' => $password,
        ));

        if (!empty($user)) {
            $newData = array('$set' => array(
                    'lifetime' => time() + self::LIFETIME_TOKEN,
                    'session_id' => $this->generateUniqId()
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
        return !empty($user);
    }

    public function get_user() {
        return $this->user;
    }

    public function logout() {
        //Меняем время досутпа у токена
        $newData = array('$set' => array(
                'lifetime' => time() - self::LIFETIME_TOKEN,
        ));

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

        $user = MangoDB::instance()
                ->getDb('users')
                ->findOne(array(
            'session_id' => $token,
        ));

        if (empty($user) || $user['lifetime'] < time()) {
            throw HTTP_Exception::factory(401)->authenticate('CloudsRIS');
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
     * Возращает токен
     * @return null|string null - если токена нет
     */
    public function getToken() {
        if ($this->user !== NULL)
            return $this->user['session_id'];
        else
            return NULL;
    }

    public function getLeftTime() {
        if ($this->user !== NULL)
            return $this->user['lifetime'];
        else
            return NULL;
    }

    /**
     * 
     * @return string "уникальный" индификатор
     */
    public function generateUniqId() {
        return hash('sha512', uniqid(mt_rand(0, 2E8), true));
    }

}
