<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-11-25 07:35:04 --- CRITICAL: Database_Exception [ 2 ]: mysql_connect() [function.mysql-connect0]: Access denied for user 'web'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 67 ] in Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database\MySQL.php:431
2013-11-25 07:35:04 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database\MySQL.php(431): Kohana_Database_MySQL->connect()
#1 Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database.php(478): Kohana_Database_MySQL->escape('lol')
#2 Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database\Query\Builder.php(116): Kohana_Database->quote('lol')
#3 Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database\Query\Builder\Select.php(372): Kohana_Database_Query_Builder->_compile_conditions(Object(Database_MySQL), Array)
#4 Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database\Query.php(234): Kohana_Database_Query_Builder_Select->compile(Object(Database_MySQL))
#5 Z:\home\cloudsris.ru\www\modules\orm\classes\Kohana\ORM.php(1072): Kohana_Database_Query->execute(Object(Database_MySQL))
#6 Z:\home\cloudsris.ru\www\modules\orm\classes\Kohana\ORM.php(979): Kohana_ORM->_load_result(false)
#7 Z:\home\cloudsris.ru\www\application\classes\Auth\REST.php(24): Kohana_ORM->find()
#8 Z:\home\cloudsris.ru\www\application\classes\Controller\Auth.php(24): Auth_REST->login('lol', 'dsds')
#9 Z:\home\cloudsris.ru\www\system\classes\Kohana\Controller.php(84): Controller_Auth->action_index()
#10 [internal function]: Kohana_Controller->execute()
#11 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#12 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#15 {main} in Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database\MySQL.php:431
2013-11-25 07:35:57 --- CRITICAL: Database_Exception [ 2 ]: mysql_connect() [function.mysql-connect0]: Access denied for user 'web'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 67 ] in Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database\MySQL.php:431
2013-11-25 07:35:57 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database\MySQL.php(431): Kohana_Database_MySQL->connect()
#1 Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database.php(478): Kohana_Database_MySQL->escape('lol')
#2 Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database\Query\Builder.php(116): Kohana_Database->quote('lol')
#3 Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database\Query\Builder\Select.php(372): Kohana_Database_Query_Builder->_compile_conditions(Object(Database_MySQL), Array)
#4 Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database\Query.php(234): Kohana_Database_Query_Builder_Select->compile(Object(Database_MySQL))
#5 Z:\home\cloudsris.ru\www\modules\orm\classes\Kohana\ORM.php(1072): Kohana_Database_Query->execute(Object(Database_MySQL))
#6 Z:\home\cloudsris.ru\www\modules\orm\classes\Kohana\ORM.php(979): Kohana_ORM->_load_result(false)
#7 Z:\home\cloudsris.ru\www\application\classes\Auth\REST.php(24): Kohana_ORM->find()
#8 Z:\home\cloudsris.ru\www\application\classes\Controller\Auth.php(24): Auth_REST->login('lol', 'dsds')
#9 Z:\home\cloudsris.ru\www\system\classes\Kohana\Controller.php(84): Controller_Auth->action_index()
#10 [internal function]: Kohana_Controller->execute()
#11 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#12 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#14 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#15 {main} in Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database\MySQL.php:431
2013-11-25 07:36:30 --- CRITICAL: Database_Exception [ 1054 ]: Unknown column 'user.login' in 'field list' [ SELECT `user`.`id` AS `id`, `user`.`session_id` AS `session_id`, `user`.`login` AS `login`, `user`.`fio` AS `fio`, `user`.`img` AS `img`, `user`.`lifetime` AS `lifetime`, `user`.`city_id` AS `city_id`, `user`.`email` AS `email`, `user`.`is_send_email` AS `is_send_email` FROM `users` AS `user` WHERE `email` = 'lol' AND `password` = 'dsds' LIMIT 1 ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database\Query.php:251
2013-11-25 07:36:30 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT `user`.`...', false, Array)
#1 Z:\home\cloudsris.ru\www\modules\orm\classes\Kohana\ORM.php(1072): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 Z:\home\cloudsris.ru\www\modules\orm\classes\Kohana\ORM.php(979): Kohana_ORM->_load_result(false)
#3 Z:\home\cloudsris.ru\www\application\classes\Auth\REST.php(24): Kohana_ORM->find()
#4 Z:\home\cloudsris.ru\www\application\classes\Controller\Auth.php(24): Auth_REST->login('lol', 'dsds')
#5 Z:\home\cloudsris.ru\www\system\classes\Kohana\Controller.php(84): Controller_Auth->action_index()
#6 [internal function]: Kohana_Controller->execute()
#7 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#8 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#11 {main} in Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database\Query.php:251
2013-11-25 08:35:53 --- CRITICAL: Kohana_Exception [ 0 ]: Invalid Route::callback specified ~ SYSPATH\classes\Kohana\Route.php [ 391 ] in Z:\home\cloudsris.ru\www\application\bootstrap.php:140
2013-11-25 08:35:53 --- DEBUG: #0 Z:\home\cloudsris.ru\www\application\bootstrap.php(140): Kohana_Route->filter('RESTful::route_...')
#1 Z:\home\cloudsris.ru\www\index.php(102): require('Z:\home\cloudsr...')
#2 {main} in Z:\home\cloudsris.ru\www\application\bootstrap.php:140
2013-11-25 08:37:37 --- CRITICAL: Kohana_Exception [ 0 ]: Invalid Route::callback specified ~ SYSPATH\classes\Kohana\Route.php [ 391 ] in Z:\home\cloudsris.ru\www\application\bootstrap.php:140
2013-11-25 08:37:37 --- DEBUG: #0 Z:\home\cloudsris.ru\www\application\bootstrap.php(140): Kohana_Route->filter('RESTful::route_...')
#1 Z:\home\cloudsris.ru\www\index.php(102): require('Z:\home\cloudsr...')
#2 {main} in Z:\home\cloudsris.ru\www\application\bootstrap.php:140
2013-11-25 08:43:48 --- CRITICAL: ErrorException [ 1 ]: Class 'REST' not found ~ APPPATH\classes\Controller\Folder.php [ 5 ] in file:line
2013-11-25 08:43:48 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-25 08:56:57 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Controller_Folder::$_action_map ~ MODPATH\restful\classes\RESTful\Controller.php [ 58 ] in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:58
2013-11-25 08:56:57 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(58): Kohana_Core::error_handler(8, 'Undefined prope...', 'Z:\home\cloudsr...', 58, Array)
#1 [internal function]: RESTful_Controller->execute()
#2 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#6 {main} in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:58
2013-11-25 08:57:18 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Controller_Folder::$_action_map ~ MODPATH\restful\classes\RESTful\Controller.php [ 58 ] in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:58
2013-11-25 08:57:18 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(58): Kohana_Core::error_handler(8, 'Undefined prope...', 'Z:\home\cloudsr...', 58, Array)
#1 [internal function]: RESTful_Controller->execute()
#2 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#6 {main} in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:58
2013-11-25 09:01:13 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Controller_Folder::$_action_map ~ MODPATH\restful\classes\RESTful\Controller.php [ 58 ] in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:58
2013-11-25 09:01:13 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(58): Kohana_Core::error_handler(8, 'Undefined prope...', 'Z:\home\cloudsr...', 58, Array)
#1 [internal function]: RESTful_Controller->execute()
#2 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#6 {main} in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:58
2013-11-25 09:02:20 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Controller_Folder::$_action_map ~ MODPATH\restful\classes\RESTful\Controller.php [ 58 ] in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:58
2013-11-25 09:02:20 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(58): Kohana_Core::error_handler(8, 'Undefined prope...', 'Z:\home\cloudsr...', 58, Array)
#1 [internal function]: RESTful_Controller->execute()
#2 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#6 {main} in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:58
2013-11-25 09:03:02 --- CRITICAL: ErrorException [ 2048 ]: Accessing static property Controller_Folder::$_action_map as non static ~ MODPATH\restful\classes\RESTful\Controller.php [ 58 ] in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:58
2013-11-25 09:03:02 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(58): Kohana_Core::error_handler(2048, 'Accessing stati...', 'Z:\home\cloudsr...', 58, Array)
#1 [internal function]: RESTful_Controller->execute()
#2 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#6 {main} in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:58
2013-11-25 09:03:22 --- CRITICAL: ErrorException [ 1 ]: Undefined class constant '_action_map' ~ MODPATH\restful\classes\RESTful\Controller.php [ 58 ] in file:line
2013-11-25 09:03:22 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-25 09:04:58 --- CRITICAL: ErrorException [ 1 ]: Access to undeclared static property: RESTful_Controller::$_action_maps ~ MODPATH\restful\classes\RESTful\Controller.php [ 58 ] in file:line
2013-11-25 09:04:58 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-25 09:05:17 --- CRITICAL: ErrorException [ 1 ]: Access to undeclared static property: RESTful_Controller::$_action_maps ~ MODPATH\restful\classes\RESTful\Controller.php [ 58 ] in file:line
2013-11-25 09:05:17 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-25 09:07:10 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected T_PUBLIC, expecting '{' ~ APPPATH\classes\Controller\Folder.php [ 7 ] in file:line
2013-11-25 09:07:10 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-25 09:09:21 --- CRITICAL: ErrorException [ 8 ]: Undefined index: post ~ MODPATH\restful\classes\RESTful\Controller.php [ 52 ] in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:52
2013-11-25 09:09:21 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(52): Kohana_Core::error_handler(8, 'Undefined index...', 'Z:\home\cloudsr...', 52, Array)
#1 [internal function]: RESTful_Controller->execute()
#2 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#6 {main} in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:52
2013-11-25 09:09:50 --- CRITICAL: ErrorException [ 8 ]: unserialize() [function.unserialize0]: Error at offset 0 of 49 bytes ~ APPPATH\classes\Controller\Folder.php [ 34 ] in file:line
2013-11-25 09:09:50 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'unserialize() [...', 'Z:\home\cloudsr...', 34, Array)
#1 Z:\home\cloudsris.ru\www\application\classes\Controller\Folder.php(34): unserialize('???????? ??????...')
#2 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_Folder->action_create()
#3 [internal function]: RESTful_Controller->execute()
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#5 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2013-11-25 09:10:24 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Controller_Folder::response() ~ APPPATH\classes\Controller\Folder.php [ 32 ] in file:line
2013-11-25 09:10:24 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-25 09:47:30 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: vars ~ APPPATH\classes\Controller\Folder.php [ 39 ] in Z:\home\cloudsris.ru\www\application\classes\Controller\Folder.php:39
2013-11-25 09:47:30 --- DEBUG: #0 Z:\home\cloudsris.ru\www\application\classes\Controller\Folder.php(39): Kohana_Core::error_handler(8, 'Undefined varia...', 'Z:\home\cloudsr...', 39, Array)
#1 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_Folder->action_delete()
#2 [internal function]: RESTful_Controller->execute()
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#7 {main} in Z:\home\cloudsris.ru\www\application\classes\Controller\Folder.php:39
2013-11-25 10:02:29 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: _other ~ APPPATH\classes\Request.php [ 20 ] in Z:\home\cloudsris.ru\www\application\classes\Request.php:20
2013-11-25 10:02:29 --- DEBUG: #0 Z:\home\cloudsris.ru\www\application\classes\Request.php(20): Kohana_Core::error_handler(8, 'Undefined varia...', 'Z:\home\cloudsr...', 20, Array)
#1 Z:\home\cloudsris.ru\www\application\classes\Controller\Folder.php(40): Request->delete()
#2 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_Folder->action_delete()
#3 [internal function]: RESTful_Controller->execute()
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#5 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#8 {main} in Z:\home\cloudsris.ru\www\application\classes\Request.php:20
2013-11-25 10:03:19 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Request::$request ~ APPPATH\classes\Request.php [ 22 ] in Z:\home\cloudsris.ru\www\application\classes\Request.php:22
2013-11-25 10:03:19 --- DEBUG: #0 Z:\home\cloudsris.ru\www\application\classes\Request.php(22): Kohana_Core::error_handler(8, 'Undefined prope...', 'Z:\home\cloudsr...', 22, Array)
#1 Z:\home\cloudsris.ru\www\application\classes\Controller\Folder.php(40): Request->delete()
#2 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_Folder->action_delete()
#3 [internal function]: RESTful_Controller->execute()
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#5 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#8 {main} in Z:\home\cloudsris.ru\www\application\classes\Request.php:22
2013-11-25 10:04:03 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Request::$request ~ APPPATH\classes\Request.php [ 23 ] in Z:\home\cloudsris.ru\www\application\classes\Request.php:23
2013-11-25 10:04:03 --- DEBUG: #0 Z:\home\cloudsris.ru\www\application\classes\Request.php(23): Kohana_Core::error_handler(8, 'Undefined prope...', 'Z:\home\cloudsr...', 23, Array)
#1 Z:\home\cloudsris.ru\www\application\classes\Controller\Folder.php(40): Request->delete()
#2 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_Folder->action_delete()
#3 [internal function]: RESTful_Controller->execute()
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#5 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#8 {main} in Z:\home\cloudsris.ru\www\application\classes\Request.php:23
2013-11-25 08:38:55 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')' ~ APPPATH\classes\Controller\Folder.php [ 43 ] in file:line
2013-11-25 08:38:55 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-25 10:05:24 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function find_all() ~ APPPATH\classes\Controller\Folder.php [ 20 ] in file:line
2013-11-25 10:05:24 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-25 10:05:34 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected T_OBJECT_OPERATOR ~ APPPATH\classes\Controller\Folder.php [ 20 ] in file:line
2013-11-25 10:05:34 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-25 10:05:49 --- CRITICAL: ErrorException [ 4096 ]: Object of class Database_MySQL_Result could not be converted to string ~ APPPATH\classes\Controller\Folder.php [ 22 ] in Z:\home\cloudsris.ru\www\application\classes\Controller\Folder.php:22
2013-11-25 10:05:49 --- DEBUG: #0 Z:\home\cloudsris.ru\www\application\classes\Controller\Folder.php(22): Kohana_Core::error_handler(4096, 'Object of class...', 'Z:\home\cloudsr...', 22, Array)
#1 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_Folder->action_get()
#2 [internal function]: RESTful_Controller->execute()
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#7 {main} in Z:\home\cloudsris.ru\www\application\classes\Controller\Folder.php:22
2013-11-25 11:40:54 --- CRITICAL: ErrorException [ 2 ]: stream_socket_client() [function.stream-socket-client0]: unable to connect to tcp://127.0.0.1:6379 (Подключение не установлено, т.к. конечный компьютер отверг запрос на подключение.
) ~ MODPATH\rediska\classes\Rediska\Connection.php [ 89 ] in file:line
2013-11-25 11:40:54 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'stream_socket_c...', 'Z:\home\cloudsr...', 89, Array)
#1 [internal function]: stream_socket_client('tcp://127.0.0.1...', 10061, '??????????? ?? ...', '60', 4)
#2 Z:\home\cloudsris.ru\www\modules\rediska\classes\Rediska\Connection.php(89): call_user_func_array('stream_socket_c...', Array)
#3 Z:\home\cloudsris.ru\www\modules\rediska\classes\Rediska\Connection.php(176): Rediska_Connection->connect()
#4 Z:\home\cloudsris.ru\www\modules\rediska\classes\Rediska\Connection\Exec.php(86): Rediska_Connection->write('*3??$3??SET??$7...')
#5 Z:\home\cloudsris.ru\www\modules\rediska\classes\Rediska\Command\Abstract.php(135): Rediska_Connection_Exec->write()
#6 Z:\home\cloudsris.ru\www\modules\rediska\classes\Rediska\Command\Abstract.php(177): Rediska_Command_Abstract->write()
#7 Z:\home\cloudsris.ru\www\modules\rediska\classes\Rediska.php(606): Rediska_Command_Abstract->execute()
#8 Z:\home\cloudsris.ru\www\modules\rediska\classes\Rediska.php(803): Rediska->_executeCommand('set', Array)
#9 Z:\home\cloudsris.ru\www\modules\rediska\classes\Rediska\Key.php(29): Rediska->set('keyName', 'd')
#10 Z:\home\cloudsris.ru\www\application\classes\Controller\File.php(16): Rediska_Key->setValue('d')
#11 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_create()
#12 [internal function]: RESTful_Controller->execute()
#13 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#14 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#16 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#17 {main} in file:line
2013-11-25 11:41:09 --- CRITICAL: ErrorException [ 2 ]: stream_socket_client() [function.stream-socket-client0]: unable to connect to tcp://127.0.0.1:6379 (Подключение не установлено, т.к. конечный компьютер отверг запрос на подключение.
) ~ MODPATH\rediska\classes\Rediska\Connection.php [ 89 ] in file:line
2013-11-25 11:41:09 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'stream_socket_c...', 'Z:\home\cloudsr...', 89, Array)
#1 [internal function]: stream_socket_client('tcp://127.0.0.1...', 10061, '??????????? ?? ...', '60', 4)
#2 Z:\home\cloudsris.ru\www\modules\rediska\classes\Rediska\Connection.php(89): call_user_func_array('stream_socket_c...', Array)
#3 Z:\home\cloudsris.ru\www\modules\rediska\classes\Rediska\Connection.php(176): Rediska_Connection->connect()
#4 Z:\home\cloudsris.ru\www\modules\rediska\classes\Rediska\Connection\Exec.php(86): Rediska_Connection->write('*3??$3??SET??$7...')
#5 Z:\home\cloudsris.ru\www\modules\rediska\classes\Rediska\Command\Abstract.php(135): Rediska_Connection_Exec->write()
#6 Z:\home\cloudsris.ru\www\modules\rediska\classes\Rediska\Command\Abstract.php(177): Rediska_Command_Abstract->write()
#7 Z:\home\cloudsris.ru\www\modules\rediska\classes\Rediska.php(606): Rediska_Command_Abstract->execute()
#8 Z:\home\cloudsris.ru\www\modules\rediska\classes\Rediska.php(803): Rediska->_executeCommand('set', Array)
#9 Z:\home\cloudsris.ru\www\modules\rediska\classes\Rediska\Key.php(29): Rediska->set('keyName', 'd')
#10 Z:\home\cloudsris.ru\www\application\classes\Controller\File.php(16): Rediska_Key->setValue('d')
#11 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_create()
#12 [internal function]: RESTful_Controller->execute()
#13 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#14 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#16 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#17 {main} in file:line