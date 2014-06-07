using System;
using System.Collections.Generic;
using System.IO;
using System.Net;
using System.Net.Http;
using System.Net.Http.Headers;
using System.Text;
using Client.Interfaces;
using Newtonsoft.Json;
using System.Threading.Tasks;
using System.Web;



namespace Client.Classes
{
    class Folder : IFolder
    {

        public static IFolder getInterface()
        {
            return new Folder();
        }

        public bool CreateFolder(string path, string token)
        {
            try
            {
                HttpClient client = new HttpClient { BaseAddress = new Uri(ReqstManager.Folder) };
                client.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue("Basic", token);
                string content = @"name=" + HttpUtility.UrlEncode(path);
                HttpContent httpContent = new StringContent(content);
                httpContent.Headers.ContentType = new MediaTypeHeaderValue("application/x-www-form-urlencoded");
                Task<HttpResponseMessage> httpTasck = client.PostAsync("/folder/", httpContent);
                httpTasck.Wait();
                var status = httpTasck.Result.StatusCode;
                return ((int)status >= 200 && (int)status < 299);
            }
            catch (Exception e)
            {
                return false;
            }
        }

        public bool DeleteFolder(string path, string token)
        {
            try
            {
                HttpWebRequest request = (HttpWebRequest)WebRequest.Create(ReqstManager.Folder);
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
                    return Response.StatusCode == HttpStatusCode.NoContent;
                }
            }
            catch (Exception e)
            {
                return false;
            }
        }


        /// <summary>
        /// Получения списка диикторий и файлов на сервере
        /// </summary>
        /// <param name="path">путь до дериктории на сервере которую надо поулчть</param>
        /// <param name="token"> Токен пользователя</param>
        /// <returns></returns>
        public Dirictory GetFolderContent(string path, string token)
        {
            try
            {
                HttpClient client = new HttpClient();
                var request = new HttpRequestMessage(HttpMethod.Get, ReqstManager.Folder + "?folder=" + HttpUtility.UrlEncode(path));
                request.Headers.Add("Authorization", "Basic " + token);

                var response = client.SendAsync(request);
                response.Wait();
                var result = response.Result.Content.ReadAsStringAsync();
                result.Wait();
                dynamic jsonAnswer = JsonConvert.DeserializeObject<Dirictory>(result.Result);
                jsonAnswer.isLoad = true;
                return jsonAnswer;
            }
            catch (Exception e)
            {
                Dirictory errors = new Dirictory();
                errors.isLoad = false;
                return errors;
            }
        }

    }


}
