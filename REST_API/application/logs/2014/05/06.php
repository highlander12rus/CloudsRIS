<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-05-06 01:18:58 --- EMERGENCY: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/Kohana/HTTP/Exception.php [ 17 ] in /var/www/system/classes/Kohana/Request.php:975
2014-05-06 01:18:58 --- DEBUG: #0 /var/www/system/classes/Kohana/Request.php(975): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 /var/www/index.php(118): Kohana_Request->execute()
#2 {main} in /var/www/system/classes/Kohana/Request.php:975
2014-05-06 02:08:35 --- EMERGENCY: HTTP_Exception_412 [ 412 ]:  ~ APPPATH/classes/Controller/Auth.php [ 20 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-06 02:08:35 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Auth->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-06 02:09:57 --- EMERGENCY: HTTP_Exception_412 [ 412 ]:  ~ APPPATH/classes/Controller/Auth.php [ 20 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-06 02:09:57 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Auth->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-06 02:10:28 --- EMERGENCY: HTTP_Exception_412 [ 412 ]:  ~ APPPATH/classes/Controller/Auth.php [ 20 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-06 02:10:28 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Auth->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-06 02:10:43 --- EMERGENCY: ErrorException [ 1 ]: Class 'ORM' not found ~ APPPATH/classes/Auth/REST.php [ 21 ] in file:line
2014-05-06 02:10:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-06 02:14:47 --- EMERGENCY: ErrorException [ 1 ]: Class 'ORM' not found ~ APPPATH/classes/Auth/REST.php [ 21 ] in file:line
2014-05-06 02:14:47 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-06 02:16:48 --- EMERGENCY: ErrorException [ 1 ]: Class 'Mango' not found ~ APPPATH/classes/Auth/REST.php [ 19 ] in file:line
2014-05-06 02:16:48 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-06 02:49:56 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_User::where() ~ APPPATH/classes/Auth/REST.php [ 20 ] in file:line
2014-05-06 02:49:56 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-06 03:03:07 --- EMERGENCY: ErrorException [ 1 ]: Class 'MangoDB' not found ~ MODPATH/mangodb/classes/Kohana/Mango.php [ 277 ] in file:line
2014-05-06 03:03:07 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-06 03:03:38 --- EMERGENCY: ErrorException [ 1 ]: Class 'Mongo' not found ~ MODPATH/mangodb/classes/Kohana/MangoDB.php [ 92 ] in file:line
2014-05-06 03:03:38 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-06 03:10:48 --- EMERGENCY: ErrorException [ 8192 ]: Kohana_MangoDB::__construct() [kohana-mangodb.--construct0]: The Mongo class is deprecated, please use the MongoClient class ~ MODPATH/mangodb/classes/Kohana/MangoDB.php [ 92 ] in /var/www/modules/mangodb/classes/Kohana/MangoDB.php:92
2014-05-06 03:10:48 --- DEBUG: #0 /var/www/modules/mangodb/classes/Kohana/MangoDB.php(92): Kohana_Core::error_handler(8192, 'Kohana_MangoDB:...', '/var/www/module...', 92, Array)
#1 /var/www/modules/mangodb/classes/Kohana/MangoDB.php(56): Kohana_MangoDB->__construct('default', Array)
#2 /var/www/modules/mangodb/classes/Kohana/Mango.php(277): Kohana_MangoDB::instance(NULL)
#3 /var/www/modules/mangodb/classes/Kohana/Mango.php(929): Kohana_Mango->db()
#4 /var/www/application/classes/Auth/REST.php(26): Kohana_Mango->load(1, NULL, 0, Array, Array)
#5 /var/www/application/classes/Controller/Auth.php(29): Auth_REST->login('Meanwhile', '984c2e908df1cbe...')
#6 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Auth->action_get()
#7 [internal function]: RESTful_Controller->execute()
#8 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#9 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#11 /var/www/index.php(118): Kohana_Request->execute()
#12 {main} in /var/www/modules/mangodb/classes/Kohana/MangoDB.php:92
2014-05-06 03:11:16 --- EMERGENCY: ErrorException [ 8192 ]: MongoClient::__construct() [mongoclient.--construct0]: The 'timeout' option is deprecated. Please use 'connectTimeoutMS' instead ~ MODPATH/mangodb/classes/Kohana/MangoDB.php [ 92 ] in file:line
2014-05-06 03:11:16 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8192, 'MongoClient::__...', '/var/www/module...', 92, Array)
#1 /var/www/modules/mangodb/classes/Kohana/MangoDB.php(92): MongoClient->__construct('mongodb://local...', Array)
#2 /var/www/modules/mangodb/classes/Kohana/MangoDB.php(56): Kohana_MangoDB->__construct('default', Array)
#3 /var/www/modules/mangodb/classes/Kohana/Mango.php(277): Kohana_MangoDB::instance(NULL)
#4 /var/www/modules/mangodb/classes/Kohana/Mango.php(929): Kohana_Mango->db()
#5 /var/www/application/classes/Auth/REST.php(26): Kohana_Mango->load(1, NULL, 0, Array, Array)
#6 /var/www/application/classes/Controller/Auth.php(29): Auth_REST->login('Meanwhile', '984c2e908df1cbe...')
#7 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Auth->action_get()
#8 [internal function]: RESTful_Controller->execute()
#9 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#10 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#12 /var/www/index.php(118): Kohana_Request->execute()
#13 {main} in file:line
2014-05-06 03:11:41 --- EMERGENCY: ErrorException [ 8192 ]: MongoClient::__construct() [mongoclient.--construct0]: The 'timeout' option is deprecated. Please use 'connectTimeoutMS' instead ~ MODPATH/mangodb/classes/Kohana/MangoDB.php [ 92 ] in file:line
2014-05-06 03:11:41 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8192, 'MongoClient::__...', '/var/www/module...', 92, Array)
#1 /var/www/modules/mangodb/classes/Kohana/MangoDB.php(92): MongoClient->__construct('mongodb://local...', Array)
#2 /var/www/modules/mangodb/classes/Kohana/MangoDB.php(56): Kohana_MangoDB->__construct('default', Array)
#3 /var/www/modules/mangodb/classes/Kohana/Mango.php(277): Kohana_MangoDB::instance(NULL)
#4 /var/www/modules/mangodb/classes/Kohana/Mango.php(929): Kohana_Mango->db()
#5 /var/www/application/classes/Auth/REST.php(26): Kohana_Mango->load(1, NULL, 0, Array, Array)
#6 /var/www/application/classes/Controller/Auth.php(29): Auth_REST->login('Meanwhile', '984c2e908df1cbe...')
#7 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Auth->action_get()
#8 [internal function]: RESTful_Controller->execute()
#9 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#10 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#12 /var/www/index.php(118): Kohana_Request->execute()
#13 {main} in file:line
2014-05-06 03:12:03 --- EMERGENCY: ErrorException [ 8192 ]: Kohana_MangoDB::connect() [kohana-mangodb.connect0]: The 'connected' property is deprecated ~ MODPATH/mangodb/classes/Kohana/MangoDB.php [ 118 ] in /var/www/modules/mangodb/classes/Kohana/MangoDB.php:118
2014-05-06 03:12:03 --- DEBUG: #0 /var/www/modules/mangodb/classes/Kohana/MangoDB.php(118): Kohana_Core::error_handler(8192, 'Kohana_MangoDB:...', '/var/www/module...', 118, Array)
#1 /var/www/modules/mangodb/classes/Kohana/MangoDB.php(359): Kohana_MangoDB->connect()
#2 /var/www/modules/mangodb/classes/Kohana/MangoDB.php(251): Kohana_MangoDB->_call('find', Array)
#3 /var/www/modules/mangodb/classes/Kohana/Mango.php(929): Kohana_MangoDB->find('users', Array, Array)
#4 /var/www/application/classes/Auth/REST.php(26): Kohana_Mango->load(1, NULL, 0, Array, Array)
#5 /var/www/application/classes/Controller/Auth.php(29): Auth_REST->login('Meanwhile', '984c2e908df1cbe...')
#6 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Auth->action_get()
#7 [internal function]: RESTful_Controller->execute()
#8 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#9 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#11 /var/www/index.php(118): Kohana_Request->execute()
#12 {main} in /var/www/modules/mangodb/classes/Kohana/MangoDB.php:118
2014-05-06 03:13:13 --- EMERGENCY: ErrorException [ 8192 ]: Kohana_MangoDB::connect() [kohana-mangodb.connect0]: The 'connected' property is deprecated ~ MODPATH/mangodb/classes/Kohana/MangoDB.php [ 118 ] in /var/www/modules/mangodb/classes/Kohana/MangoDB.php:118
2014-05-06 03:13:13 --- DEBUG: #0 /var/www/modules/mangodb/classes/Kohana/MangoDB.php(118): Kohana_Core::error_handler(8192, 'Kohana_MangoDB:...', '/var/www/module...', 118, Array)
#1 /var/www/modules/mangodb/classes/Kohana/MangoDB.php(359): Kohana_MangoDB->connect()
#2 /var/www/modules/mangodb/classes/Kohana/MangoDB.php(251): Kohana_MangoDB->_call('find', Array)
#3 /var/www/modules/mangodb/classes/Kohana/Mango.php(929): Kohana_MangoDB->find('users', Array, Array)
#4 /var/www/application/classes/Auth/REST.php(26): Kohana_Mango->load(1, NULL, 0, Array, Array)
#5 /var/www/application/classes/Controller/Auth.php(29): Auth_REST->login('Meanwhile', '984c2e908df1cbe...')
#6 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Auth->action_get()
#7 [internal function]: RESTful_Controller->execute()
#8 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#9 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#11 /var/www/index.php(118): Kohana_Request->execute()
#12 {main} in /var/www/modules/mangodb/classes/Kohana/MangoDB.php:118
2014-05-06 03:17:10 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ')' ~ MODPATH/mangodb/classes/Kohana/MangoDB.php [ 113 ] in file:line
2014-05-06 03:17:10 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-06 03:17:20 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method MangoDB::getConnections() ~ MODPATH/mangodb/classes/Kohana/MangoDB.php [ 111 ] in file:line
2014-05-06 03:17:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-06 03:17:56 --- EMERGENCY: ErrorException [ 8192 ]: Kohana_MangoDB::connect() [kohana-mangodb.connect0]: The 'connected' property is deprecated ~ MODPATH/mangodb/classes/Kohana/MangoDB.php [ 118 ] in /var/www/modules/mangodb/classes/Kohana/MangoDB.php:118
2014-05-06 03:17:56 --- DEBUG: #0 /var/www/modules/mangodb/classes/Kohana/MangoDB.php(118): Kohana_Core::error_handler(8192, 'Kohana_MangoDB:...', '/var/www/module...', 118, Array)
#1 /var/www/modules/mangodb/classes/Kohana/MangoDB.php(359): Kohana_MangoDB->connect()
#2 /var/www/modules/mangodb/classes/Kohana/MangoDB.php(251): Kohana_MangoDB->_call('find', Array)
#3 /var/www/modules/mangodb/classes/Kohana/Mango.php(929): Kohana_MangoDB->find('users', Array, Array)
#4 /var/www/application/classes/Auth/REST.php(26): Kohana_Mango->load(1, NULL, 0, Array, Array)
#5 /var/www/application/classes/Controller/Auth.php(29): Auth_REST->login('Meanwhile', '984c2e908df1cbe...')
#6 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Auth->action_get()
#7 [internal function]: RESTful_Controller->execute()
#8 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#9 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#11 /var/www/index.php(118): Kohana_Request->execute()
#12 {main} in /var/www/modules/mangodb/classes/Kohana/MangoDB.php:118
2014-05-06 03:20:00 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function selectCollection() on a non-object ~ MODPATH/mangodb/classes/Kohana/MangoDB.php [ 380 ] in file:line
2014-05-06 03:20:00 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-06 03:21:14 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function selectCollection() on a non-object ~ MODPATH/mangodb/classes/Kohana/MangoDB.php [ 380 ] in file:line
2014-05-06 03:21:14 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-06 03:22:42 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function selectCollection() on a non-object ~ MODPATH/mangodb/classes/Kohana/MangoDB.php [ 379 ] in file:line
2014-05-06 03:22:42 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-06 03:24:25 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function selectCollection() on a non-object ~ MODPATH/mangodb/classes/Kohana/MangoDB.php [ 378 ] in file:line
2014-05-06 03:24:25 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-06 03:27:55 --- EMERGENCY: Mango_Exception [ 0 ]: user model does not have a field session_id ~ MODPATH/mangodb/classes/Kohana/Mango.php [ 442 ] in /var/www/application/classes/Auth/REST.php:27
2014-05-06 03:27:55 --- DEBUG: #0 /var/www/application/classes/Auth/REST.php(27): Kohana_Mango->__get('session_id')
#1 /var/www/application/classes/Controller/Auth.php(29): Auth_REST->login('Meanwhile', '984c2e908df1cbe...')
#2 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Auth->action_get()
#3 [internal function]: RESTful_Controller->execute()
#4 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#5 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/index.php(118): Kohana_Request->execute()
#8 {main} in /var/www/application/classes/Auth/REST.php:27
2014-05-06 03:34:26 --- EMERGENCY: ErrorException [ 2 ]: Illegal string offset 'type' ~ MODPATH/mangodb/classes/Kohana/Mango.php [ 571 ] in /var/www/modules/mangodb/classes/Kohana/Mango.php:571
2014-05-06 03:34:26 --- DEBUG: #0 /var/www/modules/mangodb/classes/Kohana/Mango.php(571): Kohana_Core::error_handler(2, 'Illegal string ...', '/var/www/module...', 571, Array)
#1 /var/www/modules/mangodb/classes/Kohana/Mango.php(168): Kohana_Mango->init()
#2 /var/www/modules/mangodb/classes/Kohana/Mango.php(53): Kohana_Mango->__construct()
#3 /var/www/application/classes/Auth/REST.php(19): Kohana_Mango::factory('User')
#4 /var/www/application/classes/Controller/Auth.php(29): Auth_REST->login('Meanwhile', '984c2e908df1cbe...')
#5 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Auth->action_get()
#6 [internal function]: RESTful_Controller->execute()
#7 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /var/www/index.php(118): Kohana_Request->execute()
#11 {main} in /var/www/modules/mangodb/classes/Kohana/Mango.php:571
2014-05-06 03:40:07 --- EMERGENCY: ErrorException [ 8 ]: Array to string conversion ~ APPPATH/classes/Auth/REST.php [ 33 ] in /var/www/application/classes/Auth/REST.php:33
2014-05-06 03:40:07 --- DEBUG: #0 /var/www/application/classes/Auth/REST.php(33): Kohana_Core::error_handler(8, 'Array to string...', '/var/www/applic...', 33, Array)
#1 /var/www/application/classes/Controller/Auth.php(29): Auth_REST->login('Meanwhile', '984c2e908df1cbe...')
#2 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Auth->action_get()
#3 [internal function]: RESTful_Controller->execute()
#4 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#5 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/index.php(118): Kohana_Request->execute()
#8 {main} in /var/www/application/classes/Auth/REST.php:33
2014-05-06 03:40:10 --- EMERGENCY: ErrorException [ 8 ]: Array to string conversion ~ APPPATH/classes/Auth/REST.php [ 33 ] in /var/www/application/classes/Auth/REST.php:33
2014-05-06 03:40:10 --- DEBUG: #0 /var/www/application/classes/Auth/REST.php(33): Kohana_Core::error_handler(8, 'Array to string...', '/var/www/applic...', 33, Array)
#1 /var/www/application/classes/Controller/Auth.php(29): Auth_REST->login('Meanwhile', '984c2e908df1cbe...')
#2 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Auth->action_get()
#3 [internal function]: RESTful_Controller->execute()
#4 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#5 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/index.php(118): Kohana_Request->execute()
#8 {main} in /var/www/application/classes/Auth/REST.php:33
2014-05-06 03:46:01 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method MangoDB::ind() ~ APPPATH/classes/Auth/REST.php [ 21 ] in file:line
2014-05-06 03:46:01 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-06 03:52:37 --- EMERGENCY: ErrorException [ 4096 ]: Object of class MongoCursor could not be converted to string ~ APPPATH/classes/Auth/REST.php [ 24 ] in /var/www/application/classes/Auth/REST.php:24
2014-05-06 03:52:37 --- DEBUG: #0 /var/www/application/classes/Auth/REST.php(24): Kohana_Core::error_handler(4096, 'Object of class...', '/var/www/applic...', 24, Array)
#1 /var/www/application/classes/Controller/Auth.php(29): Auth_REST->login('ilia12r@gmail.c...', '12343456')
#2 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Auth->action_get()
#3 [internal function]: RESTful_Controller->execute()
#4 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#5 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/index.php(118): Kohana_Request->execute()
#8 {main} in /var/www/application/classes/Auth/REST.php:24
2014-05-06 04:07:49 --- EMERGENCY: Mango_Exception [ 0 ]: user model does not have a field lifetime ~ MODPATH/mangodb/classes/Kohana/Mango.php [ 511 ] in /var/www/application/classes/Auth/REST.php:35
2014-05-06 04:07:49 --- DEBUG: #0 /var/www/application/classes/Auth/REST.php(35): Kohana_Mango->__set('lifetime', 1399453669)
#1 /var/www/application/classes/Controller/Auth.php(29): Auth_REST->login('ilia12r@gmail.c...', '123456')
#2 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Auth->action_get()
#3 [internal function]: RESTful_Controller->execute()
#4 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#5 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/index.php(118): Kohana_Request->execute()
#8 {main} in /var/www/application/classes/Auth/REST.php:35
2014-05-06 04:08:18 --- EMERGENCY: Mango_Exception [ 0 ]: user model does not have a field session_id ~ MODPATH/mangodb/classes/Kohana/Mango.php [ 442 ] in /var/www/application/classes/Auth/REST.php:33
2014-05-06 04:08:18 --- DEBUG: #0 /var/www/application/classes/Auth/REST.php(33): Kohana_Mango->__get('session_id')
#1 /var/www/application/classes/Controller/Auth.php(29): Auth_REST->login('ilia12r@gmail.c...', '123456')
#2 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Auth->action_get()
#3 [internal function]: RESTful_Controller->execute()
#4 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#5 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/index.php(118): Kohana_Request->execute()
#8 {main} in /var/www/application/classes/Auth/REST.php:33
2014-05-06 04:08:32 --- EMERGENCY: Mango_Exception [ 0 ]: user model does not have a field lifetime ~ MODPATH/mangodb/classes/Kohana/Mango.php [ 511 ] in /var/www/application/classes/Auth/REST.php:35
2014-05-06 04:08:32 --- DEBUG: #0 /var/www/application/classes/Auth/REST.php(35): Kohana_Mango->__set('lifetime', 1399453712)
#1 /var/www/application/classes/Controller/Auth.php(29): Auth_REST->login('ilia12r@gmail.c...', '123456')
#2 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Auth->action_get()
#3 [internal function]: RESTful_Controller->execute()
#4 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#5 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/index.php(118): Kohana_Request->execute()
#8 {main} in /var/www/application/classes/Auth/REST.php:35
2014-05-06 04:09:21 --- EMERGENCY: Mango_Exception [ 0 ]: user model does not have a field lifetime ~ MODPATH/mangodb/classes/Kohana/Mango.php [ 511 ] in /var/www/application/classes/Auth/REST.php:35
2014-05-06 04:09:21 --- DEBUG: #0 /var/www/application/classes/Auth/REST.php(35): Kohana_Mango->__set('lifetime', 1399453761)
#1 /var/www/application/classes/Controller/Auth.php(29): Auth_REST->login('ilia12r@gmail.c...', '123456')
#2 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Auth->action_get()
#3 [internal function]: RESTful_Controller->execute()
#4 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#5 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/index.php(118): Kohana_Request->execute()
#8 {main} in /var/www/application/classes/Auth/REST.php:35
2014-05-06 04:20:38 --- EMERGENCY: ErrorException [ 4096 ]: Argument 1 passed to MongoCollection::__construct() must be an instance of MongoDB, instance of MongoClient given, called in /var/www/modules/mangodb/classes/Kohana/MangoDB.php on line 56 and defined ~ MODPATH/mangodb/classes/Kohana/MangoDB.php [ 93 ] in file:line
2014-05-06 04:20:38 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(4096, 'Argument 1 pass...', '/var/www/module...', 93, Array)
#1 /var/www/modules/mangodb/classes/Kohana/MangoDB.php(93): MongoCollection->__construct(Object(MongoClient), 'users')
#2 /var/www/modules/mangodb/classes/Kohana/MangoDB.php(56): Kohana_MangoDB->__construct('default', Array)
#3 /var/www/application/classes/Auth/REST.php(29): Kohana_MangoDB::instance()
#4 /var/www/application/classes/Controller/Auth.php(29): Auth_REST->login('ilia12r@gmail.c...', '123456')
#5 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Auth->action_get()
#6 [internal function]: RESTful_Controller->execute()
#7 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /var/www/index.php(118): Kohana_Request->execute()
#11 {main} in file:line
2014-05-06 04:21:23 --- EMERGENCY: ErrorException [ 4096 ]: Argument 1 passed to MongoCollection::__construct() must be an instance of MongoDB, instance of MongoClient given, called in /var/www/modules/mangodb/classes/Kohana/MangoDB.php on line 56 and defined ~ MODPATH/mangodb/classes/Kohana/MangoDB.php [ 93 ] in file:line
2014-05-06 04:21:23 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(4096, 'Argument 1 pass...', '/var/www/module...', 93, Array)
#1 /var/www/modules/mangodb/classes/Kohana/MangoDB.php(93): MongoCollection->__construct(Object(MongoClient), 'users')
#2 /var/www/modules/mangodb/classes/Kohana/MangoDB.php(56): Kohana_MangoDB->__construct('default', Array)
#3 /var/www/application/classes/Auth/REST.php(29): Kohana_MangoDB::instance()
#4 /var/www/application/classes/Controller/Auth.php(29): Auth_REST->login('ilia12r@gmail.c...', '123456')
#5 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Auth->action_get()
#6 [internal function]: RESTful_Controller->execute()
#7 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /var/www/index.php(118): Kohana_Request->execute()
#11 {main} in file:line
2014-05-06 04:24:49 --- EMERGENCY: ErrorException [ 4096 ]: Argument 1 passed to MongoCollection::__construct() must be an instance of MongoDB, instance of MongoClient given, called in /var/www/modules/mangodb/classes/Kohana/MangoDB.php on line 56 and defined ~ MODPATH/mangodb/classes/Kohana/MangoDB.php [ 93 ] in file:line
2014-05-06 04:24:49 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(4096, 'Argument 1 pass...', '/var/www/module...', 93, Array)
#1 /var/www/modules/mangodb/classes/Kohana/MangoDB.php(93): MongoCollection->__construct(Object(MongoClient), 'users')
#2 /var/www/modules/mangodb/classes/Kohana/MangoDB.php(56): Kohana_MangoDB->__construct('default', Array)
#3 /var/www/application/classes/Auth/REST.php(29): Kohana_MangoDB::instance()
#4 /var/www/application/classes/Controller/Auth.php(29): Auth_REST->login('ilia12r@gmail.c...', '123456')
#5 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Auth->action_get()
#6 [internal function]: RESTful_Controller->execute()
#7 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#8 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /var/www/index.php(118): Kohana_Request->execute()
#11 {main} in file:line
2014-05-06 04:25:38 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method MangoDB::connect() ~ MODPATH/mangodb/classes/Kohana/MangoDB.php [ 103 ] in file:line
2014-05-06 04:25:38 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-06 04:30:38 --- EMERGENCY: ErrorException [ 2 ]: MongoCollection::find() [mongocollection.find0]: expects parameter 1 to be an array or object, string given ~ APPPATH/classes/Auth/REST.php [ 33 ] in file:line
2014-05-06 04:30:38 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'MongoCollection...', '/var/www/applic...', 33, Array)
#1 /var/www/application/classes/Auth/REST.php(33): MongoCollection->find('users', Array)
#2 /var/www/application/classes/Controller/Auth.php(29): Auth_REST->login('ilia12r@gmail.c...', '123456')
#3 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Auth->action_get()
#4 [internal function]: RESTful_Controller->execute()
#5 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#6 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2014-05-06 04:30:55 --- EMERGENCY: ErrorException [ 1 ]: Class 'Mango' not found ~ APPPATH/classes/Auth/REST.php [ 39 ] in file:line
2014-05-06 04:30:55 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-06 04:34:57 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function findOne() on a non-object ~ APPPATH/classes/Auth/REST.php [ 30 ] in file:line
2014-05-06 04:34:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-06 04:35:36 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function findOne() on a non-object ~ APPPATH/classes/Auth/REST.php [ 30 ] in file:line
2014-05-06 04:35:36 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-06 04:36:04 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function findOne() on a non-object ~ APPPATH/classes/Auth/REST.php [ 32 ] in file:line
2014-05-06 04:36:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-06 04:36:55 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '.123' (T_DNUMBER), expecting ',' or ';' ~ MODPATH/mangodb/classes/Kohana/MangoDB.php [ 91 ] in file:line
2014-05-06 04:36:55 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-06 04:49:00 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: set ~ APPPATH/classes/Auth/REST.php [ 26 ] in /var/www/application/classes/Auth/REST.php:26
2014-05-06 04:49:00 --- DEBUG: #0 /var/www/application/classes/Auth/REST.php(26): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/applic...', 26, Array)
#1 /var/www/application/classes/Controller/Auth.php(29): Auth_REST->login('ilia12r@gmail.c...', '123456')
#2 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Auth->action_get()
#3 [internal function]: RESTful_Controller->execute()
#4 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#5 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/index.php(118): Kohana_Request->execute()
#8 {main} in /var/www/application/classes/Auth/REST.php:26
2014-05-06 04:49:16 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/Auth/REST.php [ 35 ] in /var/www/application/classes/Auth/REST.php:35
2014-05-06 04:49:16 --- DEBUG: #0 /var/www/application/classes/Auth/REST.php(35): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/applic...', 35, Array)
#1 /var/www/application/classes/Controller/Auth.php(29): Auth_REST->login('ilia12r@gmail.c...', '123456')
#2 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Auth->action_get()
#3 [internal function]: RESTful_Controller->execute()
#4 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#5 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/index.php(118): Kohana_Request->execute()
#8 {main} in /var/www/application/classes/Auth/REST.php:35
2014-05-06 04:52:46 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/Auth/REST.php [ 101 ] in /var/www/application/classes/Auth/REST.php:101
2014-05-06 04:52:46 --- DEBUG: #0 /var/www/application/classes/Auth/REST.php(101): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/applic...', 101, Array)
#1 /var/www/application/classes/Controller/Auth.php(35): Auth_REST->getLeftTime()
#2 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Auth->action_get()
#3 [internal function]: RESTful_Controller->execute()
#4 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#5 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/index.php(118): Kohana_Request->execute()
#8 {main} in /var/www/application/classes/Auth/REST.php:101
2014-05-06 05:00:36 --- EMERGENCY: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH/classes/Controller/REST.php [ 34 ] in /var/www/application/classes/Controller/REST.php:34
2014-05-06 05:00:36 --- DEBUG: #0 /var/www/application/classes/Controller/REST.php(34): Kohana_Core::error_handler(2, 'Attempt to assi...', '/var/www/applic...', 34, Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(49): Controller_REST->before()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/REST.php:34
2014-05-06 06:52:47 --- EMERGENCY: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH/classes/Controller/REST.php [ 34 ] in /var/www/application/classes/Controller/REST.php:34
2014-05-06 06:52:47 --- DEBUG: #0 /var/www/application/classes/Controller/REST.php(34): Kohana_Core::error_handler(2, 'Attempt to assi...', '/var/www/applic...', 34, Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(49): Controller_REST->before()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/REST.php:34
2014-05-06 06:53:32 --- EMERGENCY: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH/classes/Controller/REST.php [ 34 ] in /var/www/application/classes/Controller/REST.php:34
2014-05-06 06:53:32 --- DEBUG: #0 /var/www/application/classes/Controller/REST.php(34): Kohana_Core::error_handler(2, 'Attempt to assi...', '/var/www/applic...', 34, Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(49): Controller_REST->before()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/REST.php:34
2014-05-06 06:53:52 --- EMERGENCY: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH/classes/Controller/REST.php [ 34 ] in /var/www/application/classes/Controller/REST.php:34
2014-05-06 06:53:52 --- DEBUG: #0 /var/www/application/classes/Controller/REST.php(34): Kohana_Core::error_handler(2, 'Attempt to assi...', '/var/www/applic...', 34, Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(49): Controller_REST->before()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/REST.php:34
2014-05-06 06:57:43 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: newData ~ APPPATH/classes/Auth/REST.php [ 90 ] in /var/www/application/classes/Auth/REST.php:90
2014-05-06 06:57:43 --- DEBUG: #0 /var/www/application/classes/Auth/REST.php(90): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/applic...', 90, Array)
#1 /var/www/application/classes/Controller/REST.php(32): Auth_REST->logged_in('19ced5e6fcd5cde...')
#2 /var/www/modules/restful/classes/RESTful/Controller.php(49): Controller_REST->before()
#3 [internal function]: RESTful_Controller->execute()
#4 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#5 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/index.php(118): Kohana_Request->execute()
#8 {main} in /var/www/application/classes/Auth/REST.php:90
2014-05-06 06:58:31 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: id ~ APPPATH/classes/Controller/Folder.php [ 25 ] in /var/www/application/classes/Controller/Folder.php:25
2014-05-06 06:58:31 --- DEBUG: #0 /var/www/application/classes/Controller/Folder.php(25): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/applic...', 25, Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/Folder.php:25
2014-05-06 07:28:54 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 1 ~ APPPATH/classes/Controller/Folder.php [ 22 ] in /var/www/application/classes/Controller/Folder.php:22
2014-05-06 07:28:54 --- DEBUG: #0 /var/www/application/classes/Controller/Folder.php(22): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/applic...', 22, Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/Folder.php:22
2014-05-06 07:48:57 --- EMERGENCY: ErrorException [ 8 ]: Array to string conversion ~ APPPATH/classes/Controller/Folder.php [ 55 ] in /var/www/application/classes/Controller/Folder.php:55
2014-05-06 07:48:57 --- DEBUG: #0 /var/www/application/classes/Controller/Folder.php(55): Kohana_Core::error_handler(8, 'Array to string...', '/var/www/applic...', 55, Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/Folder.php:55
2014-05-06 08:10:38 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 55 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-06 08:10:38 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-06 08:20:02 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'public' (T_PUBLIC) ~ APPPATH/classes/Controller/Folder.php [ 79 ] in file:line
2014-05-06 08:20:02 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-06 08:57:09 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 36 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-06 08:57:09 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-06 08:57:21 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 36 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-06 08:57:21 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-06 08:57:29 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 36 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-06 08:57:29 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-06 08:57:30 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 36 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-06 08:57:30 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-06 09:01:11 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 38 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-06 09:01:11 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-06 09:11:51 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 36 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-06 09:11:51 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-06 09:13:11 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 36 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-06 09:13:11 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-06 09:13:27 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 36 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-06 09:13:27 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-06 09:32:52 --- EMERGENCY: HTTP_Exception_400 [ 400 ]: MISSING_REQUEST_CONTENT_TYPE ~ SYSPATH/classes/Kohana/HTTP/Exception.php [ 17 ] in /var/www/modules/restful/classes/RESTful/Controller.php:96
2014-05-06 09:32:52 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(96): Kohana_HTTP_Exception::factory(400, 'MISSING_REQUEST...')
#1 /var/www/application/classes/Controller/JSON.php(13): RESTful_Controller->before()
#2 /var/www/application/classes/Controller/REST.php(41): Controller_JSON->before()
#3 /var/www/modules/restful/classes/RESTful/Controller.php(49): Controller_REST->before()
#4 [internal function]: RESTful_Controller->execute()
#5 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#6 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/index.php(118): Kohana_Request->execute()
#9 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:96
2014-05-06 09:33:01 --- EMERGENCY: HTTP_Exception_400 [ 400 ]: MISSING_REQUEST_CONTENT_TYPE ~ SYSPATH/classes/Kohana/HTTP/Exception.php [ 17 ] in /var/www/modules/restful/classes/RESTful/Controller.php:96
2014-05-06 09:33:01 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(96): Kohana_HTTP_Exception::factory(400, 'MISSING_REQUEST...')
#1 /var/www/application/classes/Controller/JSON.php(13): RESTful_Controller->before()
#2 /var/www/application/classes/Controller/REST.php(41): Controller_JSON->before()
#3 /var/www/modules/restful/classes/RESTful/Controller.php(49): Controller_REST->before()
#4 [internal function]: RESTful_Controller->execute()
#5 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#6 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/index.php(118): Kohana_Request->execute()
#9 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:96
2014-05-06 09:33:03 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: name ~ APPPATH/classes/Controller/Folder.php [ 95 ] in /var/www/application/classes/Controller/Folder.php:95
2014-05-06 09:33:03 --- DEBUG: #0 /var/www/application/classes/Controller/Folder.php(95): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/applic...', 95, Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_create()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/Folder.php:95
2014-05-06 09:33:13 --- EMERGENCY: ErrorException [ 2 ]: MongoCollection::insert() expects at least 1 parameter, 0 given ~ APPPATH/classes/Controller/Folder.php [ 109 ] in file:line
2014-05-06 09:33:13 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'MongoCollection...', '/var/www/applic...', 109, Array)
#1 /var/www/application/classes/Controller/Folder.php(109): MongoCollection->insert()
#2 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_create()
#3 [internal function]: RESTful_Controller->execute()
#4 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#5 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2014-05-06 09:36:14 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 1 ~ APPPATH/classes/Controller/Folder.php [ 106 ] in /var/www/application/classes/Controller/Folder.php:106
2014-05-06 09:36:14 --- DEBUG: #0 /var/www/application/classes/Controller/Folder.php(106): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/applic...', 106, Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_create()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/Folder.php:106
2014-05-06 09:36:35 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 1 ~ APPPATH/classes/Controller/Folder.php [ 106 ] in /var/www/application/classes/Controller/Folder.php:106
2014-05-06 09:36:35 --- DEBUG: #0 /var/www/application/classes/Controller/Folder.php(106): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/applic...', 106, Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_create()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/Folder.php:106
2014-05-06 09:36:42 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 1 ~ APPPATH/classes/Controller/Folder.php [ 106 ] in /var/www/application/classes/Controller/Folder.php:106
2014-05-06 09:36:42 --- DEBUG: #0 /var/www/application/classes/Controller/Folder.php(106): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/applic...', 106, Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_create()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/Folder.php:106
2014-05-06 09:36:51 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 1 ~ APPPATH/classes/Controller/Folder.php [ 106 ] in /var/www/application/classes/Controller/Folder.php:106
2014-05-06 09:36:51 --- DEBUG: #0 /var/www/application/classes/Controller/Folder.php(106): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/applic...', 106, Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_create()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/Folder.php:106
2014-05-06 09:37:09 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 1 ~ APPPATH/classes/Controller/Folder.php [ 107 ] in /var/www/application/classes/Controller/Folder.php:107
2014-05-06 09:37:09 --- DEBUG: #0 /var/www/application/classes/Controller/Folder.php(107): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/applic...', 107, Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_create()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/Folder.php:107
2014-05-06 09:39:26 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: name ~ APPPATH/classes/Controller/Folder.php [ 96 ] in /var/www/application/classes/Controller/Folder.php:96
2014-05-06 09:39:26 --- DEBUG: #0 /var/www/application/classes/Controller/Folder.php(96): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/applic...', 96, Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_create()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/Folder.php:96
2014-05-06 09:52:07 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method MongoCollection::delete() ~ APPPATH/classes/Controller/Folder.php [ 158 ] in file:line
2014-05-06 09:52:07 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line