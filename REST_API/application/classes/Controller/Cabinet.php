<?php

class Controller_Cabinet extends Controller_Core {
    
    protected $auth;
    
    public function before() {
        $this->auth = new Auth_Site();
        
        parent::before();
    }


    public function action_index() {
        if($this->auth->logged_in()) {
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
        $login = Arr::get($post, 'login', NULL);
        $registrat = Arr::get($post, 'rigistration', NULL);
        if($login !== NULL) {
            if(!$this->auth->login($email, hash('sha512', $password))) {
               $this->template->content->error = 'Такая комбинация логина и пароля не найдена'; 
            } else 
                $this->response->headers('location', '/');
        } else if ($registrat !== NULL) {
           //лень делать по феншую :)
            $password_hash = hash('sha512', $password);
            $user = ORM::factory('User');
            $user->email = $email;
            $user->password = $password_hash;
            $user->save();
            $this->auth->login($email, $password_hash); 
            $this->response->headers('location', '/');
        }
        $this->template->content->auth = Request::factory('cabinet')
            ->execute(); 
    }
    
    public function action_exit() {
        if($this->auth->logged_in()) {
            $this->auth->logout();
        }
        $this->response->headers('location', '/');
    }
    
    public function action_change_paswd() {
        if($this->auth->logged_in()) {
            $this->template->content = ViewCore::factory('index');
            $this->template->content->auth = Request::factory('cabinet')
            ->execute(); 
            $this->template->content->error  = 'Пароль успешно изменен';
            $post = Arr::map('HTML::chars', $_POST);
            $this->auth->get_user()->password = hash('sha512', $post['password']);
            $this->auth->get_user()->save();
        } else 
            $this->response->headers('location', '/');
    }
}
