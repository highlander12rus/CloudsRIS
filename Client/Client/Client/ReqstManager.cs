using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace Client
{
    class ReqstManager
    {

        private static string BASE_URL = "http://192.168.199.129/";

        private static string AUTH = BASE_URL + "auth";
        private static string FOLDER = BASE_URL + "folder";
        private static string FILE = BASE_URL + "file";

        public static string Folder {
            get { return FOLDER;  }

        }

        public static string  Auth {
            get { return AUTH;  }
        }

        public static string File {
            get { return FILE;  }
        }



    }
}
