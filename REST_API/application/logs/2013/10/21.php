<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-10-21 11:49:36 --- CRITICAL: ErrorException [ 2 ]: Missing argument 1 for Auth_REST::logged_in(), called in Z:\home\Meanwhile-Server-API\www\application\classes\Controller\Welcome.php on line 7 and defined ~ APPPATH\classes\Auth\REST.php [ 92 ] in Z:\home\Meanwhile-Server-API\www\application\classes\Auth\REST.php:92
2013-10-21 11:49:36 --- DEBUG: #0 Z:\home\Meanwhile-Server-API\www\application\classes\Auth\REST.php(92): Kohana_Core::error_handler(2, 'Missing argumen...', 'Z:\home\Meanwhi...', 92, Array)
#1 Z:\home\Meanwhile-Server-API\www\application\classes\Controller\Welcome.php(7): Auth_REST->logged_in()
#2 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\Controller.php(84): Controller_Welcome->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#5 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 Z:\home\Meanwhile-Server-API\www\index.php(118): Kohana_Request->execute()
#8 {main} in Z:\home\Meanwhile-Server-API\www\application\classes\Auth\REST.php:92
2013-10-21 11:49:56 --- CRITICAL: Database_Exception [ 1054 ]: Unknown column 'user.city' in 'field list' [ SELECT `user`.`id` AS `id`, `user`.`session_id` AS `session_id`, `user`.`login` AS `login`, `user`.`fio` AS `fio`, `user`.`img` AS `img`, `user`.`lifetime` AS `lifetime`, `user`.`city` AS `city` FROM `users` AS `user` WHERE `session_id` = 'token' LIMIT 1 ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\Meanwhile-Server-API\www\modules\database\classes\Kohana\Database\Query.php:251
2013-10-21 11:49:56 --- DEBUG: #0 Z:\home\Meanwhile-Server-API\www\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT `user`.`...', false, Array)
#1 Z:\home\Meanwhile-Server-API\www\modules\orm\classes\Kohana\ORM.php(1072): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 Z:\home\Meanwhile-Server-API\www\modules\orm\classes\Kohana\ORM.php(979): Kohana_ORM->_load_result(false)
#3 Z:\home\Meanwhile-Server-API\www\application\classes\Auth\REST.php(96): Kohana_ORM->find()
#4 Z:\home\Meanwhile-Server-API\www\application\classes\Controller\Welcome.php(7): Auth_REST->logged_in('token')
#5 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\Controller.php(84): Controller_Welcome->action_index()
#6 [internal function]: Kohana_Controller->execute()
#7 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#8 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 Z:\home\Meanwhile-Server-API\www\index.php(118): Kohana_Request->execute()
#11 {main} in Z:\home\Meanwhile-Server-API\www\modules\database\classes\Kohana\Database\Query.php:251
2013-10-21 11:52:34 --- CRITICAL: Kohana_Exception [ 0 ]: A 'www-authenticate' header must be specified for a HTTP 401 Unauthorized ~ SYSPATH\classes\Kohana\HTTP\Exception\401.php [ 34 ] in Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\HTTP\Exception\Expected.php:77
2013-10-21 11:52:34 --- DEBUG: #0 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\HTTP\Exception\Expected.php(77): Kohana_HTTP_Exception_401->check()
#1 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\Request\Client\Internal.php(114): Kohana_HTTP_Exception_Expected->get_response()
#2 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#3 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#4 Z:\home\Meanwhile-Server-API\www\index.php(118): Kohana_Request->execute()
#5 {main} in Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\HTTP\Exception\Expected.php:77
2013-10-21 12:00:38 --- CRITICAL: Kohana_Exception [ 0 ]: A 'www-authenticate' header must be specified for a HTTP 401 Unauthorized ~ SYSPATH\classes\Kohana\HTTP\Exception\401.php [ 34 ] in Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\HTTP\Exception\Expected.php:77
2013-10-21 12:00:38 --- DEBUG: #0 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\HTTP\Exception\Expected.php(77): Kohana_HTTP_Exception_401->check()
#1 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\Request\Client\Internal.php(114): Kohana_HTTP_Exception_Expected->get_response()
#2 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#3 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#4 Z:\home\Meanwhile-Server-API\www\index.php(118): Kohana_Request->execute()
#5 {main} in Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\HTTP\Exception\Expected.php:77
2013-10-21 12:05:26 --- CRITICAL: Kohana_Exception [ 0 ]: A 'www-authenticate' header must be specified for a HTTP 401 Unauthorized ~ SYSPATH\classes\Kohana\HTTP\Exception\401.php [ 34 ] in Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\HTTP\Exception\Expected.php:77
2013-10-21 12:05:26 --- DEBUG: #0 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\HTTP\Exception\Expected.php(77): Kohana_HTTP_Exception_401->check()
#1 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\Request\Client\Internal.php(114): Kohana_HTTP_Exception_Expected->get_response()
#2 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#3 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#4 Z:\home\Meanwhile-Server-API\www\index.php(118): Kohana_Request->execute()
#5 {main} in Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\HTTP\Exception\Expected.php:77
2013-10-21 12:05:47 --- CRITICAL: Kohana_Exception [ 0 ]: A 'www-authenticate' header must be specified for a HTTP 401 Unauthorized ~ SYSPATH\classes\Kohana\HTTP\Exception\401.php [ 34 ] in Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\HTTP\Exception\Expected.php:77
2013-10-21 12:05:47 --- DEBUG: #0 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\HTTP\Exception\Expected.php(77): Kohana_HTTP_Exception_401->check()
#1 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\Request\Client\Internal.php(114): Kohana_HTTP_Exception_Expected->get_response()
#2 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#3 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#4 Z:\home\Meanwhile-Server-API\www\index.php(118): Kohana_Request->execute()
#5 {main} in Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\HTTP\Exception\Expected.php:77
2013-10-21 12:05:51 --- CRITICAL: Kohana_Exception [ 0 ]: A 'www-authenticate' header must be specified for a HTTP 401 Unauthorized ~ SYSPATH\classes\Kohana\HTTP\Exception\401.php [ 34 ] in Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\HTTP\Exception\Expected.php:77
2013-10-21 12:05:51 --- DEBUG: #0 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\HTTP\Exception\Expected.php(77): Kohana_HTTP_Exception_401->check()
#1 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\Request\Client\Internal.php(114): Kohana_HTTP_Exception_Expected->get_response()
#2 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#3 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#4 Z:\home\Meanwhile-Server-API\www\index.php(118): Kohana_Request->execute()
#5 {main} in Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\HTTP\Exception\Expected.php:77
2013-10-21 12:07:58 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::response() ~ APPPATH\classes\Auth\REST.php [ 99 ] in file:line
2013-10-21 12:07:58 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-10-21 12:10:55 --- CRITICAL: Kohana_Exception [ 0 ]: A 'www-authenticate' header must be specified for a HTTP 401 Unauthorized ~ SYSPATH\classes\Kohana\HTTP\Exception\401.php [ 34 ] in Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\HTTP\Exception\Expected.php:77
2013-10-21 12:10:55 --- DEBUG: #0 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\HTTP\Exception\Expected.php(77): Kohana_HTTP_Exception_401->check()
#1 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\Request\Client\Internal.php(114): Kohana_HTTP_Exception_Expected->get_response()
#2 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#3 Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#4 Z:\home\Meanwhile-Server-API\www\index.php(118): Kohana_Request->execute()
#5 {main} in Z:\home\Meanwhile-Server-API\www\system\classes\Kohana\HTTP\Exception\Expected.php:77