using System.Net.Http;
using Client.Interfaces;
using Newtonsoft.Json;
using System;

namespace Client.Classes
{

    public class User : IUser
    {

        public string Authorize(string login, string password)
        {
            try
            {
                var crypt = Crypt.getICrypt();
                HttpClient client = new HttpClient();
                var request = new HttpRequestMessage(HttpMethod.Get, ReqstManager.Auth);

                request.Headers.Add("Authorization", "Login " + login + "=" + password/*crypt.PasswordCrypt(password)*/);
                var response = client.SendAsync(request);
                response.Wait();
                var result = response.Result.Content.ReadAsStringAsync();
                result.Wait();
                if ((int)response.Result.StatusCode > 299)
                    return "Логин или пароль неверны";

                dynamic token = JsonConvert.DeserializeObject(result.Result);
                return token.token;
            }
            catch (Exception e)
            {
                return "Логин или пароль неверны";
            }
        }

        public string GetUserInfo(string token)
        {
            return "";
        }

        public bool EditUserInfo(string name, string email, string token)
        {
            return true;
        }

        internal static IUser getIUser()
        {
            var user = new User();
            return user;
        }

    }

}
