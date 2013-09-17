// CloudsRIS.cpp: определяет точку входа для консольного приложения.
//

#include "stdafx.h"





/* Standard C++ headers */
#include <iostream>
#include <sstream>
#include <memory>
#include <string>
#include <stdexcept>

/* MySQL Connector/C++ specific headers */
#include <mysql_driver.h>
#include <mysql_connection.h>

using namespace std;
	
#define DBHOST "tcp://127.0.0.1:3306"
#define USER "root"
#define PASSWORD "admin"
#define DATABASE "test"

#define NUMOFFSET 100
#define COLNAME 200

using namespace std;
using namespace sql;



int _tmain(int argc, _TCHAR* argv[]) {

	Driver *driver;
	Connection *con;
	Statement *stmt;

	PreparedStatement *prep_stmt;
	Savepoint *savept;

	int updatecount = 0;

	

	return EXIT_SUCCESS;
} // main()

