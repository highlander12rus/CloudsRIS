<?php defined('SYSPATH') or die('No direct script access.');

/*
 *  Если обычнй запрос на страницу - возрашаем ее 
 *  Был Ajax запрос возращаем json
 *  HMVC возращаем только Вид запрошего контроллера 
 * 
 *  Если HMVC, то надо загрузить View в переменную content т.е View::factory()->content = ...
 *  Для Ajax так же как и для HMVC 
 */

class Controller_Core extends Controller_Template
{
   
    /**
     *  @var mixed  Главный каркас сайта, точнее страница
     */
    public $template = 'main';
    
    
    /*
     *  Если ajax запрос, отправлять ли данные в json
     */
    public static $json_loaded = TRUE;
    
    
    public function after()
    { 
               
        if(Request::initial()->is_ajax() && ! Controller_Core::$json_loaded)
        {
            //ajax, но требуется отправить только content без основного шаблона
            $this->response->body($this->template->content);
            
        }
        else if(Request::initial()->is_ajax() && Controller_Core::$json_loaded)
        {
            $this->request->headers('Content-Type', 'application/json');
            $this->response->body($this->template->content->ajax_data());
        }
        
        else if(!$this->request->is_initial())
        {
            //Загрузка через HMVC
            $this->response->body($this->template->content);
        }
        else
        {
           $this->response->body($this->template->render());
        }
       
	//parent::after();
   }
}


