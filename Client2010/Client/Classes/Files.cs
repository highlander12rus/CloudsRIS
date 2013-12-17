using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Net.Http.Headers;
using System.Net.Sockets;
using System.Text;
using Client.Interfaces;
using Newtonsoft.Json;


namespace Client.Classes
{
    class Files : IFile
    {
        private const string URL_API_FILE = @"http://90.157.18.190/file/";
        private const int PORT_CONN_TCP = 6454;
        public byte CreateFile(string name, string pathToFolder, string md5Hash, ulong fileSize, string securityMethod, string token, Stream stream)
        {
            // try
            // {
            HttpClient client = new HttpClient { BaseAddress = new Uri(URL_API_FILE) };
            client.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue("Basic", token);
            string content = @"file_name=" + PCLWebUtility.WebUtility.UrlEncode(name);
            content += @"&path=" + PCLWebUtility.WebUtility.UrlEncode(pathToFolder);
            content += @"&check=" + PCLWebUtility.WebUtility.UrlEncode(md5Hash);
            content += @"&file_size=" + PCLWebUtility.WebUtility.UrlEncode(fileSize.ToString());
            content += @"&security_method=" + PCLWebUtility.WebUtility.UrlEncode(securityMethod);

            HttpContent httpContent = new StringContent(content);
            httpContent.Headers.ContentType = new MediaTypeHeaderValue("application/x-www-form-urlencoded");
            var result = client.PostAsync("/file/", httpContent).Result;
            var status = result.StatusCode;
            if (status.ToString() == "OK")
            {
                dynamic request = JsonConvert.DeserializeObject(result.Content.ReadAsStringAsync().Result);
                string server_uplouds = "192.168.89.128";//= request.server_uplouds;
                string token_operation = request.token_operation;

                sendFileTCP(server_uplouds, token_operation, stream, fileSize);

            }
            //return String.Equals("NoContent", status.ToString());
            //  }
            /*   catch (Exception e)
               {
                  // return false;
                   return 0;
               }*/
            return 0;
        }

        private bool sendFileTCP(string server_uplouds, string token_operation, Stream stream, ulong fileSize)
        {
            // TcpClient client = new TcpClient(server_uplouds, PORT_CONN_TCP);
            byte[] buf = new byte[stream.Length + 136];
            //(new ASCIIEncoding().GetBytes(token_operation)).CopyTo(buf,0);
            //token_operation.ToCharArray().CopyTo(buf,0);
            //BitConverter.GetBytes(fileSize).CopyTo(buf,128);


            var utf8bytes = Encoding.UTF8.GetBytes(token_operation);

            var ascii = Encoding.Convert(
                            Encoding.UTF8, Encoding.GetEncoding("ASCII"), utf8bytes);
            ascii.CopyTo(buf, 0);
            //client.GetStream().Write(ascii, 0, 128);
            //client.GetStream().Write(BitConverter.GetBytes(fileSize), 0, sizeof(ulong));
            BitConverter.GetBytes(fileSize).CopyTo(buf, 128);
            // var t = sizeof (ulong);
            stream.Read(buf, 136, (int)stream.Length);
            //client.GetStream().Write(buf,0,(int)stream.Length);
            byte[] b = new byte[1];
            Socket soc = new Socket(AddressFamily.InterNetwork, SocketType.Stream, ProtocolType.Tcp);
            var ip = IPAddress.Parse(server_uplouds);
            IPEndPoint ipep = new IPEndPoint(ip, 6454);
            soc.NoDelay = true;

            soc.Connect(ipep);

            // soc.SetSocketOption(SocketOptionLevel.Socket, SocketOptionName.ReceiveBuffer, 0);


            soc.Send(buf);
            soc.Shutdown(SocketShutdown.Send);
            // soc.Disconnect(true);
            soc.Receive(b);
            soc.Close();
            //client.GetStream().Read(b, 0, 1);
            return true;
        }

        public bool ChangeFileName(string name, string pathToFolder, string newName, string token)
        {
            return false;// throw new NotImplementedException();
        }

        public bool DeleteFile(string name, string pathToFolder, string token)
        {
            return false; //throw new NotImplementedException();
        }

        public bool GetFile(string name, string pathToFolder, string token)
        {


            HttpClient client = new HttpClient();
            // /file/?folder=<путьдофайла>&file_name=<имя файла>

            string URL =
            URL_API_FILE + @"?folder=" + PCLWebUtility.WebUtility.UrlEncode(pathToFolder) + @"&file_name=" +
            PCLWebUtility.WebUtility.UrlEncode(name);
            var request = new HttpRequestMessage(HttpMethod.Get, URL);

            client.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue("Basic", token);
            var response = client.SendAsync(request);
            var result = response.Result.Content.ReadAsStringAsync();
         //   if ("OK" == response.Status.ToString())
          //  {

                dynamic json = JsonConvert.DeserializeObject(result.Result);

                ulong fileSize = json.file_size;
                string token_operation = json.token_operation;
            string server_download = "192.168.89.131";//json.server_download;
                string chheck_sum = json.chheck_sum;
                downloadFile(token_operation, server_download, fileSize);
          //  }



            return false;// throw new NotImplementedException();
        }

        private void downloadFile(string token_operation, string server_download, ulong fileSize)
        {
            byte[] buf = new byte[136];
            var utf8bytes = Encoding.UTF8.GetBytes(token_operation);
            var ascii = Encoding.Convert(
                            Encoding.UTF8, Encoding.GetEncoding("ASCII"), utf8bytes);
            ascii.CopyTo(buf, 0);
            BitConverter.GetBytes(fileSize).CopyTo(buf, 128);
            Socket soc = new Socket(AddressFamily.InterNetwork, SocketType.Stream, ProtocolType.Tcp);
            var ip = IPAddress.Parse(server_download);
            IPEndPoint ipep = new IPEndPoint(ip, 6454);
            soc.NoDelay = true;
            soc.Connect(ipep);
            soc.Send(buf);
            var t = soc.Available;

            soc.Shutdown(SocketShutdown.Send);
            byte[] returnFile = new byte[8192];
            BinaryWriter br = new BinaryWriter(File.Create(@"E:\returnFiles"));

            int recivedAllButes = 0;

            while (recivedAllButes < (int)fileSize)
            {
                int recivetBytes = soc.Receive(returnFile);
                br.Write(returnFile, 0, recivetBytes);
                recivedAllButes += recivetBytes;
                Console.WriteLine("recive data " + recivedAllButes);
            }



            soc.Shutdown(SocketShutdown.Both);
            soc.Close();

        }
    }
}
