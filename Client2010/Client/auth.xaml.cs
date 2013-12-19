using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
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
    /// <summary>
    /// Логика взаимодействия для auth.xaml
    /// </summary>
    public partial class auth : Page
    {
        public auth()
        {
            InitializeComponent();
        }

        private void AuthButton_Click(object sender, RoutedEventArgs e)
        {
           
            if (login_box.Text == "" || PasswordBox.Password == "")
            {
                label_errors.Visibility = Visibility.Visible;
                label_errors.Content = "поля не заполнены";
            }
            else
            {
                if (!Worker.Autorization(login_box.Text, PasswordBox.Password))
                {
                    label_errors.Visibility = Visibility.Visible;
                    label_errors.Content = "Логин и пароль не найдены";
                    return;
                }
                NavigationService.Navigate((new Uri("FileManager.xaml", UriKind.Relative)));
               
            }
            
          
        }
        
    }
}
