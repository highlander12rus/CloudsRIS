<?php

defined('SYSPATH') or die('No direct script access.');

class Model_Folder extends ORM {

    protected $_table_columns = array
        (
        'id' => '',
        'name' => '',
        'user_id' => '',
    );
    protected $_has_many = array(
        'user' => array(
            'model' => 'User',
            'foreign_key' => 'user_id',
        ),
    );
    
    
    protected $_belongs_to  = array(
        'files' => array(
            'model' => 'Files',
        ),
    );

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
