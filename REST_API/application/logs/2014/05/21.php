<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-05-21 08:26:56 --- EMERGENCY: ErrorException [ 8 ]: Undefined offset: 1 ~ APPPATH/classes/Controller/Folder.php [ 24 ] in /var/www/application/classes/Controller/Folder.php:24
2014-05-21 08:26:56 --- DEBUG: #0 /var/www/application/classes/Controller/Folder.php(24): Kohana_Core::error_handler(8, 'Undefined offse...', '/var/www/applic...', 24, Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/Folder.php:24
2014-05-21 08:46:36 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: matches ~ APPPATH/classes/Controller/Folder.php [ 114 ] in /var/www/application/classes/Controller/Folder.php:114
2014-05-21 08:46:36 --- DEBUG: #0 /var/www/application/classes/Controller/Folder.php(114): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/applic...', 114, Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_create()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/Folder.php:114
2014-05-21 08:55:31 --- EMERGENCY: HTTP_Exception_404 [ 404 ]: The requested URL folde was not found on this server. ~ SYSPATH/classes/Kohana/HTTP/Exception.php [ 17 ] in /var/www/system/classes/Kohana/Request/Client/Internal.php:79
2014-05-21 08:55:31 --- DEBUG: #0 /var/www/system/classes/Kohana/Request/Client/Internal.php(79): Kohana_HTTP_Exception::factory(404, 'The requested U...', Array)
#1 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#2 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#3 /var/www/index.php(118): Kohana_Request->execute()
#4 {main} in /var/www/system/classes/Kohana/Request/Client/Internal.php:79
2014-05-21 09:38:28 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 35 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-21 09:38:28 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-21 09:38:37 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 35 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-21 09:38:37 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-21 09:38:43 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 35 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-21 09:38:43 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-21 09:38:51 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 35 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-21 09:38:51 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-21 09:40:04 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 35 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-21 09:40:04 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-21 09:41:02 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 35 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-21 09:41:02 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-21 09:41:17 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 35 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-21 09:41:17 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-21 09:41:37 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 35 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-21 09:41:37 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-21 09:41:43 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 35 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2014-05-21 09:41:43 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64