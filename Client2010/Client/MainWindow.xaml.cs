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

            //BinaryReader br = new BinaryReader(File.OpenRead(@"E:\testFiles"));
            Files F = new Files();
            //var filesize = File.OpenRead(@"E:\testFiles").Length;
            //F.CreateFile("testFiles", "/", "dfgsdfggs", (ulong)filesize, "sdfvg",
             //   @"0bfa12a55252c3b723471a89b189063ad3060345da10096064f2c0c1fa29685ecaff94416bd1bf3d893c1134ec64f1c68ea9055661434a5d7e9a9c9cb385c254", br.BaseStream);
            F.GetFile("testFiles", @"/",
                 @"0bfa12a55252c3b723471a89b189063ad3060345da10096064f2c0c1fa29685ecaff94416bd1bf3d893c1134ec64f1c68ea9055661434a5d7e9a9c9cb385c254");
            InitializeComponent();
        }
    }
}
