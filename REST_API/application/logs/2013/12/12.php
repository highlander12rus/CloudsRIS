<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-12-12 04:07:21 --- EMERGENCY: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/Kohana/HTTP/Exception.php [ 17 ] in /var/www/system/classes/Kohana/Request.php:975
2013-12-12 04:07:21 --- DEBUG: #0 /var/www/system/classes/Kohana/Request.php(975): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 /var/www/index.php(118): Kohana_Request->execute()
#2 {main} in /var/www/system/classes/Kohana/Request.php:975
2013-12-12 04:07:47 --- EMERGENCY: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/Kohana/HTTP/Exception.php [ 17 ] in /var/www/system/classes/Kohana/Request.php:975
2013-12-12 04:07:47 --- DEBUG: #0 /var/www/system/classes/Kohana/Request.php(975): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 /var/www/index.php(118): Kohana_Request->execute()
#2 {main} in /var/www/system/classes/Kohana/Request.php:975
2013-12-12 04:38:57 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Model/File.php [ 77 ] in /var/www/application/classes/Controller/File.php:54
2013-12-12 04:38:57 --- DEBUG: #0 /var/www/application/classes/Controller/File.php(54): Model_File->saveFilesOperation(Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_File->action_create()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/File.php:54
2013-12-12 07:20:41 --- EMERGENCY: Database_Exception [ 2 ]: mysql_connect() [function.mysql-connect0]: Can't connect to MySQL server on '192.168.89.128' (111) ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 67 ] in /var/www/modules/database/classes/Kohana/Database/MySQL.php:431
2013-12-12 07:20:41 --- DEBUG: #0 /var/www/modules/database/classes/Kohana/Database/MySQL.php(431): Kohana_Database_MySQL->connect()
#1 /var/www/modules/database/classes/Kohana/Database.php(478): Kohana_Database_MySQL->escape('dfsdfsdf@dsgf.c...')
#2 /var/www/modules/database/classes/Kohana/Database/Query/Builder.php(116): Kohana_Database->quote('dfsdfsdf@dsgf.c...')
#3 /var/www/modules/database/classes/Kohana/Database/Query/Builder/Select.php(372): Kohana_Database_Query_Builder->_compile_conditions(Object(Database_MySQL), Array)
#4 /var/www/modules/database/classes/Kohana/Database/Query.php(234): Kohana_Database_Query_Builder_Select->compile(Object(Database_MySQL))
#5 /var/www/modules/orm/classes/Kohana/ORM.php(1072): Kohana_Database_Query->execute(Object(Database_MySQL))
#6 /var/www/modules/orm/classes/Kohana/ORM.php(979): Kohana_ORM->_load_result(false)
#7 /var/www/application/classes/Controller/Cabinet.php(68): Kohana_ORM->find()
#8 /var/www/system/classes/Kohana/Controller.php(84): Controller_Cabinet->action_registration()
#9 [internal function]: Kohana_Controller->execute()
#10 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Cabinet))
#11 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /var/www/index.php(118): Kohana_Request->execute()
#14 {main} in /var/www/modules/database/classes/Kohana/Database/MySQL.php:431
2013-12-12 07:25:58 --- EMERGENCY: Database_Exception [ 2 ]: mysql_connect() [function.mysql-connect0]: Access denied for user 'root'@'debian-2.local' (using password: YES) ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 67 ] in /var/www/modules/database/classes/Kohana/Database/MySQL.php:431
2013-12-12 07:25:58 --- DEBUG: #0 /var/www/modules/database/classes/Kohana/Database/MySQL.php(431): Kohana_Database_MySQL->connect()
#1 /var/www/modules/database/classes/Kohana/Database.php(478): Kohana_Database_MySQL->escape('dfsdfsdf@dsgf.c...')
#2 /var/www/modules/database/classes/Kohana/Database/Query/Builder.php(116): Kohana_Database->quote('dfsdfsdf@dsgf.c...')
#3 /var/www/modules/database/classes/Kohana/Database/Query/Builder/Select.php(372): Kohana_Database_Query_Builder->_compile_conditions(Object(Database_MySQL), Array)
#4 /var/www/modules/database/classes/Kohana/Database/Query.php(234): Kohana_Database_Query_Builder_Select->compile(Object(Database_MySQL))
#5 /var/www/modules/orm/classes/Kohana/ORM.php(1072): Kohana_Database_Query->execute(Object(Database_MySQL))
#6 /var/www/modules/orm/classes/Kohana/ORM.php(979): Kohana_ORM->_load_result(false)
#7 /var/www/application/classes/Controller/Cabinet.php(68): Kohana_ORM->find()
#8 /var/www/system/classes/Kohana/Controller.php(84): Controller_Cabinet->action_registration()
#9 [internal function]: Kohana_Controller->execute()
#10 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Cabinet))
#11 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /var/www/index.php(118): Kohana_Request->execute()
#14 {main} in /var/www/modules/database/classes/Kohana/Database/MySQL.php:431
2013-12-12 07:42:42 --- EMERGENCY: ErrorException [ 2 ]: stream_socket_client() [function.stream-socket-client0]: unable to connect to tcp://127.0.0.1:6379 (Connection refused) ~ MODPATH/rediska/classes/Rediska/Connection.php [ 89 ] in file:line
2013-12-12 07:42:42 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'stream_socket_c...', '/var/www/module...', 89, Array)
#1 [internal function]: stream_socket_client('tcp://127.0.0.1...', 111, 'Connection refu...', '60', 4)
#2 /var/www/modules/rediska/classes/Rediska/Connection.php(89): call_user_func_array('stream_socket_c...', Array)
#3 /var/www/modules/rediska/classes/Rediska/Connection.php(176): Rediska_Connection->connect()
#4 /var/www/modules/rediska/classes/Rediska/Connection/Exec.php(86): Rediska_Connection->write('*3??$3??SET??$1...')
#5 /var/www/modules/rediska/classes/Rediska/Command/Abstract.php(135): Rediska_Connection_Exec->write()
#6 /var/www/modules/rediska/classes/Rediska/Command/Abstract.php(177): Rediska_Command_Abstract->write()
#7 /var/www/modules/rediska/classes/Rediska.php(606): Rediska_Command_Abstract->execute()
#8 /var/www/modules/rediska/classes/Rediska.php(803): Rediska->_executeCommand('set', Array)
#9 /var/www/modules/rediska/classes/Rediska/Key.php(29): Rediska->set('8426cde352e206b...', 'w 41234 3')
#10 /var/www/application/classes/Controller/File.php(65): Rediska_Key->setValue('w 41234 3')
#11 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_File->action_create()
#12 [internal function]: RESTful_Controller->execute()
#13 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#14 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#16 /var/www/index.php(118): Kohana_Request->execute()
#17 {main} in file:line
2013-12-12 09:55:47 --- EMERGENCY: HTTP_Exception_404 [ 404 ]: The requested URL manager/html was not found on this server. ~ SYSPATH/classes/Kohana/HTTP/Exception.php [ 17 ] in /var/www/system/classes/Kohana/Request/Client/Internal.php:79
2013-12-12 09:55:47 --- DEBUG: #0 /var/www/system/classes/Kohana/Request/Client/Internal.php(79): Kohana_HTTP_Exception::factory(404, 'The requested U...', Array)
#1 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#2 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#3 /var/www/index.php(118): Kohana_Request->execute()
#4 {main} in /var/www/system/classes/Kohana/Request/Client/Internal.php:79