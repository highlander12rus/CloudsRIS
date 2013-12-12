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
            
            BinaryReader br = new BinaryReader(File.OpenRead(@"E:\testFiles"));
            Files F = new Files();
            F.CreateFile("testName", "/", "dfgsdfggs", 41234, "sdfvg",
                @"d6d549f011e12404730ddee7053fab47a488262a370c1bfb7067382b4bed03a987025154544b0316079cc782c317a7056754b6f7b6189b6d10201d3559dd10ff",br.BaseStream);

            InitializeComponent();
        }
    }
}
