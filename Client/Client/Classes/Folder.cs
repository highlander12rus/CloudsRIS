using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Http;
using System.Text;
using Client.Interfaces;
using Newtonsoft.Json;

namespace Client.Classes
{
    public class Folder : IFolder
    {
        private const string URL_API_FOLDER = @"http://90.157.18.190/folder/";

        public bool CreateFolder(string path,string token)
        {
            try
            {
                HttpClient client = new HttpClient();
                var request = new HttpRequestMessage(HttpMethod.Post, URL_API_FOLDER);
                request.Headers.Add("Authorization", "Basic " + token);
                request.Headers.Add("Content-Type", "application/x-www-form-urlencoded ");

                var response = client.SendAsync(request);
                var result = response.Result.Content.ReadAsStringAsync();

                //dynamic jsonAnswer = JsonConvert.DeserializeObject(result.Result);
                dynamic jsonAnswer = JsonConvert.DeserializeObject<Dictionary<string, List<string>>>(result.Result);



                return jsonAnswer;//.folders+"!"+jsonAnswer.files;
            }
            catch
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
                return false;
            }
        }

        public Dictionary<string, List<string>> GetFolderContent(string path, string token)
        {

            try
            {
                HttpClient client = new HttpClient();
                var request = new HttpRequestMessage(HttpMethod.Get, URL_API_FOLDER+"?folder="+path);
                request.Headers.Add("Authorization", "Basic " + token);

                var response = client.SendAsync(request);
                var result = response.Result.Content.ReadAsStringAsync();

                //dynamic jsonAnswer = JsonConvert.DeserializeObject(result.Result);
                dynamic jsonAnswer = JsonConvert.DeserializeObject<Dictionary<string,List<string>>>(result.Result);
                

               
                return jsonAnswer;//.folders+"!"+jsonAnswer.files;
            }
            catch
            {
                Dictionary<string,List<string>> errors = new Dictionary<string, List<string>>();
                List<string> error = new List<string>();
                error.Add("Запрашиваемая папка недоступна или не найдена");
                errors.Add("error",l );
                return errors;
            }
        }
        
    }
}
