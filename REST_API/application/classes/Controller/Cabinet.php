<?php

class Controller_Cabinet extends Controller_Core {

    protected $auth;

    public function before() {
        $this->auth = new Auth_Site();

        parent::before();
    }

    public function action_index() {
        if ($this->auth->logged_in()) {
            $this->template->content = ViewCore::factory('cabinet/auth');
            $this->template->user = $this->auth->get_user();
        } else {
            $this->template->content = ViewCore::factory('cabinet/not_auth');
        }
    }

    public function action_autorization() {
        $this->template->content = ViewCore::factory('index');

        $post = Arr::map('HTML::chars', $_POST);
        $email = $post['email'];
        $password = $post['password'];

        if (!$this->auth->login($email,  $password)) {
            $this->template->content->error = 'Такая комбинация логина и пароля не найдена';
        } else
            $this->response->headers('location', '/');

        $this->template->content->auth = Request::factory('cabinet')
                ->execute();
    }

    public function action_exit() {
        if ($this->auth->logged_in()) {
            $this->auth->logout();
        }
        $this->response->headers('location', '/');
    }

    public function action_change_paswd() {
        if ($this->auth->logged_in()) {
            $this->template->content = ViewCore::factory('index');
            $this->template->content->auth = Request::factory('cabinet')
                    ->execute();
            $this->template->content->error = 'Пароль успешно изменен';
            $post = Arr::map('HTML::chars', $_POST);

            $token = Cookie::get('user_auth');
            $user = MangoDB::instance()
                    ->getDb('users')
                    ->findOne(array(
                'session_id' => $token,
            ));
print_r($user);
            $newData = array('$set' => array(
                    'password' => $post['password'],
            ));

            $usersNew = MangoDB::instance()
                    ->getDb('users')
                    ->update(array(
                '_id' => $user['_id'],
                    ), $newData);
        } else
            $this->response->headers('location', '/');
    }

    public function action_registration() {
        $this->template->content = ViewCore::factory('index');

        $post = Arr::map('HTML::chars', $_POST);
        $email = $post['email'];
        $password = $post['password'];
        $name = $post['name'];


        $user_isset = MangoDB::instance()
                ->getDb('users')
                ->count(array(
            'email' => $email
        ));


        if ($user_isset > 1) {
            $this->template->content->error = 'Такой email уже существует';
        } else if (!$this->auth->logged_in()) {
            MangoDB::instance()
            ->getDb('users')
            ->insert(array(
            "lifetime" => time() + 3600*24*7,
            "login" => $email,
            "password" => $password,
            "session_id" => ""
            ));

            $this->auth->login($email, $password);
            $this->response->headers('location', '/');
        } else {
            //user is logged
            $this->response->headers('location', '/');
        }
        $this->template->content->auth = Request::factory('cabinet')
                ->execute();
    }

}
