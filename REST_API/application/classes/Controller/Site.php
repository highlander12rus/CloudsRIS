<?php

class Controller_Site extends Controller_Core {
    
    public function action_index() {
        $this->template->content = ViewCore::factory('index');
        $this->template->content->auth = Request::factory('cabinet')
            ->execute();  
    }
}

