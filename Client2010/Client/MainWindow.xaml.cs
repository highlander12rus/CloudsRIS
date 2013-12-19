using System;
using System.Collections.Generic;
using System.IO;
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
    /// Логика взаимодействия для MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public MainWindow()
        {
            Files F = new Files();
            /*BinaryReader br = new BinaryReader(File.OpenRead(@"C:\Users\ilya\Desktop\Client2010\Empress Ki 9.avi"));
            
            var filesize = File.OpenRead(@"C:\Users\ilya\Desktop\Client2010\Empress Ki 9.avi").Length;
           F.CreateFile("film", "/", "dfgsdfggs", (ulong)filesize, "sdfvg",
              @"cd35c6e11de54f09b481982a64ea0da550a61aa8dfdbb0291e77a62744b15d107a10c396333998b60855fd753d6ebfdcb96e0eb32f62ccd68b2cd925da470a98", br.BaseStream);
             */F.GetFile("film", @"/",
                 @"cd35c6e11de54f09b481982a64ea0da550a61aa8dfdbb0291e77a62744b15d107a10c396333998b60855fd753d6ebfdcb96e0eb32f62ccd68b2cd925da470a98");
            InitializeComponent();
        }
    }
}
