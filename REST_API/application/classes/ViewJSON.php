<?php

defined('SYSPATH') OR die('No direct script access.');

/**
 * VIEW JSON
 * Возращает даныне переданые в View в виде JSON
 * Возращает только локальные данные
 */
class ViewJSON extends Kohana_View
{

    public function __construct($file = NULL, array $data = NULL)
    {
        if ($data !== NULL) {
            // Add the values to the current data
            $this->_data = $data + $this->_data;
        }
    }

    public function render($file = NULL)
    {
        return json_encode($this->_data);
    }


}