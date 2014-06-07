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
        private const int PORT_CONN_TCP = 45876;
        private const string USER_TOKEN = "aeadc11e23a94d40e2f0baf67a3831e167901104ac5bdee2242636719fa382e3711e6cd91ff9fbf6b1b0f3dfad0e5477b8de41a6b3905b251a9c7ff40cf1279e";
        private const string DIRICTORYID = "53710e1957908231d0c95287";
        private const string SERVER_UPLOAD = "192.168.199.130";
        private const int SIZE_STRUCTURE_UPLOAD = 420;

        public static void CreateFile(string name)
        {
            try
            {

                    FileInfo file = new FileInfo(name);
                    long size =  file.Length;
                    using (BinaryReader br = new BinaryReader(File.Open(name, FileMode.Open)))
                    {
                        sendFileTCP(br.BaseStream, size, file.Name);
                    }
            }
            catch (Exception e)
            {
                int i = 1 + 1;

            }

        }

        private static bool sendFileTCP(Stream stream, long fileSize, string fileName)
        {
            try
            {
                byte[] buf = new byte[SIZE_STRUCTURE_UPLOAD];
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
                ascii.CopyTo(buf, 130);
                //--

        
                //копируем директори id
                utf8bytes = Encoding.UTF8.GetBytes(DIRICTORYID);
                ascii = Encoding.Convert(
                                Encoding.UTF8, Encoding.GetEncoding("ASCII"), utf8bytes);
                ascii.CopyTo(buf, 386);
                //----------

                BitConverter.GetBytes(fileSize).CopyTo(buf, 412);


                //stream.Read(buf, SIZE_STRUCTURE_UPLOAD, (int)stream.Length);
                //byte[] b = new byte[1];
                


                Socket soc = new Socket(AddressFamily.InterNetwork, SocketType.Stream, ProtocolType.Tcp);
                var ip = IPAddress.Parse(SERVER_UPLOAD);
                IPEndPoint ipep = new IPEndPoint(ip, PORT_CONN_TCP);
                soc.NoDelay = true;
                soc.Connect(ipep);
                soc.Send(buf);
                soc.SendFile(@"C:\Users\ilya\Desktop\CloudsRIS-devClient\sendFile\sendFile\map1.png");
               byte[] sendForFile = new byte[8193];
                int bytesAllSend = 0;
                while (bytesAllSend < fileSize) 
                {
                    int bytesWasRead = stream.Read(sendForFile, 0, 8192);
                    bytesAllSend += bytesWasRead;
                    soc.Send(sendForFile, bytesWasRead, SocketFlags.None);

                }
                
                soc.Shutdown(SocketShutdown.Send);
               // soc.Receive(b);
                soc.Close();
               // if (b[0] == 1)
                 //   return true;
               // return false;
                return true;
            }
            catch (Exception e)
            {
                return false;
            }

        }


        private static bool SocketConnected(Socket s)
        {
            bool part1 = s.Poll(1000, SelectMode.SelectRead);
            bool part2 = (s.Available == 0);
            if (part1 & part2)
                return false;
            else
                return true;
        }
        static void Main(string[] args)
        {
            CreateFile(@"C:\Users\ilya\Desktop\CloudsRIS-devClient\sendFile\sendFile\map.png");
        }
    }
}
