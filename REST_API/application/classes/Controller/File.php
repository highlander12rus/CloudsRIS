<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_File extends Controller_REST {

    public function action_create() {

        //Проверяем что папкасуществует
        
        
        $options = array(
            'servers' => array(
                'server1' => array('host' => '127.0.0.1', 'port' => 6379)
            )
        );
        $rediska = new Rediska($options);
        //$key = new Rediska_Key('keyName');
        //$key->setValue('d');
        
        $file = ORM::factory('File')->values($_POST, array('file_name', 'path',
            'check', 'file_size', 'security_method'));
        try {
            $file->user_id = Auth::instance()->get_user()->id;
            $file->save();
            //$this->json->
        } catch (ORM_Validation_Exception $e) {
            $errors = $e->errors('');
            if (isset($errors['_external'])) {
                $arr = $errors['_external'];
                unset($errors['_external']);
            } else {
                $arr = array();
            }

            $errors = array_merge($errors, $arr);
            $this->response->status(406);
            $this->json->errors = $errors;
        }
    }

    public function action_delete() {
        
    }

}
