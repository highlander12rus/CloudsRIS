<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-05-14 10:22:05 --- EMERGENCY: MongoConnectionException [ 71 ]: Failed to connect to: localhost:27017: Connection refused ~ APPPATH/classes/Auth/REST.php [ 23 ] in /var/www/application/classes/Auth/REST.php:23
2014-05-14 10:22:05 --- DEBUG: #0 /var/www/application/classes/Auth/REST.php(23): MongoCollection->findOne(Array)
#1 /var/www/application/classes/Controller/Auth.php(29): Auth_REST->login('ilia12r@gmail.c...', 'ba3253876aed6bc...')
#2 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Auth->action_get()
#3 [internal function]: RESTful_Controller->execute()
#4 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#5 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/index.php(118): Kohana_Request->execute()
#8 {main} in /var/www/application/classes/Auth/REST.php:23
2014-05-14 10:22:14 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 1 ~ APPPATH/classes/Controller/REST.php [ 29 ] in /var/www/application/classes/Controller/REST.php:29
2014-05-14 10:22:14 --- DEBUG: #0 /var/www/application/classes/Controller/REST.php(29): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/applic...', 29, Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(49): Controller_REST->before()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/REST.php:29
2014-05-14 10:34:21 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 1 ~ APPPATH/classes/Controller/Folder.php [ 24 ] in /var/www/application/classes/Controller/Folder.php:24
2014-05-14 10:34:21 --- DEBUG: #0 /var/www/application/classes/Controller/Folder.php(24): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/applic...', 24, Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/Folder.php:24
2014-05-14 10:34:29 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 1 ~ APPPATH/classes/Controller/Folder.php [ 24 ] in /var/www/application/classes/Controller/Folder.php:24
2014-05-14 10:34:29 --- DEBUG: #0 /var/www/application/classes/Controller/Folder.php(24): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/applic...', 24, Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/Folder.php:24
2014-05-14 10:45:42 --- EMERGENCY: HTTP_Exception_404 [ 404 ]: The requested URL " was not found on this server. ~ SYSPATH/classes/Kohana/HTTP/Exception.php [ 17 ] in /var/www/system/classes/Kohana/Request/Client/Internal.php:79
2014-05-14 10:45:42 --- DEBUG: #0 /var/www/system/classes/Kohana/Request/Client/Internal.php(79): Kohana_HTTP_Exception::factory(404, 'The requested U...', Array)
#1 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#2 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#3 /var/www/index.php(118): Kohana_Request->execute()
#4 {main} in /var/www/system/classes/Kohana/Request/Client/Internal.php:79
2014-05-14 10:45:42 --- EMERGENCY: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/Kohana/HTTP/Exception.php [ 17 ] in /var/www/system/classes/Kohana/Request.php:975
2014-05-14 10:45:42 --- DEBUG: #0 /var/www/system/classes/Kohana/Request.php(975): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 /var/www/index.php(118): Kohana_Request->execute()
#2 {main} in /var/www/system/classes/Kohana/Request.php:975
2014-05-14 11:12:26 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 1 ~ APPPATH/classes/Controller/Folder.php [ 24 ] in /var/www/application/classes/Controller/Folder.php:24
2014-05-14 11:12:26 --- DEBUG: #0 /var/www/application/classes/Controller/Folder.php(24): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/applic...', 24, Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/Folder.php:24
2014-05-14 11:12:54 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 1 ~ APPPATH/classes/Controller/Folder.php [ 24 ] in /var/www/application/classes/Controller/Folder.php:24
2014-05-14 11:12:54 --- DEBUG: #0 /var/www/application/classes/Controller/Folder.php(24): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/applic...', 24, Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/Folder.php:24
2014-05-14 12:06:06 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 1 ~ APPPATH/classes/Controller/Folder.php [ 24 ] in /var/www/application/classes/Controller/Folder.php:24
2014-05-14 12:06:06 --- DEBUG: #0 /var/www/application/classes/Controller/Folder.php(24): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/applic...', 24, Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/Folder.php:24
2014-05-14 12:06:50 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 1 ~ APPPATH/classes/Controller/Folder.php [ 24 ] in /var/www/application/classes/Controller/Folder.php:24
2014-05-14 12:06:50 --- DEBUG: #0 /var/www/application/classes/Controller/Folder.php(24): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/applic...', 24, Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/Folder.php:24
2014-05-14 12:07:31 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 1 ~ APPPATH/classes/Controller/Folder.php [ 24 ] in /var/www/application/classes/Controller/Folder.php:24
2014-05-14 12:07:31 --- DEBUG: #0 /var/www/application/classes/Controller/Folder.php(24): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/applic...', 24, Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/Folder.php:24
2014-05-14 12:21:35 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 1 ~ APPPATH/classes/Controller/Folder.php [ 24 ] in /var/www/application/classes/Controller/Folder.php:24
2014-05-14 12:21:35 --- DEBUG: #0 /var/www/application/classes/Controller/Folder.php(24): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/applic...', 24, Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/Folder.php:24
2014-05-14 12:21:48 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 36 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-14 12:21:48 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-14 12:24:46 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 36 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-14 12:24:46 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-14 12:31:59 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 1 ~ APPPATH/classes/Controller/Folder.php [ 24 ] in /var/www/application/classes/Controller/Folder.php:24
2014-05-14 12:31:59 --- DEBUG: #0 /var/www/application/classes/Controller/Folder.php(24): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/applic...', 24, Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/Folder.php:24
2014-05-14 12:44:17 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'if' (T_IF), expecting ',' or ';' ~ APPPATH/classes/Controller/Folder.php [ 37 ] in file:line
2014-05-14 12:44:17 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-14 12:56:39 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 36 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-14 12:56:39 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-14 12:57:19 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 36 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-14 12:57:19 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64