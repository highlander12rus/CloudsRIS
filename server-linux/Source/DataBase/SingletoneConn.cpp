#include "SingletoneConn.h"
namespace Database{
	const SingletoneConn& SingletoneConn::Instance()
		{
		        static SingletoneConn theSingleInstance;





		        return theSingleInstance;
		}  

	Statement* SingletoneConn::getStatementObj(void) {
		return	stmt;
	}
      
	SingletoneConn::SingletoneConn(){
		driver = get_driver_instance();

		// create a database connection using the Driver
		con = driver -> connect(DBHOST, USER, PASSWORD);
		// turn off the autocommit
		con -> setAutoCommit(0);
		//select appropriate database schema
		con -> setSchema(DATABASE);

		stmt = con -> createStatement();	
	};
	SingletoneConn::SingletoneConn(const SingletoneConn& root){};

}
