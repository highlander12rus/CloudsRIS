<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-12-17 02:52:12 --- EMERGENCY: HTTP_Exception_412 [ 412 ]:  ~ APPPATH/classes/Controller/Auth.php [ 20 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2013-12-17 02:52:12 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Auth->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Auth))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2013-12-17 03:07:54 --- EMERGENCY: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/Kohana/HTTP/Exception.php [ 17 ] in /var/www/system/classes/Kohana/Request.php:975
2013-12-17 03:07:54 --- DEBUG: #0 /var/www/system/classes/Kohana/Request.php(975): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 /var/www/index.php(118): Kohana_Request->execute()
#2 {main} in /var/www/system/classes/Kohana/Request.php:975
2013-12-17 05:16:23 --- EMERGENCY: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/Kohana/HTTP/Exception.php [ 17 ] in /var/www/system/classes/Kohana/Request.php:975
2013-12-17 05:16:23 --- DEBUG: #0 /var/www/system/classes/Kohana/Request.php(975): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 /var/www/index.php(118): Kohana_Request->execute()
#2 {main} in /var/www/system/classes/Kohana/Request.php:975
2013-12-17 05:27:16 --- EMERGENCY: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/Kohana/HTTP/Exception.php [ 17 ] in /var/www/system/classes/Kohana/Request.php:975
2013-12-17 05:27:16 --- DEBUG: #0 /var/www/system/classes/Kohana/Request.php(975): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 /var/www/index.php(118): Kohana_Request->execute()
#2 {main} in /var/www/system/classes/Kohana/Request.php:975
2013-12-17 09:44:46 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 21 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2013-12-17 09:44:46 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2013-12-17 09:55:04 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 21 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2013-12-17 09:55:04 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64