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

            BinaryReader br = new BinaryReader(File.OpenRead(@"E:\ROSE_ENTERPRISE.iso"));
            Files F = new Files();
            var filesize = File.OpenRead(@"E:\ROSE_ENTERPRISE.iso").Length;
            F.CreateFile("testNameRose", "/", "dfgsdfggs", (ulong)filesize, "sdfvg",
                @"23388df93f7ee3a10324f7793dc3c5da1634bfb97ad639b72ebe755ce1579de9c7ffa3f54be0af2fd1b4a819b523cee2935e44cb964bbadb47f25d7ca0837596", br.BaseStream);

            InitializeComponent();
        }
    }
}
