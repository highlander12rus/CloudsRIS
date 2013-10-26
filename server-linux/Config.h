#pragma once
/*   		 DataBase Define	  	    */
#define DBHOST "tcp://127.0.0.1:3306"
#define USER "root"
#define PASSWORD "root"
#define DATABASE "cloudsris"


/*
			FILE SYSTEM CONFIG
*/
#define BLOCK_SIZE 536870912
#define PATH_TO_BLOCK "blockWareHouse/"


//Threads pool
#define THREADS_POOL_MAX 5

/**
 * PORTS for listen 
**/
#define PORT_LISTEN 45788
#define PORT_BROATCAST 45782


//   Network
#define BUFFER_SIZE 8096
#define TCP_PORT_SERVER 6454
#define SELF_IP "127.0.0.1"