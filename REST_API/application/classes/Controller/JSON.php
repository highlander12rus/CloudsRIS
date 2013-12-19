<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_JSON extends RESTful_Controller
{

    protected $json;

    public function before()
    {  // Load the template
        $this->json = new ViewJSON();
        parent::before();
    }

    public function after()
    {
        $this->response->body($this->json->render());
        parent::after();
    }

}
