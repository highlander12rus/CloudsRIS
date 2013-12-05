using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Net.Http.Headers;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;
using Client.Classes;


namespace Client
{

    public partial class LoginWindow : Window
    {
        const string site = " https://localhost:8000/auth/";
        public LoginWindow()
        {
            Folder f = new Folder();
            User user = new User();
            var token = user.Authorize("ilia12r@gmail.com", "ilya");
           // f.CreateFolder("/example",token );
            f.DeleteFolder("/example", token);
            InitializeComponent();
        }

        private void Button_Enter_Click(object sender, RoutedEventArgs e)
        {
            HttpClient httpclient = new HttpClient();
            httpclient.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue("Login marina=a7gssffdsd67ddsgas9");
            var response = httpclient.GetAsync(site);
            //System.Net.Http.HttpMethod.

            var httpRequestMessage = new HttpRequestMessage(HttpMethod.Delete, "http://e1.ru");
            Task<HttpResponseMessage> sendAsync = httpclient.SendAsync(httpRequestMessage);
        }

    }
}
