#include <string>
using namespace std;

namespace Database {
	namespace Tables {
		//reflaction on table Server_files in mysql
		class ServerFiles{
			private:
				Statement *stmt;	
			public:
				
				ServerFiles (Statement *);
				ResultSet * query(string);
				ResultSet * getElemById(unsigned int);
				ResultSet * select(string filds, string condition);
				~ServerFiles ();
		};	
	}
}
