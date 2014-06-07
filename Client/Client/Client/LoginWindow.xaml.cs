using System;
using System.Windows;
using System.Windows.Controls;
using Client.Classes;
using System.Threading.Tasks;


namespace Client
{

    public partial class LoginWindow : Page
    {
        public LoginWindow()
        {
            InitializeComponent();

        }

        public void TextBox_GotFocus(object sender, RoutedEventArgs e)
        {
            TextBox tb = (TextBox)sender;
            tb.Text = string.Empty;
            tb.GotFocus -= TextBox_GotFocus;
        }


        public void PasswordBox_GotFocus(object sender, RoutedEventArgs e)
        {
            PasswordBox tb = (PasswordBox)sender;
            tb.Password = string.Empty;
            tb.GotFocus -= TextBox_GotFocus;
        }

        private void Button_Enter_Click(object sender, RoutedEventArgs e)
        {
            if (!String.Equals(login.Text, "") && !String.Equals(password.Password, ""))
            {
                Enter_Button.IsEnabled = false;
                string loginStr = login.Text;
                string passwordStr = password.Password;

                Task task = new Task(() =>
                {
                    bool result = false;
                    try
                    {
                        result = Worker.Autorization(loginStr, passwordStr);

                        Dispatcher.BeginInvoke((Action)(() =>
                        {

                            if (!result)
                            {
                                MessageBox.Show("Логин или пароль неверны");
                                password.Focus();
                                password.Clear();
                            }
                            else
                            {
                                NavigationService.Navigate((new Uri("FileWindow.xaml", UriKind.Relative)));
                            }
                        }));


                    }
                    catch (Exception ex)
                    {
                        Console.WriteLine("exveption ex=" + ex.Message);
                    }
                    finally
                    {
                        Dispatcher.BeginInvoke((Action)(() =>
                        {
                            Enter_Button.IsEnabled = true;
                        }));
                        
                    }
                });
                task.Start();

            }

            else
            {
                MessageBox.Show("Поля не должны содержать пустую строку");
                password.Clear();
            }

        }

    }
}
