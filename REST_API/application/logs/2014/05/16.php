<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-05-16 08:35:45 --- EMERGENCY: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/Kohana/HTTP/Exception.php [ 17 ] in /var/www/system/classes/Kohana/Request.php:975
2014-05-16 08:35:45 --- DEBUG: #0 /var/www/system/classes/Kohana/Request.php(975): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 /var/www/index.php(118): Kohana_Request->execute()
#2 {main} in /var/www/system/classes/Kohana/Request.php:975