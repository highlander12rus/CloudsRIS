<?php

defined('SYSPATH') or die('No direct script access.');

class Model_Folder extends Mango {

    
    public function filters() {
        return array(
            TRUE => array(
                array('UTF8::trim', array(':value')),
                array('HTML::chars', array(':value')),
            ),
        );
    }

    public function rules() {
        return array(
            'name' => array(
                array('not_empty'),
                array('max_length', array(':value', 255)),
            ),
        );
    }

}
