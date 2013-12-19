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
    protected $_belongs_to = array(
        'user' => array(
            'model' => 'User',
            'foreign_key' => 'user_id',
        ),
        'folder' => array(
            'model' => 'Folder',
            'foreign_key' => 'id',
            'far_key' => 'folder_id',
        ),
    );

    /**
     * Проверяет на корректность данные
     * @param array $post данные запроса
     * @param \Validation куда передать обьек валидации
     * @return bool прошла ли проверка
     */
    public function validationFileUploads(array $post, &$valid) {
        
        $valid = Validation::factory($post);
       $post = Arr::map('UTF8::trim', $post);
       $pos = Arr::map('HTML::chars', $post);
        
        $valid->rules('file_name', array(
            array('not_empty'),
            array('max_length', array(':value', 255)),
        ));
        $valid->rules('path', array(
            array('not_empty'),
            array('max_length', array(':value', 255)),
        ));
        $valid->rules('check', array(
            array('not_empty'),
            array('max_length', array(':value', 255)),
        ));
        $valid->rules('file_size', array(
            array('not_empty'),
            array('digit'),
        ));
        $valid->rules('security_method', array(
            array('not_empty'),
        ));
        
        return $valid->check();
    }

    /**
     * Загрузка информации о файле
     * @param array $data 
     * @return возвращает id файла
     * @throws HTTP_Exception_404
     */
    public function saveFilesOperation(array $data) {
        //проверяем есть ли папка у пользователя
        $folder = ORM::factory('Folder')
                ->where('name', '=', $data['path'])
                ->where('user_id', '=', Auth::instance()->get_user()->id)
                ->find();

        if (!$folder->loaded())
            throw new HTTP_Exception_404;

        $file = ORM::factory('File');
        $file->user_id = Auth::instance()->get_user()->id;
        $file->name = $data['file_name'];
        $file->folder_id = $folder->id;
        $file->permission = 1;
        $file->save();

        DB::query(Database::INSERT, "INSERT IGNORE INTO `security_method` (`name`)"
                        . "VALUES (:sec_name)")
                ->parameters(array(
                    ':sec_name' => $data['security_method'],
                ))
                ->execute();
        
       $sec_menhod = DB::select('id')
                ->from('security_method')
                ->where('name', '=', $data['security_method'])
                ->execute()
               ->as_array();
       $sec_menhod_id = $sec_menhod[0]['id'];
       
       DB::insert('server_files', array('file_id', 'lenght', 'check', 'security_method_id', 'order'))
               ->values(array($file->id, $data['file_size'], $data['check'], $sec_menhod_id, 0))
               ->execute();
       
       return $file->id; 
       
    }
    
    /**
     * Получает размер файла
     * @param int $file_id
     * @return int - размер файл
     */
    public function getSize($file_id) {
        
        $result = DB::query(Database::SELECT, "SELECT SUM(`lenght`) as sum FROM `server_files` "
                . "WHERE `file_id` = :file_id")
            ->param(':file_id', $file_id)
                ->execute()->as_array();
       
        return $result[0]['sum'];
    }

    public function getCheckSumm($file_id) {
        $result = DB::select('check')
                ->from('server_files')
                ->where('order', '=', 0)
                ->where('file_id', '=', $file_id)
                ->execute()->as_array();
    
        return $result[0]['check'];
                
    }
    
    public function getFilesLocationIp($file_id) {
        $res = Db::select('ip')
                ->from('server_files')
                ->join('address_blocks')
                ->on('block_id', '=', 'blok_id')
                ->where('file_id', '=', $file_id)
                ->where('order', '=', 0)
                ->execute();
        return $res[0]['ip'];
    }
    
}
