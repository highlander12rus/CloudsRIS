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
        public byte CreateFile(string name, string pathToFolder, string md5Hash, ulong fileSize, string securityMethod, string token,Stream stream)
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

        private bool sendFileTCP(string server_uplouds, string token_operation, Stream stream, ulong  fileSize)
        {
            TcpClient client = new TcpClient(server_uplouds, PORT_CONN_TCP);
            byte[] buf= new byte[stream.Length];
            //(new ASCIIEncoding().GetBytes(token_operation)).CopyTo(buf,0);
            //token_operation.ToCharArray().CopyTo(buf,0);
            //BitConverter.GetBytes(fileSize).CopyTo(buf,128);


            var utf8bytes = Encoding.UTF8.GetBytes(token_operation);
            var ascii = Encoding.Convert(
                            Encoding.UTF8, Encoding.GetEncoding("ASCII"), utf8bytes);

            client.GetStream().Write(ascii, 0, 128);
            client.GetStream().Write(BitConverter.GetBytes(fileSize), 0, sizeof(ulong));

           // var t = sizeof (ulong);
            stream.Read(buf, 0, (int)stream.Length);
            client.GetStream().Write(buf,0,(int)stream.Length);
            byte[] b = new byte[1];
            
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
           return false;// throw new NotImplementedException();
        }
    }
}
