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
    class Folder : IFolder
    {
        private const string URL_API_FOLDER = @"http://90.157.18.190/folder/";

        public static IFolder getInterface()
        {
            return new Folder();
        }
    
        public bool CreateFolder(string path, string token)
        {
            try
            {
                HttpClient client = new HttpClient { BaseAddress = new Uri(URL_API_FOLDER) };
                client.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue("Basic", token);
                string content = @"name=" + PCLWebUtility.WebUtility.UrlEncode(path);
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

                HttpWebRequest request = (HttpWebRequest)WebRequest.Create(URL_API_FOLDER);
                request.Method = "DELETE";
                request.Headers.Add(@"Authorization: Basic " + token);
                request.ContentType = "application/x-www-form-urlencoded";
                string inputData = @"name=" + path;
                byte[] requestBytes = new ASCIIEncoding().GetBytes(inputData);
                using (Stream requestStream = request.GetRequestStream())
                {
                    requestStream.Write(requestBytes, 0, requestBytes.Length);
                }


                using (HttpWebResponse Response = request.GetResponse() as HttpWebResponse)
                {
                    if (Response.StatusCode == HttpStatusCode.NoContent)
                    {
                        return true;
                    }
                    return false;
                }

            }
            catch (Exception e)
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
