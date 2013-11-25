<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Folder extends Controller_REST {

    public function action_get() {
        $path = Arr::get($_GET, 'folder', NULL);
        if ($path === NULL)
            throw new HTTP_Exception_404;

        $path = urldecode($path);
        $path = HTML::chars($path);

        $isLastSlash = $path[UTF8::strlen($path) - 1] != '/' ? $path . '/' : $path;

        $foldes = ORM::factory('Folder')
                ->where(DB::expr("(name REGEXP '{$path}[a-zA-z0-9]*[/]?$')"), '=', 1)
                ->where('user_id', '=', Auth::instance()->get_user()->id)
                ->find_all();

        //hack ищем файлы  данной дириктории
        $folder_id_curent = -1;
        $folders = array();
        foreach ($foldes as $folder) {
            $folders[] = $folder->name;
            if ($folder->name == $path) {
                $folder_id_curent = $folder->id;
                break;
            }
        }
        
        $files_curent_dir = DB::select('name')
                ->from('files')
                ->where('folder_id', '=', $folder_id_curent)
                ->execute();
        $files_array = array();
        foreach ($files_curent_dir as $file) {
            $files_array[] = $file['name'];
        }
        
        $this->json->folders = $folders;
        $this->json->files = $files_array;
    }

    /* public function action_update() {

      } */

    public function action_create() {
        $folder = ORM::factory('Folder');
        $folder->values($_POST, array('name'));
        try {
            $folder->user_id = Auth::instance()->get_user()->id;
            $folder->save();
            $this->response->status(204);
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
        $name = $this->request->delete('name', NULL);
        if ($name === NULL)
            throw new HTTP_Exception_400;
        $name = HTML::chars($name);

        $folder = ORM::factory('Folder')
                ->where('name', '=', $name)
                ->where('user_id', '=', Auth::instance()->get_user()->id)
                ->find();
        if ($folder->loaded()) {
            $folder->delete();
            $this->response->status(204);
        } else {
            throw new HTTP_Exception_404;
        }
    }

}
