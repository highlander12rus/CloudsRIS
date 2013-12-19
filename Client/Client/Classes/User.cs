using System.Net.Http;
using Client.Interfaces;
using Newtonsoft.Json;

namespace Client.Classes
{
    
    public class User: IUser
    {
        private const string URL_API_AUTH = @"http://90.157.18.190/auth/";

        public string Authorize(string login, string password)
        {
            try
            {
                var crypt = Crypt.getICrypt();
                HttpClient client = new HttpClient();
                var request = new HttpRequestMessage(HttpMethod.Get, URL_API_AUTH);

                request.Headers.Add("Authorization", "Login " + login + "=" + crypt.PasswordCrypt(password));
                var response = client.SendAsync(request);
                var result = response.Result.Content.ReadAsStringAsync();
                
                
                dynamic token = JsonConvert.DeserializeObject(result.Result);
                
                return token.token;
            }
            catch
            {
                return "Логин или пароль неверны";
            }
        }

        public string GetUserInfo(string token)
        {
            return "";
        }

        public bool EditUserInfo(string name, string email,string token)
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
