#include "../SingletoneConn.h"

namespace Database {
	namespace Tables {
		ServerFiles::ServerFiles (Statement* stm) 
		{
			stmt = stm;
		}
		ResultSet * ServerFiles::query(string q)
		{
			return stmt -> executeQuery (q);
		}

		ResultSet * ServerFiles::getElemById(unsigned int id)
		{
			return stmt -> executeQuery ("SELECT * FROM `server_files` WHERE `id`= " + ida);
		}

		ResultSet * ServerFiles::select(string filds, string condition)
		{
			return stmt -> executeQuery ("SELECT "+ filds
				 +" FROM `server_files` " + condition);
		}
		ServerFiles::~ServerFiles (){}
	}
}
