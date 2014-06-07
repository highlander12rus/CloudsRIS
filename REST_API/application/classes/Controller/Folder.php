<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Folder extends Controller_REST {

    public function action_get() {
        $path = Arr::get($_GET, 'folder', NULL);
        if ($path === NULL)
            throw new HTTP_Exception_404;

        $path = urldecode($path);

        $path = $path[UTF8::strlen($path) - 1] != '/' ? $path . '/' : $path;

        $user = Auth::instance()->get_user();

        if ($path != '/') {
            $pathParent = $path;

            $test = explode("/", $path);
            array_pop($test);
            $folderName = array_pop($test);
            $pathCurent = implode('/', $test) . '/';

            //выбираем файлы
            $filesMongo = MangoDB::instance()
                    ->getDb('folders')
                    ->count(array(
                'user_id' => new MongoId($user['_id']),
                'path' => $pathCurent,
                'name' => $folderName,
            ));
            if ($filesMongo < 1) {
                throw new HTTP_Exception_404;
            }

            $query = array(
                array(
                    'user_id' => new MongoId($user['_id']),
                    'path' => $pathCurent,
                    'name' => $folderName,
                ),
                array(
                    'user_id' => new MongoId($user['_id']),
                    'path' => $pathParent,
                ),
            );
        } else {
            $query = array(
                array(
                    'user_id' => new MongoId($user['_id']),
                    'path' => '/',
                ),
            );
        }

        //выбираем файлы
        $filesMongo = MangoDB::instance()
                ->getDb('folders')
                ->find(array(
            '$or' => $query,
        ));

        if (empty($filesMongo)) {
            throw new HTTP_Exception_404;
        }

        $folders = array();
        $files = array();

        foreach ($filesMongo as $value) {
            if ($value['path'] == $path && $value['name'] != "/") {
                $folders[] =  $value['name'];
            } else {
                foreach ($value['files'] as $file) {
                    $fileS = $file['_id'];

                    $files[] = array(
                        'id' => $file['_id'] . '',
                        'name' => $file['name'],
                        'length' => $file['length'],
                    );
                }
            }
        }

        $this->json->folders = $folders;
        $this->json->files = $files;
    }

    public function action_create() {
        $path = HTML::chars($_POST['name']);
        if ($path == "" || $path == '/') {
            $this->response->status(406);
            $this->json->errors = array(
                'errors' => 'Ошибка, папка не должна быть пустой'
            );
            return;
        }

        $path = urldecode($path);
        $path = HTML::chars($path);

        $path = $path[UTF8::strlen($path) - 1] != '/' ? $path . '/' : $path;

        $test = explode("/", $path);
        array_pop($test);
        $folderName = array_pop($test);
        $path = implode('/', $test) . '/';

        $user = Auth::instance()->get_user();
        MangoDB::instance()
                ->getDb('folders')
                ->insert(array(
                    'name' => $folderName,
                    'user_id' => new MongoId($user['_id']),
                    'path' => $path,
                    "files" => array(),
        ));


        $this->response->status(204);
    }

    public function action_delete() {
        //@todo: првоерка что не существует файлво в дириктории) т.к .и хи надо удалять
        $name = $this->request->delete('name', NULL);

        $path = HTML::chars($name);
        if ($path == "" || $path == '/') {
            $this->response->status(406);
            $this->json->errors = array(
                'errors' => 'Ошибка, папка не должна быть пустой'
            );
            return;
        }

        $path = urldecode($path);
        $path = HTML::chars($path);

        $path = $path[UTF8::strlen($path) - 1] != '/' ? $path . '/' : $path;

        $test = explode("/", $path);
        array_pop($test);
        $folderName = array_pop($test);
        $path = implode('/', $test) . '/';


        $user = Auth::instance()->get_user();
        MangoDB::instance()
                ->getDb('folders')
                ->remove(array(
                    'name' => $folderName,
                    'user_id' => new MongoId($user['_id']),
                    'path' => $path[UTF8::strlen($path) - 1] != '/' ? $path . '/' : $path,
        ));


        $this->response->status(204);
    }

}
