<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-06-02 12:40:58 --- EMERGENCY: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/Kohana/HTTP/Exception.php [ 17 ] in /var/www/system/classes/Kohana/Request.php:975
2014-06-02 12:40:58 --- DEBUG: #0 /var/www/system/classes/Kohana/Request.php(975): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 /var/www/index.php(118): Kohana_Request->execute()
#2 {main} in /var/www/system/classes/Kohana/Request.php:975
2014-06-02 12:41:22 --- EMERGENCY: ErrorException [ 1 ]: Class 'ORM' not found ~ APPPATH/classes/Controller/Cabinet.php [ 66 ] in file:line
2014-06-02 12:41:22 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-02 13:27:27 --- EMERGENCY: MongoConnectionException [ 71 ]: Failed to connect to: 192.168.199.129:27017: Connection refused ~ APPPATH/classes/Auth/Site.php [ 23 ] in /var/www/application/classes/Auth/Site.php:23
2014-06-02 13:27:27 --- DEBUG: #0 /var/www/application/classes/Auth/Site.php(23): MongoCollection->findOne(Array)
#1 /var/www/application/classes/Controller/Cabinet.php(29): Auth_Site->login('ilia12r@gmail.c...', '123456')
#2 /var/www/system/classes/Kohana/Controller.php(84): Controller_Cabinet->action_autorization()
#3 [internal function]: Kohana_Controller->execute()
#4 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Cabinet))
#5 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/index.php(118): Kohana_Request->execute()
#8 {main} in /var/www/application/classes/Auth/Site.php:23
2014-06-02 13:28:50 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: email ~ APPPATH/classes/Controller/Cabinet.php [ 26 ] in /var/www/application/classes/Controller/Cabinet.php:26
2014-06-02 13:28:50 --- DEBUG: #0 /var/www/application/classes/Controller/Cabinet.php(26): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/applic...', 26, Array)
#1 /var/www/system/classes/Kohana/Controller.php(84): Controller_Cabinet->action_autorization()
#2 [internal function]: Kohana_Controller->execute()
#3 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Cabinet))
#4 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/application/classes/Controller/Cabinet.php:26
2014-06-02 13:30:06 --- EMERGENCY: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/Kohana/HTTP/Exception.php [ 17 ] in /var/www/system/classes/Kohana/Request.php:975
2014-06-02 13:30:06 --- DEBUG: #0 /var/www/system/classes/Kohana/Request.php(975): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 /var/www/index.php(118): Kohana_Request->execute()
#2 {main} in /var/www/system/classes/Kohana/Request.php:975
2014-06-02 13:32:45 --- EMERGENCY: MongoConnectionException [ 71 ]: Failed to connect to: 192.168.199.129:0: Connection refused ~ APPPATH/classes/Auth/Site.php [ 70 ] in /var/www/application/classes/Auth/Site.php:70
2014-06-02 13:32:45 --- DEBUG: #0 /var/www/application/classes/Auth/Site.php(70): MongoCollection->findOne(Array)
#1 /var/www/application/classes/Controller/Cabinet.php(14): Auth_Site->logged_in()
#2 /var/www/system/classes/Kohana/Controller.php(84): Controller_Cabinet->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Cabinet))
#5 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/application/classes/Controller/Site.php(8): Kohana_Request->execute()
#8 /var/www/system/classes/Kohana/Controller.php(84): Controller_Site->action_index()
#9 [internal function]: Kohana_Controller->execute()
#10 /var/www/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Site))
#11 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#13 /var/www/index.php(118): Kohana_Request->execute()
#14 {main} in /var/www/application/classes/Auth/Site.php:70
2014-06-02 13:43:08 --- EMERGENCY: HTTP_Exception_404 [ 404 ]: The requested URL main was not found on this server. ~ SYSPATH/classes/Kohana/HTTP/Exception.php [ 17 ] in /var/www/system/classes/Kohana/Request/Client/Internal.php:79
2014-06-02 13:43:08 --- DEBUG: #0 /var/www/system/classes/Kohana/Request/Client/Internal.php(79): Kohana_HTTP_Exception::factory(404, 'The requested U...', Array)
#1 /var/www/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#2 /var/www/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#3 /var/www/index.php(118): Kohana_Request->execute()
#4 {main} in /var/www/system/classes/Kohana/Request/Client/Internal.php:79
2014-06-02 13:56:18 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '{' ~ APPPATH/classes/Controller/Cabinet.php [ 29 ] in file:line
2014-06-02 13:56:18 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-06-02 13:56:34 --- EMERGENCY: ErrorException [ 1 ]: Undefined class constant 'LIFETIME_TOKEN' ~ APPPATH/classes/Auth/Site.php [ 27 ] in file:line
2014-06-02 13:56:34 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line