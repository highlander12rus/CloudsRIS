using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Net.Http.Headers;
using System.Text;
using Client.Interfaces;
using Newtonsoft.Json;

namespace Client.Classes
{
    public class Folder : IFolder
    {
        private const string URL_API_FOLDER = @"http://90.157.18.190/folder/";

        public bool CreateFolder(string path, string token)
        {
            try
            {
                HttpClient client = new HttpClient { BaseAddress = new Uri(URL_API_FOLDER) };
                client.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue("Basic", token);
                string content = @"name="+path;
                HttpContent httpContent = new StringContent(content);
                httpContent.Headers.ContentType = new MediaTypeHeaderValue("application/x-www-form-urlencoded");
                var status = client.PostAsync("/folder/", httpContent).Result.StatusCode;
                return String.Equals("NoContent", status.ToString());
            }
            catch (Exception e)
            {
                return false;
            }
        }

        public bool ChangeFolderName(string name, string new_name, string token)
        {
            return true;
        }

        public bool DeleteFolder(string path, string token)
        {
           try
            {

                var Request = HttpWebRequest.Create(URL_API_FOLDER) as HttpWebRequest;

                Request.Method = "DELETE";
                UTF8Encoding encoding = new UTF8Encoding();
                Request.Credentials = CredentialCache.DefaultCredentials;
                //Request.ContentLength = encoding.GetByteCount("name=" + path);
                Request.Headers.Set(HttpRequestHeader.Authorization, "Basic " + token);
                //Request.Headers.Add("Authorization", "Basic " + token);
                //Request.Accept = "application/x-www-form-urlencoded";
                Request.ContentType = "application/x-www-form-urlencoded";
                
                using (Stream requestStream = Request.GetRequestStream())
                {
                    requestStream.Write(encoding.GetBytes("name=" + path), 0,
                        encoding.GetByteCount("name=" + path));
                }


                using (HttpWebResponse Response = Request.GetResponse() as HttpWebResponse)
                {
                    if (Response.StatusCode == HttpStatusCode.NoContent)
                    {
                        return true;
                    }
                    return false;
                }
                
            }
            catch 
            {
                return false;
            }
        }

        public Dictionary<string, List<string>> GetFolderContent(string path, string token)
        {

            try
            {
                HttpClient client = new HttpClient();
                var request = new HttpRequestMessage(HttpMethod.Get, URL_API_FOLDER + "?folder=" + path);
                request.Headers.Add("Authorization", "Basic " + token);

                var response = client.SendAsync(request);
                var result = response.Result.Content.ReadAsStringAsync();

                //dynamic jsonAnswer = JsonConvert.DeserializeObject(result.Result);
                dynamic jsonAnswer = JsonConvert.DeserializeObject<Dictionary<string, List<string>>>(result.Result);



                return jsonAnswer;//.folders+"!"+jsonAnswer.files;
            }
            catch
            {
                Dictionary<string, List<string>> errors = new Dictionary<string, List<string>>();
                List<string> error = new List<string>();
                error.Add("Запрашиваемая папка недоступна или не найдена");
                errors.Add("error", error);
                return errors;
            }
        }

    }
}
