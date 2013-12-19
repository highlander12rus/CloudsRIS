<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-12-06 06:20:11 --- CRITICAL: HTTP_Exception_404 [ 404 ]:  ~ APPPATH\classes\Controller\File.php [ 22 ] in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-06 06:20:11 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#6 {main} in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-06 06:21:18 --- CRITICAL: HTTP_Exception_404 [ 404 ]:  ~ APPPATH\classes\Controller\File.php [ 29 ] in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-06 06:21:18 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#6 {main} in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-06 06:21:31 --- CRITICAL: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'file_id` = '1'' at line 1 [ SELECT SUM(`length`) as sum FROM server_files` WHERE `file_id` = '1' ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database\Query.php:251
2013-12-06 06:21:31 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT SUM(`len...', false, Array)
#1 Z:\home\cloudsris.ru\www\application\classes\Model\File.php(118): Kohana_Database_Query->execute()
#2 Z:\home\cloudsris.ru\www\application\classes\Controller\File.php(34): Model_File->getSize('1')
#3 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_get()
#4 [internal function]: RESTful_Controller->execute()
#5 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#6 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#9 {main} in Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database\Query.php:251
2013-12-06 06:23:34 --- CRITICAL: Database_Exception [ 1054 ]: Unknown column 'length' in 'field list' [ SELECT SUM(`length`) as sum FROM `server_files` WHERE `file_id` = '1' ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database\Query.php:251
2013-12-06 06:23:34 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT SUM(`len...', false, Array)
#1 Z:\home\cloudsris.ru\www\application\classes\Model\File.php(118): Kohana_Database_Query->execute()
#2 Z:\home\cloudsris.ru\www\application\classes\Controller\File.php(34): Model_File->getSize('1')
#3 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_get()
#4 [internal function]: RESTful_Controller->execute()
#5 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#6 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#9 {main} in Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database\Query.php:251
2013-12-06 06:24:02 --- CRITICAL: Database_Exception [ 1146 ]: Table 'cloudsris.address_block' doesn't exist [ SELECT `ip` FROM `server_files` JOIN `address_block` ON (`block_id` = `blok_id`) WHERE `file_id` = '1' AND `order` = 0 ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database\Query.php:251
2013-12-06 06:24:02 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT `ip` FRO...', false, Array)
#1 Z:\home\cloudsris.ru\www\application\classes\Model\File.php(140): Kohana_Database_Query->execute()
#2 Z:\home\cloudsris.ru\www\application\classes\Controller\File.php(36): Model_File->getFilesLocationIp('1')
#3 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_get()
#4 [internal function]: RESTful_Controller->execute()
#5 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#6 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#9 {main} in Z:\home\cloudsris.ru\www\modules\database\classes\Kohana\Database\Query.php:251
2013-12-06 06:25:53 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Database_MySQL_Result::$check ~ APPPATH\classes\Model\File.php [ 129 ] in Z:\home\cloudsris.ru\www\application\classes\Model\File.php:129
2013-12-06 06:25:53 --- DEBUG: #0 Z:\home\cloudsris.ru\www\application\classes\Model\File.php(129): Kohana_Core::error_handler(8, 'Undefined prope...', 'Z:\home\cloudsr...', 129, Array)
#1 Z:\home\cloudsris.ru\www\application\classes\Controller\File.php(35): Model_File->getCheckSumm('1')
#2 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_get()
#3 [internal function]: RESTful_Controller->execute()
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#5 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#8 {main} in Z:\home\cloudsris.ru\www\application\classes\Model\File.php:129
2013-12-06 06:26:33 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Database_MySQL_Result::$check ~ APPPATH\classes\Model\File.php [ 129 ] in Z:\home\cloudsris.ru\www\application\classes\Model\File.php:129
2013-12-06 06:26:33 --- DEBUG: #0 Z:\home\cloudsris.ru\www\application\classes\Model\File.php(129): Kohana_Core::error_handler(8, 'Undefined prope...', 'Z:\home\cloudsr...', 129, Array)
#1 Z:\home\cloudsris.ru\www\application\classes\Controller\File.php(35): Model_File->getCheckSumm('1')
#2 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_get()
#3 [internal function]: RESTful_Controller->execute()
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#5 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#8 {main} in Z:\home\cloudsris.ru\www\application\classes\Model\File.php:129
2013-12-06 06:26:58 --- CRITICAL: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH\classes\Model\File.php [ 129 ] in Z:\home\cloudsris.ru\www\application\classes\Model\File.php:129
2013-12-06 06:26:58 --- DEBUG: #0 Z:\home\cloudsris.ru\www\application\classes\Model\File.php(129): Kohana_Core::error_handler(8, 'Undefined offse...', 'Z:\home\cloudsr...', 129, Array)
#1 Z:\home\cloudsris.ru\www\application\classes\Controller\File.php(35): Model_File->getCheckSumm('1')
#2 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_get()
#3 [internal function]: RESTful_Controller->execute()
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#5 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#8 {main} in Z:\home\cloudsris.ru\www\application\classes\Model\File.php:129
2013-12-06 06:27:22 --- CRITICAL: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH\classes\Model\File.php [ 130 ] in Z:\home\cloudsris.ru\www\application\classes\Model\File.php:130
2013-12-06 06:27:22 --- DEBUG: #0 Z:\home\cloudsris.ru\www\application\classes\Model\File.php(130): Kohana_Core::error_handler(8, 'Undefined offse...', 'Z:\home\cloudsr...', 130, Array)
#1 Z:\home\cloudsris.ru\www\application\classes\Controller\File.php(35): Model_File->getCheckSumm('1')
#2 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_get()
#3 [internal function]: RESTful_Controller->execute()
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#5 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#8 {main} in Z:\home\cloudsris.ru\www\application\classes\Model\File.php:130
2013-12-06 06:38:28 --- CRITICAL: ErrorException [ 2 ]: stream_socket_client() [function.stream-socket-client0]: unable to connect to tcp://127.0.0.1:6379 (Подключение не установлено, т.к. конечный компьютер отверг запрос на подключение.
) ~ MODPATH\rediska\classes\Rediska\Connection.php [ 89 ] in file:line
2013-12-06 06:38:28 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'stream_socket_c...', 'Z:\home\cloudsr...', 89, Array)
#1 [internal function]: stream_socket_client('tcp://127.0.0.1...', 10061, '??????????? ?? ...', '60', 4)
#2 Z:\home\cloudsris.ru\www\modules\rediska\classes\Rediska\Connection.php(89): call_user_func_array('stream_socket_c...', Array)
#3 Z:\home\cloudsris.ru\www\modules\rediska\classes\Rediska\Connection.php(176): Rediska_Connection->connect()
#4 Z:\home\cloudsris.ru\www\modules\rediska\classes\Rediska\Connection\Exec.php(86): Rediska_Connection->write('*3??$3??SET??$1...')
#5 Z:\home\cloudsris.ru\www\modules\rediska\classes\Rediska\Command\Abstract.php(135): Rediska_Connection_Exec->write()
#6 Z:\home\cloudsris.ru\www\modules\rediska\classes\Rediska\Command\Abstract.php(177): Rediska_Command_Abstract->write()
#7 Z:\home\cloudsris.ru\www\modules\rediska\classes\Rediska.php(606): Rediska_Command_Abstract->execute()
#8 Z:\home\cloudsris.ru\www\modules\rediska\classes\Rediska.php(803): Rediska->_executeCommand('set', Array)
#9 Z:\home\cloudsris.ru\www\modules\rediska\classes\Rediska\Key.php(29): Rediska->set('c415583296aaeda...', 'w 400 2')
#10 Z:\home\cloudsris.ru\www\application\classes\Controller\File.php(58): Rediska_Key->setValue('w 400 2')
#11 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_create()
#12 [internal function]: RESTful_Controller->execute()
#13 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#14 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#16 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#17 {main} in file:line