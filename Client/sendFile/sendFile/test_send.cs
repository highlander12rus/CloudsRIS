using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Net;
using System.Net.Sockets;
using System.Runtime.InteropServices;
using System.Text;
using System.Threading.Tasks;

namespace sendFile
{

    class Program
    {
        private const int PORT_CONN_TCP = 6454;
        private const string USER_TOKEN = "37907d7dd82659214161ebb39bbd811ebca40b60bab8c7010780d8a4775496537fc82d599ff6584247ab0b9374b195581080eefad364f1e6a49efbac97eabf85";
        private const string DIRICTORYID = "5369e903157c104c65b16fb2";
        private const string SERVER_UPLOAD = "192.168.0.105";
        private const int SIZE_STRUCTURE_UPLOAD = 417;

        public static void CreateFile(string name)
        {
            try
            {

                    FileInfo file = new FileInfo(name);
                    ulong size = (ulong) file.Length;
                    using (BinaryReader br = new BinaryReader(File.Open(name, FileMode.Open)))
                    {
                        sendFileTCP(br.BaseStream, size, file.Name);
                    }
            }
            catch (Exception)
            {
                int i = 1 + 1;

            }

        }

        private static bool sendFileTCP(Stream stream, ulong fileSize, string fileName)
        {
            try
            {
                byte[] buf = new byte[stream.Length + SIZE_STRUCTURE_UPLOAD];
                BitConverter.GetBytes((char)1).CopyTo(buf, 0);


                //копируем токен
                var utf8bytes = Encoding.UTF8.GetBytes(USER_TOKEN);
                var ascii = Encoding.Convert(
                                Encoding.UTF8, Encoding.GetEncoding("ASCII"), utf8bytes);
                ascii.CopyTo(buf, 1);
                //--


                //копируем имя файла
                utf8bytes = Encoding.UTF8.GetBytes(fileName);
                ascii = Encoding.Convert(
                                Encoding.UTF8, Encoding.GetEncoding("ASCII"), utf8bytes);
                ascii.CopyTo(buf, 129);
                //--


                //копируем директори id
                utf8bytes = Encoding.UTF8.GetBytes(DIRICTORYID);
                ascii = Encoding.Convert(
                                Encoding.UTF8, Encoding.GetEncoding("ASCII"), utf8bytes);
                ascii.CopyTo(buf, 384);
                //----------

                BitConverter.GetBytes(fileSize).CopyTo(buf, 408);


                stream.Read(buf, SIZE_STRUCTURE_UPLOAD, (int)stream.Length);
                //byte[] b = new byte[1];
                Socket soc = new Socket(AddressFamily.InterNetwork, SocketType.Stream, ProtocolType.Tcp);
                var ip = IPAddress.Parse(SERVER_UPLOAD);
                IPEndPoint ipep = new IPEndPoint(ip, PORT_CONN_TCP);
                soc.NoDelay = true;
                soc.Connect(ipep);
                soc.Send(buf);
                soc.Shutdown(SocketShutdown.Send);
               // soc.Receive(b);
                soc.Close();
               // if (b[0] == 1)
                 //   return true;
               // return false;
                return true;
            }
            catch (Exception)
            {
                return false;
            }

        }

        static void Main(string[] args)
        {
            CreateFile("");
        }
    }
}
------------------------------------------------
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Net;
using System.Net.Sockets;
using System.Runtime.InteropServices;
using System.Text;
using System.Threading.Tasks;

namespace sendFile
{

    class Program
    {
        private const int PORT_CONN_TCP = 6454;
        private const string USER_TOKEN = "37907d7dd82659214161ebb39bbd811ebca40b60bab8c7010780d8a4775496537fc82d599ff6584247ab0b9374b195581080eefad364f1e6a49efbac97eabf85";
        private const string DIRICTORYID = "5369e903157c104c65b16fb2";
        private const string SERVER_UPLOAD = "192.168.0.105";
        private const int SIZE_STRUCTURE_UPLOAD = 417;

        public static void CreateFile(string name)
        {
            try
            {

                    FileInfo file = new FileInfo(name);
                    ulong size = (ulong) file.Length;
                    using (BinaryReader br = new BinaryReader(File.Open(name, FileMode.Open)))
                    {
                        sendFileTCP(br.BaseStream, size, file.Name);
                    }
            }
            catch (Exception)
            {
                int i = 1 + 1;

            }

        }

        private static bool sendFileTCP(Stream stream, ulong fileSize, string fileName)
        {
            try
            {
                byte[] buf = new byte[stream.Length + SIZE_STRUCTURE_UPLOAD];
                BitConverter.GetBytes((char)1).CopyTo(buf, 0);


                //копируем токен
                var utf8bytes = Encoding.UTF8.GetBytes(USER_TOKEN);
                var ascii = Encoding.Convert(
                                Encoding.UTF8, Encoding.GetEncoding("ASCII"), utf8bytes);
                ascii.CopyTo(buf, 1);
                //--


                //копируем имя файла
                utf8bytes = Encoding.UTF8.GetBytes(fileName);
                ascii = Encoding.Convert(
                                Encoding.UTF8, Encoding.GetEncoding("ASCII"), utf8bytes);
                ascii.CopyTo(buf, 129);
                //--


                //копируем директори id
                utf8bytes = Encoding.UTF8.GetBytes(DIRICTORYID);
                ascii = Encoding.Convert(
                                Encoding.UTF8, Encoding.GetEncoding("ASCII"), utf8bytes);
                ascii.CopyTo(buf, 384);
                //----------

                BitConverter.GetBytes(fileSize).CopyTo(buf, 408);


                stream.Read(buf, SIZE_STRUCTURE_UPLOAD, (int)stream.Length);
                //byte[] b = new byte[1];
                Socket soc = new Socket(AddressFamily.InterNetwork, SocketType.Stream, ProtocolType.Tcp);
                var ip = IPAddress.Parse(SERVER_UPLOAD);
                IPEndPoint ipep = new IPEndPoint(ip, PORT_CONN_TCP);
                soc.NoDelay = true;
                soc.Connect(ipep);
                soc.Send(buf);
                soc.Shutdown(SocketShutdown.Send);
               // soc.Receive(b);
                soc.Close();
               // if (b[0] == 1)
                 //   return true;
               // return false;
                return true;
            }
            catch (Exception)
            {
                return false;
            }

        }

        static void Main(string[] args)
        {
            CreateFile("");
        }
    }
}

------------------------------------------------------
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Net;
using System.Net.Sockets;
using System.Runtime.InteropServices;
using System.Text;
using System.Threading.Tasks;

namespace sendFile
{

    class Program
    {
        private const int PORT_CONN_TCP = 6454;
        private const string USER_TOKEN = "37907d7dd82659214161ebb39bbd811ebca40b60bab8c7010780d8a4775496537fc82d599ff6584247ab0b9374b195581080eefad364f1e6a49efbac97eabf85";
        private const string DIRICTORYID = "5369e903157c104c65b16fb2";
        private const string SERVER_UPLOAD = "192.168.0.105";
        private const int SIZE_STRUCTURE_UPLOAD = 417;

        public static void CreateFile(string name)
        {
            try
            {

                    FileInfo file = new FileInfo(name);
                    ulong size = (ulong) file.Length;
                    using (BinaryReader br = new BinaryReader(File.Open(name, FileMode.Open)))
                    {
                        sendFileTCP(br.BaseStream, size, file.Name);
                    }
            }
            catch (Exception)
            {
                int i = 1 + 1;

            }

        }

        private static bool sendFileTCP(Stream stream, ulong fileSize, string fileName)
        {
            try
            {
                byte[] buf = new byte[stream.Length + SIZE_STRUCTURE_UPLOAD];
                BitConverter.GetBytes((char)1).CopyTo(buf, 0);


                //копируем токен
                var utf8bytes = Encoding.UTF8.GetBytes(USER_TOKEN);
                var ascii = Encoding.Convert(
                                Encoding.UTF8, Encoding.GetEncoding("ASCII"), utf8bytes);
                ascii.CopyTo(buf, 1);
                //--


                //копируем имя файла
                utf8bytes = Encoding.UTF8.GetBytes(fileName);
                ascii = Encoding.Convert(
                                Encoding.UTF8, Encoding.GetEncoding("ASCII"), utf8bytes);
                ascii.CopyTo(buf, 129);
                //--


                //копируем директори id
                utf8bytes = Encoding.UTF8.GetBytes(DIRICTORYID);
                ascii = Encoding.Convert(
                                Encoding.UTF8, Encoding.GetEncoding("ASCII"), utf8bytes);
                ascii.CopyTo(buf, 384);
                //----------

                BitConverter.GetBytes(fileSize).CopyTo(buf, 408);


                stream.Read(buf, SIZE_STRUCTURE_UPLOAD, (int)stream.Length);
                //byte[] b = new byte[1];
                Socket soc = new Socket(AddressFamily.InterNetwork, SocketType.Stream, ProtocolType.Tcp);
                var ip = IPAddress.Parse(SERVER_UPLOAD);
                IPEndPoint ipep = new IPEndPoint(ip, PORT_CONN_TCP);
                soc.NoDelay = true;
                soc.Connect(ipep);
                soc.Send(buf);
                soc.Shutdown(SocketShutdown.Send);
               // soc.Receive(b);
                soc.Close();
               // if (b[0] == 1)
                 //   return true;
               // return false;
                return true;
            }
            catch (Exception)
            {
                return false;
            }

        }

        static void Main(string[] args)
        {
            CreateFile("");
        }
    }
}

---------------------------------------------------------------------------
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Net;
using System.Net.Sockets;
using System.Runtime.InteropServices;
using System.Text;
using System.Threading.Tasks;

namespace sendFile
{

    class Program
    {
        private const int PORT_CONN_TCP = 6454;
        private const string USER_TOKEN = "37907d7dd82659214161ebb39bbd811ebca40b60bab8c7010780d8a4775496537fc82d599ff6584247ab0b9374b195581080eefad364f1e6a49efbac97eabf85";
        private const string DIRICTORYID = "5369e903157c104c65b16fb2";
        private const string SERVER_UPLOAD = "192.168.0.105";
        private const int SIZE_STRUCTURE_UPLOAD = 417;

        public static void CreateFile(string name)
        {
            try
            {

                    FileInfo file = new FileInfo(name);
                    ulong size = (ulong) file.Length;
                    using (BinaryReader br = new BinaryReader(File.Open(name, FileMode.Open)))
                    {
                        sendFileTCP(br.BaseStream, size, file.Name);
                    }
            }
            catch (Exception)
            {
                int i = 1 + 1;

            }

        }

        private static bool sendFileTCP(Stream stream, ulong fileSize, string fileName)
        {
            try
            {
                byte[] buf = new byte[stream.Length + SIZE_STRUCTURE_UPLOAD];
                BitConverter.GetBytes((char)1).CopyTo(buf, 0);


                //копируем токен
                var utf8bytes = Encoding.UTF8.GetBytes(USER_TOKEN);
                var ascii = Encoding.Convert(
                                Encoding.UTF8, Encoding.GetEncoding("ASCII"), utf8bytes);
                ascii.CopyTo(buf, 1);
                //--


                //копируем имя файла
                utf8bytes = Encoding.UTF8.GetBytes(fileName);
                ascii = Encoding.Convert(
                                Encoding.UTF8, Encoding.GetEncoding("ASCII"), utf8bytes);
                ascii.CopyTo(buf, 129);
                //--


                //копируем директори id
                utf8bytes = Encoding.UTF8.GetBytes(DIRICTORYID);
                ascii = Encoding.Convert(
                                Encoding.UTF8, Encoding.GetEncoding("ASCII"), utf8bytes);
                ascii.CopyTo(buf, 384);
                //----------

                BitConverter.GetBytes(fileSize).CopyTo(buf, 408);


                stream.Read(buf, SIZE_STRUCTURE_UPLOAD, (int)stream.Length);
                //byte[] b = new byte[1];
                Socket soc = new Socket(AddressFamily.InterNetwork, SocketType.Stream, ProtocolType.Tcp);
                var ip = IPAddress.Parse(SERVER_UPLOAD);
                IPEndPoint ipep = new IPEndPoint(ip, PORT_CONN_TCP);
                soc.NoDelay = true;
                soc.Connect(ipep);
                soc.Send(buf);
                soc.Shutdown(SocketShutdown.Send);
               // soc.Receive(b);
                soc.Close();
               // if (b[0] == 1)
                 //   return true;
               // return false;
                return true;
            }
            catch (Exception)
            {
                return false;
            }

        }

        static void Main(string[] args)
        {
            CreateFile("");
        }
    }
}
------------------------------------------------
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Net;
using System.Net.Sockets;
using System.Runtime.InteropServices;
using System.Text;
using System.Threading.Tasks;

namespace sendFile
{

    class Program
    {
        private const int PORT_CONN_TCP = 6454;
        private const string USER_TOKEN = "37907d7dd82659214161ebb39bbd811ebca40b60bab8c7010780d8a4775496537fc82d599ff6584247ab0b9374b195581080eefad364f1e6a49efbac97eabf85";
        private const string DIRICTORYID = "5369e903157c104c65b16fb2";
        private const string SERVER_UPLOAD = "192.168.0.105";
        private const int SIZE_STRUCTURE_UPLOAD = 417;

        public static void CreateFile(string name)
        {
            try
            {

                    FileInfo file = new FileInfo(name);
                    ulong size = (ulong) file.Length;
                    using (BinaryReader br = new BinaryReader(File.Open(name, FileMode.Open)))
                    {
                        sendFileTCP(br.BaseStream, size, file.Name);
                    }
            }
            catch (Exception)
            {
                int i = 1 + 1;

            }

        }

        private static bool sendFileTCP(Stream stream, ulong fileSize, string fileName)
        {
            try
            {
                byte[] buf = new byte[stream.Length + SIZE_STRUCTURE_UPLOAD];
                BitConverter.GetBytes((char)1).CopyTo(buf, 0);


                //копируем токен
                var utf8bytes = Encoding.UTF8.GetBytes(USER_TOKEN);
                var ascii = Encoding.Convert(
                                Encoding.UTF8, Encoding.GetEncoding("ASCII"), utf8bytes);
                ascii.CopyTo(buf, 1);
                //--


                //копируем имя файла
                utf8bytes = Encoding.UTF8.GetBytes(fileName);
                ascii = Encoding.Convert(
                                Encoding.UTF8, Encoding.GetEncoding("ASCII"), utf8bytes);
                ascii.CopyTo(buf, 129);
                //--


                //копируем директори id
                utf8bytes = Encoding.UTF8.GetBytes(DIRICTORYID);
                ascii = Encoding.Convert(
                                Encoding.UTF8, Encoding.GetEncoding("ASCII"), utf8bytes);
                ascii.CopyTo(buf, 384);
                //----------

                BitConverter.GetBytes(fileSize).CopyTo(buf, 408);


                stream.Read(buf, SIZE_STRUCTURE_UPLOAD, (int)stream.Length);
                //byte[] b = new byte[1];
                Socket soc = new Socket(AddressFamily.InterNetwork, SocketType.Stream, ProtocolType.Tcp);
                var ip = IPAddress.Parse(SERVER_UPLOAD);
                IPEndPoint ipep = new IPEndPoint(ip, PORT_CONN_TCP);
                soc.NoDelay = true;
                soc.Connect(ipep);
                soc.Send(buf);
                soc.Shutdown(SocketShutdown.Send);
               // soc.Receive(b);
                soc.Close();
               // if (b[0] == 1)
                 //   return true;
               // return false;
                return true;
            }
            catch (Exception)
            {
                return false;
            }

        }

        static void Main(string[] args)
        {
            CreateFile("");
        }
    }
}

------------------------------------------------------
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Net;
using System.Net.Sockets;
using System.Runtime.InteropServices;
using System.Text;
using System.Threading.Tasks;

namespace sendFile
{

    class Program
    {
        private const int PORT_CONN_TCP = 6454;
        private const string USER_TOKEN = "37907d7dd82659214161ebb39bbd811ebca40b60bab8c7010780d8a4775496537fc82d599ff6584247ab0b9374b195581080eefad364f1e6a49efbac97eabf85";
        private const string DIRICTORYID = "5369e903157c104c65b16fb2";
        private const string SERVER_UPLOAD = "192.168.0.105";
        private const int SIZE_STRUCTURE_UPLOAD = 417;

        public static void CreateFile(string name)
        {
            try
            {

                    FileInfo file = new FileInfo(name);
                    ulong size = (ulong) file.Length;
                    using (BinaryReader br = new BinaryReader(File.Open(name, FileMode.Open)))
                    {
                        sendFileTCP(br.BaseStream, size, file.Name);
                    }
            }
            catch (Exception)
            {
                int i = 1 + 1;

            }

        }

        private static bool sendFileTCP(Stream stream, ulong fileSize, string fileName)
        {
            try
            {
                byte[] buf = new byte[stream.Length + SIZE_STRUCTURE_UPLOAD];
                BitConverter.GetBytes((char)1).CopyTo(buf, 0);


                //копируем токен
                var utf8bytes = Encoding.UTF8.GetBytes(USER_TOKEN);
                var ascii = Encoding.Convert(
                                Encoding.UTF8, Encoding.GetEncoding("ASCII"), utf8bytes);
                ascii.CopyTo(buf, 1);
                //--


                //копируем имя файла
                utf8bytes = Encoding.UTF8.GetBytes(fileName);
                ascii = Encoding.Convert(
                                Encoding.UTF8, Encoding.GetEncoding("ASCII"), utf8bytes);
                ascii.CopyTo(buf, 129);
                //--


                //копируем директори id
                utf8bytes = Encoding.UTF8.GetBytes(DIRICTORYID);
                ascii = Encoding.Convert(
                                Encoding.UTF8, Encoding.GetEncoding("ASCII"), utf8bytes);
                ascii.CopyTo(buf, 384);
                //----------

                BitConverter.GetBytes(fileSize).CopyTo(buf, 408);


                stream.Read(buf, SIZE_STRUCTURE_UPLOAD, (int)stream.Length);
                //byte[] b = new byte[1];
                Socket soc = new Socket(AddressFamily.InterNetwork, SocketType.Stream, ProtocolType.Tcp);
                var ip = IPAddress.Parse(SERVER_UPLOAD);
                IPEndPoint ipep = new IPEndPoint(ip, PORT_CONN_TCP);
                soc.NoDelay = true;
                soc.Connect(ipep);
                soc.Send(buf);
                soc.Shutdown(SocketShutdown.Send);
               // soc.Receive(b);
                soc.Close();
               // if (b[0] == 1)
                 //   return true;
               // return false;
                return true;
            }
            catch (Exception)
            {
                return false;
            }

        }

        static void Main(string[] args)
        {
            CreateFile("");
        }
    }
}

--------------------------------------------