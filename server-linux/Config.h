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
#define PATH_TO_BLOCK "/home/vfs/CloudsRIS/server-linux/blockWareHouse/"



/**
 * PORTS for listen 
**/
//@doto: вроде не испоьзуется
#define PORT_LISTEN 45788
//@doto: вроде не испоьзуется
#define PORT_LISTEN_UDP 45796
#define PORT_BROATCAST 45782


/**
 * Максимальное количество ошибок при поиске
 * порта дял UDP
 */
#define MAX_CONNECTION_ERROR_PORT 100

/**
 * Время ожидание ответов по udp от серверов
 * в сек
 */
#define WAITING_RESPONSE_TIME_UDP 3


//   Network
#define BUFFER_SIZE 8192
#define TCP_PORT_SERVER 6454
#define SELF_IP "127.0.0.1"
#define HEADER_TCP_LENGTH 136
#define ERROR_TCP_SOCKET 11
#define TCP_SOCKET_OK 1
