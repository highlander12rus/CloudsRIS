<?php

defined('SYSPATH') or die('No direct script access.');

class Model_File extends ORM {

    protected $_table_columns = array(
        'id' => '',
        'user_id' => '',
        'name' => '',
        'folder_id' => '',
        'data_edit' => '',
        'date_Create' => '',
        'permission' => '',
    );
    protected $_has_many = array(
        'user' => array(
            'model' => 'User',
            'foreign_key' => 'user_id',
        ),
        'folder' => array(
            'model' => 'Folder',
            'foreign_key' => 'folder_id',
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
            'file_name' => array(
                array('not_empty'),
                array('max_length', array(':value', 255)),
            ),
            'path' => array(
                array('not_empty'),
                array('max_length', array(':value', 255)),
            ),
            'check' => array(
                array('not_empty'),
                array('max_length', array(':value', 255)),
            ),
            'file_size' => array(
                array('not_empty'),
            ),
            'security_method' => array(
                array('not_empty'),
                array('digit'),
            ),
        );
    }

}
