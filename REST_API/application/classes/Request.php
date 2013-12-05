<?php

defined('SYSPATH') OR die('No direct script access.');

class Request extends Kohana_Request {
    
    /**
     *
     * @var array for  HTTP method PUT or DELETE  
     */
    protected $_other = NULL;
    
    /**
     * Получение данных поулченных метод HTTP DELETE
     * @param mixed $key
     * @param mixed $value
     * @return mixed
     */
    public function delete($key = NULL, $value = NULL) {
        if($this->_other === NULL) {
            //load in cache
            parse_str($this->body(), $this->_other);
        }
        if($key === NULL) {
            return $this->_other;
        }
        return isset($this->_other[$key]) ? $this->_other[$key] : $value;     
    }
    
    /**
     * Получение данных поулченных метод HTTP PUT
     * @param mixed $key
     * @param mixed $value
     * @return mixed
     */
    public function put($key = NULL, $value = NULL) {
        if($this->_other === NULL) {
            //load in cache
            parse_str($this->request->body(), $this->_other);
        }
        if($key === NULL) {
            return $this->_other;
        }
        return isset($this->_other[$key]) ? $this->_other[$key] : $value;    
    }
    
}