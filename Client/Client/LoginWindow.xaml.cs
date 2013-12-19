using System;
using System.Windows;
using System.Windows.Controls;
using Client.Classes;


namespace Client
{

    public partial class LoginWindow : Page
    {
        public LoginWindow()
        {
            InitializeComponent();
            
        }

        private void Button_Enter_Click(object sender, RoutedEventArgs e)
        {
            if (!String.Equals(login.Text, "") && !String.Equals(password.Password, ""))
            {
                if (!Worker.Autorization(login.Text, password.Password))
                {
                    MessageBox.Show("Логин или пароль неверны");
                    password.Clear();
                }
                else
                {
                    NavigationService.Navigate((new Uri("FileWindow.xaml", UriKind.Relative)));
                }
            }
            
            else
            {
                MessageBox.Show("Поля не должны содержать пустую строку");
                password.Clear();
            }

        }

    }
}
