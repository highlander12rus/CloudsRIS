<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_File extends Controller_REST {
    //@todo: файл id передается при получение папки....
    /* public function action_get() {
      $get = Arr::map('urldecode', $_GET);
      $folder = Arr::get($get, 'folder', NULL);
      $file = Arr::get($get, 'file_name', NULL);

      $folder = $folder[UTF8::strlen($folder) - 1] != '/' ? $folder . '/' : $folder;

      if (!isset($file, $folder)) {
      throw new HTTP_Exception_404;
      }

      $path = $folder;
      $path = $path[UTF8::strlen($path) - 1] != '/' ? $path . '/' : $path;
      preg_match('/(.*)\/(\w+)\/$/i', $path, $matches);

      $path = $matches[1] == '' ? '/' : $matches[1];
      $folderName = $matches[2];

      //aggregate({"$unwind": "$files"}, {"$match": {"files.length": 13}});
      MangoDB::instance()
      ->getDb('folders')
      ->aggregate(array(
      array(
      '$unwind' =>   '$files',
      ),
      array(
      '$match' => array(
      'files._id' => new MongoId();
      )
      ),
      ));






      $folder = ORM::factory('Folder')
      ->where('name', '=', $folder)
      ->where('user_id', '=', Auth::instance()->get_user()->id)
      ->find();


      if (!$folder->loaded()) {
      throw new HTTP_Exception_404;
      }

      $file = $folder->files
      ->where('name', '=', $file)
      ->find();

      if (!$file->loaded()) {
      throw new HTTP_Exception_404;
      }

      $file_size = $file->getSize($file->id);

      $options = array(
      'servers' => array(
      'server1' => array('host' => '127.0.0.1', 'port' => 6379)
      )
      );
      $rediska = new Rediska($options);
      $key = new Rediska_Key($token);
      $data = $valid->data();
      $key->setValue('r ' . $file_size . ' ' . $file->id);

      $this->json->token_operation = Auth::instance()->generateUniqId();
      $this->json->file_size = $file_size;
      $this->json->chheck_sum = $file->getCheckSumm($file->id);
      $this->json->server_download = $file->getFilesLocationIp($file->id);
      } */

    /**
     * Должен отдать id папкки в котрую грузим файл
     * @throws HTTP_Exception_400
     */
    public function action_create() {
        //проверем корректность введеных данных
        $path = Arr::get($_POST, 'folder', NULL);
        if ($path === NULL)
            throw new HTTP_Exception_404;

        $path = urldecode($path);
        $path = HTML::chars($path);

        $path = $path[UTF8::strlen($path) - 1] != '/' ? $path . '/' : $path;
    
        $test = explode("/", $path);
            array_pop($test);
            $folderName = array_pop($test);
            $path = implode('/', $test) . '/';
        
          

        $user = Auth::instance()->get_user();
        $filesMongo = MangoDB::instance()
                ->getDb('folders')
                ->findOne(array(
            'user_id' => new MongoId($user['_id']),
            'path' =>  $path,
            'name' => $folderName,
        ));

        if (empty($filesMongo)) {
            throw new HTTP_Exception_404;
        }


        //@todo Выдавать рамнодмно 3 ip адресса
        $this->json->server_uplouds = '192.168.199.129';
        $this->json->dirictoryId = $filesMongo['_id'] . '';
    }

    //@todo: дял удаления нао посылать сервак, что файл удален.... по udp
    //Не написано....

    /* public function action_delete() {
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
      } */
}
