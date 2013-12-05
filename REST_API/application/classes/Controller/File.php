<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_File extends Controller_REST {

    public function action_create() {

        //проверем корректност ьвведеных данных
        $valid;
        $fileModel = new Model_File();
        if (!$fileModel->validationFileUploads($_POST, $valid))
            throw new HTTP_Exception_400;
        $file_id = $fileModel->saveFilesOperation($valid->data());

        $token = Auth::instance()->generateUniqId();
        $options = array(
            'servers' => array(
                'server1' => array('host' => '127.0.0.1', 'port' => 6379)
            )
        );
        $rediska = new Rediska($options);
        $key = new Rediska_Key($token);
        $data = $valid->data();
        $key->setValue('w ' . $data['file_size']. ' ' . $file_id);
        
        $this->json->server_uplouds = "localhost";
        $this->json->token_operation = $token;
    }

    public function action_delete() {
        $path = $this->request->delete('path', NULL);
        $file_name = $this->request->delete('file_name', NULL);

        if ($path === NULL || $file_name === NULL)
            throw new HTTP_Exception_400;

        $path = HTML::chars($path);
        $file_name = HTML::chars($file_name);
        //проверяем путь на последний /
        $path = $path[UTF8::strlen($path) - 1] != '/' ? $path . '/' : $path;

        //проверяем существуют ли пути и анаш файл у юзера
        $folders = ORM::factory('Folder')
                ->where('name', '=', $path)
                ->where('user_id', '=', Auth::instance()->get_user()->id)
                ->find();
        if (!$folders->loaded())
            throw new HTTP_Exception_404;

        $file = $folders->files
                ->where('name', '=', $file_name)
                ->find();
        if (!$file->loaded())
            throw new HTTP_Exception_404;
        $file->delete();

        $this->response->status(204);
    }

}