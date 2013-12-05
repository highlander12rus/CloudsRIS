<?php

defined('SYSPATH') or die('No direct script access.');

class Model_User extends ORM {

    protected $_table_columns = array
        (
        'id' => '',
        'session_id' => '',
        'name' => '',
        'password' => '',
        'lifetime' => '',
        'email' => '',
    );
    protected $_has_many = array (
    );

    /*
      protected $_belongs_to = array(
      'city' => array(
      'model' => 'city',
      'foreign_key' => 'city_id',
      ),
      );

      public function filters() {
      return array(
      TRUE => array(
      array('UTF8::trim', array(':value')),
      array('HTML::chars', array(':value')),
      ),
      'is_send_email' => array(
      array('Model_User::validateFlagSendEmail', array(':value')),
      ),
      );
      }

      public function rules() {
      return array(
      'fio' => array(
      array('not_empty'),
      array('max_length', array(':value', 255)),
      ),
      'email' => array(
      array('Model_User::validateEmail', array(':value')),
      ),
      );
      }

      public static function validateEmail($email) {
      if ($email == "")
      return true;
      return filter_var($email, FILTER_VALIDATE_EMAIL);
      }

      public static function validateFlagSendEmail($value) {
      return $value == 1;
      }

      /**
     * @TODO: объединить с таким же методом в MPdel_POst, потчи таким же
     * Создает директории ввиде Год/месяц/день/название файла в Папке /users/
     * @param string $dir  добавление имени от начала /users/$dir/год/месяц/день/
     * @return string
     */
    /* public static function formated_dir($dir) {
      // Создаем папки по датам/месяцам/дням
      $years = date('Y');
      $month = date('m');
      $date = date('d');

      if($_SERVER['DOCUMENT_ROOT'][strlen($_SERVER['DOCUMENT_ROOT']) - 1] != '/') {
      $_SERVER['DOCUMENT_ROOT'] .= '/';
      }
      $all_derectory = $_SERVER['DOCUMENT_ROOT'] . 'img/' . $dir . '/' . $years;

      if (!is_dir($all_derectory)) {
      // Create the yearly directory
      mkdir($all_derectory, 0744);
      // Set permissions (must be manually set to fix umask issues)
      chmod($all_derectory, 0744);
      }
      $all_derectory .= '/' . $month;
      if (!is_dir($all_derectory)) {
      // Create the yearly directory
      mkdir($all_derectory, 0744);
      // Set permissions (must be manually set to fix umask issues)
      chmod($all_derectory, 0744);
      }

      $all_derectory .= '/' . $date;
      if (!is_dir($all_derectory)) {
      // Create the yearly directory
      mkdir($all_derectory, 0744);
      // Set permissions (must be manually set to fix umask issues)
      chmod($all_derectory, 0744);
      }

      $directory = $years . '/' . $month . '/' . $date . '/';

      return $all_derectory;
      }

      public function saveAvatar($imagName) {
      $dir = self::formated_dir('users');
      if( $dir[strlen( $dir) - 1] != '/') {
      $dir .= '/';
      }

      $file_name = urldecode(uniqid(mt_rand(), 1) . '.jpg'); //. pathinfo($files['name'], PATHINFO_EXTENSION));
      $files_path = Upload::save($imagName, $file_name, $dir, 0644);

      Image::factory($files_path)
      ->crop_exact_dimensions(150, 150)
      ->save($dir . $file_name, 90);

      return str_replace($_SERVER['DOCUMENT_ROOT'], '', $dir . $file_name);
      } */
}
