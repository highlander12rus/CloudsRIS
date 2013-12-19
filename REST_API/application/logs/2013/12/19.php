<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-12-19 00:58:49 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 23 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2013-12-19 00:58:49 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2013-12-19 00:59:01 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 23 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2013-12-19 00:59:01 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2013-12-19 01:06:44 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 21 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2013-12-19 01:06:44 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2013-12-19 01:09:38 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined function str_replce() ~ APPPATH/classes/Controller/Folder.php [ 38 ] in file:line
2013-12-19 01:09:38 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-19 03:24:32 --- EMERGENCY: HTTP_Exception_404 [ 404 ]: The requested URL jmx-console/HtmlAdaptor was not found on this server. ~ SYSPATH/classes/Kohana/HTTP/Exception.php [ 17 ] in /var/www/system/classes/Kohana/Request/Client/Internal.php:79
2013-12-19 03:24:32 --- DEBUG: #0 /var/www/system/classes/Kohana/Request/Client/Internal.php(79): Kohana_HTTP_Exception::factory(404, 'The requested U...', Array)
#1 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#2 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#3 /var/www/index.php(118): Kohana_Request->execute()
#4 {main} in /var/www/system/classes/Kohana/Request/Client/Internal.php:79
2013-12-19 03:24:34 --- EMERGENCY: HTTP_Exception_404 [ 404 ]: The requested URL manager/html/upload was not found on this server. ~ SYSPATH/classes/Kohana/HTTP/Exception.php [ 17 ] in /var/www/system/classes/Kohana/Request/Client/Internal.php:79
2013-12-19 03:24:34 --- DEBUG: #0 /var/www/system/classes/Kohana/Request/Client/Internal.php(79): Kohana_HTTP_Exception::factory(404, 'The requested U...', Array)
#1 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#2 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#3 /var/www/index.php(118): Kohana_Request->execute()
#4 {main} in /var/www/system/classes/Kohana/Request/Client/Internal.php:79
2013-12-19 03:24:36 --- EMERGENCY: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: zecmd/zecmd.jsp ~ SYSPATH/classes/Kohana/HTTP/Exception.php [ 17 ] in /var/www/system/classes/Kohana/Request.php:975
2013-12-19 03:24:36 --- DEBUG: #0 /var/www/system/classes/Kohana/Request.php(975): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 /var/www/index.php(118): Kohana_Request->execute()
#2 {main} in /var/www/system/classes/Kohana/Request.php:975
2013-12-19 03:24:38 --- EMERGENCY: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: CluJaNuL/cmd.jsp ~ SYSPATH/classes/Kohana/HTTP/Exception.php [ 17 ] in /var/www/system/classes/Kohana/Request.php:975
2013-12-19 03:24:38 --- DEBUG: #0 /var/www/system/classes/Kohana/Request.php(975): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 /var/www/index.php(118): Kohana_Request->execute()
#2 {main} in /var/www/system/classes/Kohana/Request.php:975
2013-12-19 03:24:40 --- EMERGENCY: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: wstats/wstats.jsp ~ SYSPATH/classes/Kohana/HTTP/Exception.php [ 17 ] in /var/www/system/classes/Kohana/Request.php:975
2013-12-19 03:24:40 --- DEBUG: #0 /var/www/system/classes/Kohana/Request.php(975): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 /var/www/index.php(118): Kohana_Request->execute()
#2 {main} in /var/www/system/classes/Kohana/Request.php:975
2013-12-19 03:24:41 --- EMERGENCY: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: idssvc/idssvc.jsp ~ SYSPATH/classes/Kohana/HTTP/Exception.php [ 17 ] in /var/www/system/classes/Kohana/Request.php:975
2013-12-19 03:24:41 --- DEBUG: #0 /var/www/system/classes/Kohana/Request.php(975): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 /var/www/index.php(118): Kohana_Request->execute()
#2 {main} in /var/www/system/classes/Kohana/Request.php:975
2013-12-19 03:24:44 --- EMERGENCY: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: iesvc/iesvc.jsp ~ SYSPATH/classes/Kohana/HTTP/Exception.php [ 17 ] in /var/www/system/classes/Kohana/Request.php:975
2013-12-19 03:24:44 --- DEBUG: #0 /var/www/system/classes/Kohana/Request.php(975): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 /var/www/index.php(118): Kohana_Request->execute()
#2 {main} in /var/www/system/classes/Kohana/Request.php:975
2013-12-19 03:24:46 --- EMERGENCY: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: bynazi/cmd.jsp ~ SYSPATH/classes/Kohana/HTTP/Exception.php [ 17 ] in /var/www/system/classes/Kohana/Request.php:975
2013-12-19 03:24:46 --- DEBUG: #0 /var/www/system/classes/Kohana/Request.php(975): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 /var/www/index.php(118): Kohana_Request->execute()
#2 {main} in /var/www/system/classes/Kohana/Request.php:975
2013-12-19 05:53:15 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 21 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2013-12-19 05:53:15 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2013-12-19 06:09:47 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 21 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2013-12-19 06:09:47 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2013-12-19 06:14:48 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 21 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2013-12-19 06:14:48 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2013-12-19 06:15:56 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 21 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2013-12-19 06:15:56 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2013-12-19 06:22:06 --- EMERGENCY: ErrorException [ 8 ]: Uninitialized string offset: -1 ~ APPPATH/classes/Controller/Folder.php [ 15 ] in /var/www/application/classes/Controller/Folder.php:15
2013-12-19 06:22:06 --- DEBUG: #0 /var/www/application/classes/Controller/Folder.php(15): Kohana_Core::error_handler(8, 'Uninitialized s...', '/var/www/applic...', 15, Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/Folder.php:15
2013-12-19 06:26:03 --- EMERGENCY: ErrorException [ 8 ]: Uninitialized string offset: -1 ~ APPPATH/classes/Controller/Folder.php [ 15 ] in /var/www/application/classes/Controller/Folder.php:15
2013-12-19 06:26:03 --- DEBUG: #0 /var/www/application/classes/Controller/Folder.php(15): Kohana_Core::error_handler(8, 'Uninitialized s...', '/var/www/applic...', 15, Array)
#1 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_get()
#2 [internal function]: RESTful_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/Folder.php:15
2013-12-19 06:33:05 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 94 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2013-12-19 06:33:05 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_delete()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2013-12-19 06:33:09 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 94 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2013-12-19 06:33:09 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_delete()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2013-12-19 06:35:14 --- EMERGENCY: HTTP_Exception_404 [ 404 ]:  ~ APPPATH/classes/Controller/Folder.php [ 94 ] in /var/www/modules/restful/classes/RESTful/Controller.php:64
2013-12-19 06:35:14 --- DEBUG: #0 /var/www/modules/restful/classes/RESTful/Controller.php(64): Controller_Folder->action_delete()
#1 [internal function]: RESTful_Controller->execute()
#2 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Folder))
#3 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/modules/restful/classes/RESTful/Controller.php:64
2013-12-19 08:39:49 --- EMERGENCY: HTTP_Exception_404 [ 404 ]: The requested URL HNAP1 was not found on this server. ~ SYSPATH/classes/Kohana/HTTP/Exception.php [ 17 ] in /var/www/system/classes/Kohana/Request/Client/Internal.php:79
2013-12-19 08:39:49 --- DEBUG: #0 /var/www/system/classes/Kohana/Request/Client/Internal.php(79): Kohana_HTTP_Exception::factory(404, 'The requested U...', Array)
#1 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#2 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#3 /var/www/index.php(118): Kohana_Request->execute()
#4 {main} in /var/www/system/classes/Kohana/Request/Client/Internal.php:79