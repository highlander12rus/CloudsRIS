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
        private const int PORT_CONN_TCP = 45877;
        private const string USER_TOKEN = "aeadc11e23a94d40e2f0baf67a3831e167901104ac5bdee2242636719fa382e3711e6cd91ff9fbf6b1b0f3dfad0e5477b8de41a6b3905b251a9c7ff40cf1279e";
        private const string FILE_DOWNLOADING_ID = "53774c45d79a4e16e316e82d";
        private const string SERVER_DOWNLOAD = "192.168.199.130";
        private const int SIZE_STRUCTURE_DOWNLOAD = 155;

        


        


        public static void DownloadFile(string name)
        {
            try
            {

               
                using (BinaryWriter br = new BinaryWriter(File.Create(name)))
                {
                    FileInfo file = new FileInfo(name);
                    long size = file.Length;
                    downloadFile(USER_TOKEN, FILE_DOWNLOADING_ID, SERVER_DOWNLOAD, 246525, br.BaseStream);
                }
            }
            catch (Exception e)
            {
                int i = 1 + 1;

            }

        }

        private static void downloadFile(string token, string fileId, string serverDownload, long fileSize, Stream stream)
        {
            byte[] buf = new byte[SIZE_STRUCTURE_DOWNLOAD];
            buf[0] = 0;

            var utf8bytes = Encoding.UTF8.GetBytes(USER_TOKEN);
            var ascii = Encoding.Convert(
                            Encoding.UTF8, Encoding.GetEncoding("ASCII"), utf8bytes);
            ascii.CopyTo(buf, 1);

            utf8bytes = Encoding.UTF8.GetBytes(FILE_DOWNLOADING_ID);
            ascii = Encoding.Convert(
                            Encoding.UTF8, Encoding.GetEncoding("ASCII"), utf8bytes);
            ascii.CopyTo(buf, 130);


            Socket soc = new Socket(AddressFamily.InterNetwork, SocketType.Stream, ProtocolType.Tcp);
            var ip = IPAddress.Parse(SERVER_DOWNLOAD);
            IPEndPoint ipep = new IPEndPoint(ip, PORT_CONN_TCP);
            soc.NoDelay = true;
            soc.Connect(ipep);

            soc.Send(buf, buf.Length, SocketFlags.None);
            var t = soc.Available;
            soc.Shutdown(SocketShutdown.Send);

            byte[] returnFile = new byte[8192];


            long recivedAllButes = 0;

            //@todo: сделать что если приходит не полынй набор данных
            while (SocketConnected(soc))
            {
                int recivetBytes = soc.Receive(returnFile);

                stream.Write(returnFile, 0, recivetBytes);

                recivedAllButes += recivetBytes;
                Console.WriteLine("recive data " + recivedAllButes);
            }
            
            soc.Close();

        }

        private static  bool SocketConnected(Socket s)
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
            //DownloadFile(@"C:\Users\ilya\Documents\Visual Studio 2012\Projects\sendFile\sendFile\test_send.cs");
           DownloadFile(@"C:\Users\ilya\Desktop\CloudsRIS-devClient\Download\sendFile\lol.png");
        }
    }
}
