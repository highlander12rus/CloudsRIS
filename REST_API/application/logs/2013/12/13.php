<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-12-13 09:51:04 --- CRITICAL: ErrorException [ 8 ]: Undefined offset: 1 ~ APPPATH\classes\Controller\REST.php [ 29 ] in Z:\home\cloudsris.ru\www\application\classes\Controller\REST.php:29
2013-12-13 09:51:04 --- DEBUG: #0 Z:\home\cloudsris.ru\www\application\classes\Controller\REST.php(29): Kohana_Core::error_handler(8, 'Undefined offse...', 'Z:\home\cloudsr...', 29, Array)
#1 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(49): Controller_REST->before()
#2 [internal function]: RESTful_Controller->execute()
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#7 {main} in Z:\home\cloudsris.ru\www\application\classes\Controller\REST.php:29
2013-12-13 09:51:24 --- CRITICAL: HTTP_Exception_404 [ 404 ]:  ~ APPPATH\classes\Controller\File.php [ 29 ] in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 09:51:24 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#6 {main} in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 09:52:01 --- CRITICAL: HTTP_Exception_404 [ 404 ]:  ~ APPPATH\classes\Controller\File.php [ 29 ] in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 09:52:01 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#6 {main} in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 09:52:23 --- CRITICAL: HTTP_Exception_404 [ 404 ]:  ~ APPPATH\classes\Controller\File.php [ 29 ] in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 09:52:23 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#6 {main} in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 09:52:36 --- CRITICAL: HTTP_Exception_404 [ 404 ]:  ~ APPPATH\classes\Controller\File.php [ 29 ] in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 09:52:36 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#6 {main} in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 09:52:51 --- CRITICAL: HTTP_Exception_404 [ 404 ]:  ~ APPPATH\classes\Controller\File.php [ 29 ] in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 09:52:51 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#6 {main} in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 09:54:42 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected T_IF, expecting ',' or ';' ~ APPPATH\classes\Controller\File.php [ 27 ] in file:line
2013-12-13 09:54:42 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-13 09:55:02 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected T_IF, expecting ',' or ';' ~ APPPATH\classes\Controller\File.php [ 28 ] in file:line
2013-12-13 09:55:02 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-13 09:55:16 --- CRITICAL: HTTP_Exception_404 [ 404 ]:  ~ APPPATH\classes\Controller\File.php [ 36 ] in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 09:55:16 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#6 {main} in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 09:55:57 --- CRITICAL: HTTP_Exception_404 [ 404 ]:  ~ APPPATH\classes\Controller\File.php [ 36 ] in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 09:55:57 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#6 {main} in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 09:56:24 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')' ~ APPPATH\classes\Controller\File.php [ 27 ] in file:line
2013-12-13 09:56:24 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-13 09:56:40 --- CRITICAL: HTTP_Exception_404 [ 404 ]:  ~ APPPATH\classes\Controller\File.php [ 37 ] in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 09:56:40 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#6 {main} in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 09:57:43 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected T_OBJECT_OPERATOR ~ APPPATH\classes\Controller\File.php [ 26 ] in file:line
2013-12-13 09:57:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-13 09:58:01 --- CRITICAL: HTTP_Exception_404 [ 404 ]:  ~ APPPATH\classes\Controller\File.php [ 37 ] in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 09:58:01 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#6 {main} in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 10:01:29 --- CRITICAL: HTTP_Exception_404 [ 404 ]:  ~ APPPATH\classes\Controller\File.php [ 32 ] in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 10:01:29 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#6 {main} in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 10:01:52 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected T_OBJECT_OPERATOR, expecting ',' or ';' ~ APPPATH\classes\Controller\File.php [ 22 ] in file:line
2013-12-13 10:01:52 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-13 10:02:09 --- CRITICAL: HTTP_Exception_404 [ 404 ]:  ~ APPPATH\classes\Controller\File.php [ 32 ] in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 10:02:09 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#6 {main} in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 10:02:33 --- CRITICAL: HTTP_Exception_404 [ 404 ]:  ~ APPPATH\classes\Controller\File.php [ 32 ] in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 10:02:33 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#6 {main} in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 10:02:43 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected T_VARIABLE, expecting T_FUNCTION ~ APPPATH\classes\Controller\File.php [ 35 ] in file:line
2013-12-13 10:02:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-13 10:03:01 --- CRITICAL: HTTP_Exception_404 [ 404 ]:  ~ APPPATH\classes\Controller\File.php [ 33 ] in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 10:03:01 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#6 {main} in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 10:03:53 --- CRITICAL: HTTP_Exception_404 [ 404 ]:  ~ APPPATH\classes\Controller\File.php [ 35 ] in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 10:03:53 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#6 {main} in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 10:04:46 --- CRITICAL: HTTP_Exception_404 [ 404 ]:  ~ APPPATH\classes\Controller\File.php [ 35 ] in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 10:04:46 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#6 {main} in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 10:05:00 --- CRITICAL: HTTP_Exception_404 [ 404 ]:  ~ APPPATH\classes\Controller\File.php [ 34 ] in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 10:05:00 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#6 {main} in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 10:05:40 --- CRITICAL: HTTP_Exception_404 [ 404 ]:  ~ APPPATH\classes\Controller\File.php [ 34 ] in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 10:05:40 --- DEBUG: #0 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_get()
#1 [internal function]: RESTful_Controller->execute()
#2 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#6 {main} in Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php:64
2013-12-13 10:06:23 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: options ~ APPPATH\classes\Controller\File.php [ 40 ] in Z:\home\cloudsris.ru\www\application\classes\Controller\File.php:40
2013-12-13 10:06:23 --- DEBUG: #0 Z:\home\cloudsris.ru\www\application\classes\Controller\File.php(40): Kohana_Core::error_handler(8, 'Undefined varia...', 'Z:\home\cloudsr...', 40, Array)
#1 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_get()
#2 [internal function]: RESTful_Controller->execute()
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#7 {main} in Z:\home\cloudsris.ru\www\application\classes\Controller\File.php:40
2013-12-13 10:06:42 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: options ~ APPPATH\classes\Controller\File.php [ 39 ] in Z:\home\cloudsris.ru\www\application\classes\Controller\File.php:39
2013-12-13 10:06:42 --- DEBUG: #0 Z:\home\cloudsris.ru\www\application\classes\Controller\File.php(39): Kohana_Core::error_handler(8, 'Undefined varia...', 'Z:\home\cloudsr...', 39, Array)
#1 Z:\home\cloudsris.ru\www\modules\restful\classes\RESTful\Controller.php(64): Controller_File->action_get()
#2 [internal function]: RESTful_Controller->execute()
#3 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#4 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 Z:\home\cloudsris.ru\www\system\classes\Kohana\Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 Z:\home\cloudsris.ru\www\index.php(118): Kohana_Request->execute()
#7 {main} in Z:\home\cloudsris.ru\www\application\classes\Controller\File.php:39