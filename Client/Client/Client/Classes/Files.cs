using System;
using System.IO;
using System.Net;
using System.Net.Http;
using System.Net.Http.Headers;
using System.Net.Sockets;
using System.Text;
using Client.Interfaces;
using Newtonsoft.Json;
using System.Collections.Generic;
using System.Web;


namespace Client.Classes
{
    class Files : IFile
    {
        private const int PORT_CONN_TCP = 6454;

        public static IFile getInterface()
        {
            return new Files();
        }
        public bool CreateFile(string fileName, string pathToFolder, long fileSize, string userToken, Stream stream)
        {
            HttpClient client = new HttpClient { BaseAddress = new Uri(ReqstManager.File) };
            client.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue("Basic", userToken);
            string content = @"folder=" + HttpUtility.UrlEncode(pathToFolder);
            
            HttpContent httpContent = new StringContent(content);
            httpContent.Headers.ContentType = new MediaTypeHeaderValue("application/x-www-form-urlencoded");
            var result = client.PostAsync("/file/", httpContent).Result;

            var status = result.StatusCode;
            if (status.ToString() == "OK")
            {
                dynamic request = JsonConvert.DeserializeObject(result.Content.ReadAsStringAsync().Result);
                string dirictoryId = request.dirictoryId;
                string ip = request.server_uplouds;

                if (sendFileTCP(ip, fileName, stream, fileSize, dirictoryId, userToken))
                    return true;
            }

            return false;
        }

        private bool sendFileTCP(string server_uploud, string fileName, Stream stream, long fileSize, string dirictoryId, string userToken)
        {
            const int PORT_CONN_TCP = 45876;
            const int SIZE_STRUCTURE_UPLOAD = 420;

            try
            {
                byte[] buf = new byte[SIZE_STRUCTURE_UPLOAD + stream.Length];
                BitConverter.GetBytes((char)1).CopyTo(buf, 0);

                //копируем токен
                var utf8bytes = Encoding.UTF8.GetBytes(userToken);
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
                utf8bytes = Encoding.UTF8.GetBytes(dirictoryId);
                ascii = Encoding.Convert(
                                Encoding.UTF8, Encoding.GetEncoding("ASCII"), utf8bytes);
                ascii.CopyTo(buf, 386);
                //----------

                BitConverter.GetBytes(fileSize).CopyTo(buf, 412);


                stream.Read(buf, SIZE_STRUCTURE_UPLOAD, (int)stream.Length);
                // stream.Read(buf, SIZE_STRUCTURE_UPLOAD, (int)stream.Length);
                //byte[] b = new byte[1];

                Socket soc = new Socket(AddressFamily.InterNetwork, SocketType.Stream, ProtocolType.Tcp);
                var ip = IPAddress.Parse(server_uploud);
                IPEndPoint ipep = new IPEndPoint(ip, PORT_CONN_TCP);
                soc.NoDelay = true;
                soc.Connect(ipep);
                soc.Send(buf);



                soc.Shutdown(SocketShutdown.Send);
                // soc.Receive(b);
                soc.Close();

                return true;
            }
            catch (Exception e)
            {
                return false;
            }

        }



        public bool GetFile(string fileId, string token, Stream stream, long fileSize)
        {
           return downloadFile(fileId, token, stream, fileSize);

        }

        private bool downloadFile(string fileId, string token, Stream stream, long fileSize)
        {
            const int PORT_CONN_TCP = 45877;
            const string SERVER_DOWNLOAD = "192.168.199.129";
            const int SIZE_STRUCTURE_DOWNLOAD = 154;

            byte[] buf = new byte[SIZE_STRUCTURE_DOWNLOAD];
            buf[0] = 0;

            var utf8bytes = Encoding.UTF8.GetBytes(token);
            var ascii = Encoding.Convert(
                            Encoding.UTF8, Encoding.GetEncoding("ASCII"), utf8bytes);
            ascii.CopyTo(buf, 1);

            utf8bytes = Encoding.UTF8.GetBytes(fileId);
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
            while (fileSize > recivedAllButes && SocketConnected(soc))
            {
                int recivetBytes = soc.Receive(returnFile);

                stream.Write(returnFile, 0, recivetBytes);

                recivedAllButes += recivetBytes;
                Console.WriteLine("recive data " + recivedAllButes);
            }

            soc.Close();
            return true;

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


        public bool ChangeFileName(string name, string pathToFolder, string newName, string token)
        {
            throw new NotImplementedException();
        }

        public bool DeleteFile(string name, string pathToFolder, string token)
        {
            throw new NotImplementedException();
        }
    }
}
