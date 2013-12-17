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
        public LoginWindow()
        {
            InitializeComponent();
        }

        private void Button_Enter_Click(object sender, RoutedEventArgs e)
        {
            var user = new User();
            var token = user.Authorize(login.Text, password.Password);
            
            if (!String.Equals(token, "Логин или пароль неверны"))
            {
                var fileWindow = new FileWindow(token);
                fileWindow.Show();
                Close();
            }
            else
            {
                MessageBox.Show("Логин или пароль неверны");
                password.Clear();
            }

        }

    }
}
