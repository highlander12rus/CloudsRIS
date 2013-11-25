<?php

class View_SinglePost
{

    private $postData;

    /**
     * 
     * @param Database_Result $post
     */
    public function __construct(Database_Result $post)
    {
        $this->postData = $post->as_array(); //всегда состоит из одного элемента
        $this->postData = $this->postData[0];
    }

    /**
     * Форматирует dв массив
     * @return array
     */
    public function toArray()
    {
        $array = $this->postData;
        $array['user']['img'] = $array['users.img'];
        unset($array['users.img']);

        $array['user'] += $this->formatedFio($array['fio']);
        unset($array['fio']);

        $array['user']['id'] = $array['user_id'];
        unset($array['user_id']);
        return $array ;
    }

    private function formatedFio($fio)
    {
        $fio = explode(' ', $fio);
        $array = array();
        $array['first_name'] = (isset($fio[0])) ? $fio[0] : '';
        $array['last_name'] = ''; 
        for ($i = 1; $i < count($fio); $i++)
            $array['last_name'] .= (($i != 1) ? ' ' : '') . $fio[$i];
        
        return $array;
    }

}