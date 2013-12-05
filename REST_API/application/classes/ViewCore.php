<?php defined('SYSPATH') or die('No direct script access.');

class ViewCore extends View
{
    public function ajax_data()
    {
        return json_encode($this->_data);
    }
    
    public static function factory($file = NULL, array $data = NULL)
    {
    	return new ViewCore($file, $data);
    }
    
}
