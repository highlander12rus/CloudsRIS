using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Net.Http.Headers;
using System.Net.Sockets;
using System.Security.Cryptography.X509Certificates;
using System.Text;
using Client.Interfaces;
using Newtonsoft.Json;


namespace Client.Classes
{
    class Files : IFile
    {
        private const string URL_API_FILE = @"http://90.157.18.190/file/";
        private const int PORT_CONN_TCP = 6454;

        public static IFile getInterface()
        {
            return new Files();
        }
        public bool CreateFile(string name, string pathToFolder, string md5Hash, ulong fileSize, string securityMethod, string token, Stream stream)
        {
            
            HttpClient client = new HttpClient { BaseAddress = new Uri(URL_API_FILE) };
            client.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue("Basic", token);
            string content = @"file_name=" + System.Uri.EscapeUriString(name);
            content += @"&path=" + System.Uri.EscapeUriString(pathToFolder);
            content += @"&check=" + System.Uri.EscapeUriString(md5Hash);
            content += @"&file_size=" + System.Uri.EscapeUriString(fileSize.ToString());
            content += @"&security_method=" + System.Uri.EscapeUriString(securityMethod);

            HttpContent httpContent = new StringContent(content);
            httpContent.Headers.ContentType = new MediaTypeHeaderValue("application/x-www-form-urlencoded");
            var result = client.PostAsync("/file/", httpContent).Result;

            var status = result.StatusCode;
            if (status.ToString() == "OK")
            {
                dynamic request = JsonConvert.DeserializeObject(result.Content.ReadAsStringAsync().Result);
                string server_uplouds = request.server_uplouds;
                string token_operation = request.token_operation;

               if( sendFileTCP(server_uplouds, token_operation, stream, fileSize))
                return true;
            }

            return false;
        }

        private bool sendFileTCP(string server_uplouds, string token_operation, Stream stream, ulong fileSize)
        {
            try
            {
                byte[] buf = new byte[stream.Length + 136];
                var utf8bytes = Encoding.UTF8.GetBytes(token_operation);
                var ascii = Encoding.Convert(
                                Encoding.UTF8, Encoding.GetEncoding("ASCII"), utf8bytes);
                ascii.CopyTo(buf, 0);
                BitConverter.GetBytes(fileSize).CopyTo(buf, 128);
                stream.Read(buf, 136, (int)stream.Length);
                byte[] b = new byte[1];
                Socket soc = new Socket(AddressFamily.InterNetwork, SocketType.Stream, ProtocolType.Tcp);
                var ip = IPAddress.Parse(server_uplouds);
                IPEndPoint ipep = new IPEndPoint(ip, 6454);
                soc.NoDelay = true;
                soc.Connect(ipep);
                soc.Send(buf);
                soc.Shutdown(SocketShutdown.Send);
                soc.Receive(b);
                soc.Close();
                if (b[0] == 1)
                    return true;
                return false;
            }
            catch (Exception)
            {
                return false;
            }
            
        }

        public bool ChangeFileName(string name, string pathToFolder, string newName, string token)
        {
            return false;// throw new NotImplementedException();
        }

        public bool DeleteFile(string name, string pathToFolder, string token)
        {
            return false; //throw new NotImplementedException();
        }

        public bool GetFile(string name, string pathToFolder, string token, Stream stream)
        {


            HttpClient client = new HttpClient();
            string URL =
            URL_API_FILE + @"?folder=" + System.Uri.EscapeUriString(pathToFolder) + @"&file_name=" +
            System.Uri.EscapeUriString(name);
            var request = new HttpRequestMessage(HttpMethod.Get, URL);
            client.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue("Basic", token);
            var response = client.SendAsync(request);
            response.Wait();
            var result = response.Result.Content.ReadAsStringAsync();
            result.Wait();
            if ("OK" == response.Result.StatusCode.ToString())
            {

                dynamic json = JsonConvert.DeserializeObject(result.Result);

                ulong fileSize = json.file_size;
                string token_operation = json.token_operation;
                string server_download = json.server_download;
                string chheck_sum = json.chheck_sum;
                downloadFile(token_operation, server_download, fileSize, stream);
                return true;
            }



            return false;// throw new NotImplementedException();
        }

        private void downloadFile(string token_operation, string server_download, ulong fileSize, Stream stream)
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


            int recivedAllButes = 0;

            while (recivedAllButes < (int)fileSize)
            {
                int recivetBytes = soc.Receive(returnFile);
                stream.Write(returnFile, 0, recivetBytes);
                recivedAllButes += recivetBytes;
                Console.WriteLine("recive data " + recivedAllButes);
            }



            soc.Shutdown(SocketShutdown.Both);
            soc.Close();

        }
    }
}
