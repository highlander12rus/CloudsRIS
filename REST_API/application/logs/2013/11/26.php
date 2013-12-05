<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-11-26 01:19:31 --- CRITICAL: ErrorException [ 1 ]: Class 'Model_Files' not found ~ MODPATH\orm\classes\Kohana\ORM.php [ 46 ] in file:line
2013-11-26 01:19:31 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-26 01:19:58 --- CRITICAL: ErrorException [ 8 ]: Undefined index: files_id ~ MODPATH\orm\classes\Kohana\ORM.php [ 633 ] in Z:\home\cloudsris.ru\www\modules\orm\classes\Kohana\ORM.php:633
2013-11-26 01:19:58 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\orm\classes\Kohana\ORM.php(633): Kohana_Core::error_handler(8, 'Undefined index...', 'Z:\home\cloudsr...', 633, Array)
#1 Z:\home\cloudsris.ru\www\modules\orm\classes\Kohana\ORM.php(603): Kohana_ORM->get('files')
#2 Z:\home\cloudsris.ru\www\application\classes\Controller\File.php(62): Kohana_ORM->__get('files')
#3 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_delete()
#4 [internal function]: RESTful_Controller->execute()
#5 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#6 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#9 {main} in Z:\home\cloudsris.ru\www\modules\orm\classes\Kohana\ORM.php:633
2013-11-26 03:50:47 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Validation::filters() ~ APPPATH\classes\Model\File.php [ 55 ] in file:line
2013-11-26 03:50:47 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-26 03:53:30 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Validation::filter() ~ APPPATH\classes\Model\File.php [ 55 ] in file:line
2013-11-26 03:53:30 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-26 03:54:13 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Validation::filter() ~ APPPATH\classes\Model\File.php [ 36 ] in file:line
2013-11-26 03:54:13 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-26 03:54:53 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Validation::filter() ~ APPPATH\classes\Model\File.php [ 36 ] in file:line
2013-11-26 03:54:53 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-26 03:55:16 --- CRITICAL: ErrorException [ 1 ]: Class 'Validate' not found ~ APPPATH\classes\Model\File.php [ 35 ] in file:line
2013-11-26 03:55:16 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-26 03:57:15 --- CRITICAL: ErrorException [ 1 ]: Class 'Validate' not found ~ APPPATH\classes\Model\File.php [ 36 ] in file:line
2013-11-26 03:57:15 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-26 04:01:18 --- CRITICAL: ErrorException [ 1 ]: Class 'Validate' not found ~ APPPATH\classes\Model\File.php [ 36 ] in file:line
2013-11-26 04:01:18 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-26 04:01:31 --- CRITICAL: ErrorException [ 2 ]: call_user_func() expects parameter 1 to be a valid callback, class 'UTF*' not found ~ SYSPATH\classes\Kohana\Arr.php [ 403 ] in file:line
2013-11-26 04:01:31 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'call_user_func(...', 'Z:\home\cloudsr...', 403, Array)
#1 Z:\home\cloudsris.ru\www\system\classes\Kohana\Arr.php(403): call_user_func('UTF*::trim', '/home/')
#2 Z:\home\cloudsris.ru\www\application\classes\Model\File.php(37): Kohana_Arr::map('UTF*::trim', Array)
#3 Z:\home\cloudsris.ru\www\application\classes\Controller\File.php(12): Model_File->validationFileUploads(Array, Object(Validation))
#4 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_create()
#5 [internal function]: RESTful_Controller->execute()
#6 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#7 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#10 {main} in file:line
2013-11-26 04:02:20 --- CRITICAL: Database_Exception [ 1054 ]: Unknown column 'length' in 'field list' [ INSERT INTO `server_files` (`file_id`, `length`, `check`, `security_method_id`) VALUES (4, '1250', 'dsdasdsdasdasdasd', '2') ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database\Query.php:251
2013-11-26 04:02:20 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `se...', false, Array)
#1 Z:\home\cloudsris.ru\www\application\classes\Model\File.php(101): Kohana_Database_Query->execute()
#2 Z:\home\cloudsris.ru\www\application\classes\Controller\File.php(14): Model_File->saveFilesOperation(Array)
#3 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_create()
#4 [internal function]: RESTful_Controller->execute()
#5 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#6 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#9 {main} in Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database\Query.php:251