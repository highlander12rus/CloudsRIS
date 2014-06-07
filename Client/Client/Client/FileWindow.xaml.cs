using System;
using System.Collections.Generic;
using System.Linq;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Input;
using Client.Classes;
using Microsoft.Win32;
using System.IO;
using System.Threading.Tasks;
using Client.Model;
using System.Text.RegularExpressions;

namespace Client
{

    public partial class FileWindow : Page
    {
        public FileWindow()
        {
            InitializeComponent();
            CurentFolder.Content = Worker.currentFolder;
            LoadListView();
        }

        /// <summary>
        /// Загрузка содержимого дериктории
        /// </summary>
        private void LoadListView()
        {
            StatusOperation.Content = "Загрузка дериктории...";
            Task task = new Task(() =>
            {
                bool result = false;
                string oldPath = Worker.currentFolder;
                try
                {
                    Dirictory files_folders = Worker.GetFolderContent(Worker.currentFolder);
                    List<DirictoryFile> dirictortList = new List<DirictoryFile>();

                    if (Worker.currentFolder != "/")
                        dirictortList.Add(new DirictoryFile(TYPE_FILE_FOLDER.FOLDER, ".."));

                    foreach (var dirictory in files_folders.Folders)
                    {
                        dirictortList.Add(new DirictoryFile(TYPE_FILE_FOLDER.FOLDER, dirictory));
                    }

                    foreach (var fileName in files_folders.Files)
                    {
                        dirictortList.Add(new DirictoryFile(fileName, fileName.Name));
                    }

                    Dispatcher.BeginInvoke((Action)(() =>
                    {
                        filesfolderslistView.Items.Clear();
                        foreach (var content in dirictortList)
                        {
                            filesfolderslistView.Items.Add(content);
                        }
                        StatusOperation.Content = "Содержимое дериктории загружено";

                        CurentFolder.Content = Worker.currentFolder;
                    }));
                }
                catch (Exception ex)
                {
                    Worker.currentFolder = oldPath;
                    StatusOperation.Content = "Ошибка при загрзки дериктории: " + ex.Message;
                }
            });
            task.Start();
        }

        /// <summary>
        /// Загрузка файла на сервер
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        private void AddFileContextMenu_OnClick(object sender, RoutedEventArgs e)
        {
            FileDialog openFileDialog = new OpenFileDialog();
            Nullable<bool> isOpenFile = openFileDialog.ShowDialog();
            if (isOpenFile == true)
            {
                string fullPathToFile = openFileDialog.FileName;
                string fileName = Path.GetFileName(fullPathToFile);
                FileInfo fileInfo = new FileInfo(fullPathToFile);
                long fileSize = fileInfo.Length;

                StatusOperation.Content = "Загрузка файла...";
                NewFileAdd_Button.IsEnabled = false;
                Task task = new Task(() =>
                {
                    bool result = false;
                    try
                    {
                        using (BinaryReader br = new BinaryReader(System.IO.File.Open(fullPathToFile, FileMode.Open)))
                        {
                            result = Worker.CreateFile(fileName, Worker.currentFolder, fileSize, br.BaseStream);
                        }
                        Dispatcher.BeginInvoke((Action)(() =>
                        {
                            StatusOperation.Content = result ? "Файл успешно загружен" : "Ошибка загрузки файла";
                           LoadListView();
                        }));
                    }
                    catch (Exception ex)
                    {
                        StatusOperation.Content = "Ошибка загрузки файла: " + ex.Message;
                    }
                    finally
                    {
                        Dispatcher.BeginInvoke((Action)(() =>
                        {
                            NewFileAdd_Button.IsEnabled = true;
                        }));
                    }
                });
                task.Start();
            }
        }


        /// <summary>
        /// Добавление папки
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        void AddFolderButton_OnClick(object sender, RoutedEventArgs e)
        {
            string newFolder = AddFolerName_TextBox.Text;
            Regex rgx = new Regex(@"^[a-z0-9а-яё\- _]+$", RegexOptions.IgnoreCase);
            if (!rgx.IsMatch(newFolder))
            {
                MessageBox.Show("Не допустимые символы в название дериктории");
                return;
            }

            StatusOperation.Content = "Создание дериктории...";
            addFolder_Button.IsEnabled = false;
            Task task = new Task(() =>
            {
                bool result = false;
                try
                {

                    result = Worker.CreateFolder(Worker.currentFolder + newFolder + "/");
                    Dispatcher.BeginInvoke((Action)(() =>
                    {
                        StatusOperation.Content = result ? "дериктория создана" : "Ошибка создание дериктории";
                        if (result)
                        {
                            LoadListView();
                        }
                    }));
                }
                catch (Exception ex)
                {
                    Dispatcher.BeginInvoke((Action)(() =>
                   {
                       StatusOperation.Content = "Ошибка создание дериктории: " + ex.Message;
                   }));
                }
                finally
                {
                    Dispatcher.BeginInvoke((Action)(() =>
                    {
                        StatusOperation.Content = result ? "дериктория создана" : "Ошибка создание дериктории";
                        addFolder_Button.IsEnabled = true;
                        NewFileAdd_Button.IsEnabled = true;
                    }));


                }
            });
            task.Start();
        }


        //Скачать файл
        private void DownloadFileContextMenu_OnClick(object sender, RoutedEventArgs e)
        {

            if (filesfolderslistView.SelectedIndex == -1)
            {
                return;
            }

            DirictoryFile selectedObj = (DirictoryFile)filesfolderslistView.SelectedItem;
            if (selectedObj.Type != TYPE_FILE_FOLDER.FILE)
            {
                return;
            }



            StatusOperation.Content = "Скачка файла...";

            Task task = new Task(() =>
            {
                bool result = false;
                try
                {
                    FileDialog openFileDialog1 = new SaveFileDialog();
                    Nullable<bool> isSave = openFileDialog1.ShowDialog();
                    if (isSave == true)
                    {
                        using (BinaryWriter br = new BinaryWriter(System.IO.File.Open(openFileDialog1.FileName, FileMode.Create)))
                        {
                            result = Worker.DownloadFile(selectedObj.File.Id, br.BaseStream, selectedObj.File.Length);
                            StatusOperation.Content = result ? "Файл успешно скачен" : "Ошибка скачки файла";

                        }
                    }

                }
                catch (Exception ex)
                {
                    Dispatcher.BeginInvoke((Action)(() =>
                    {
                        StatusOperation.Content = "Ошибка загрузки файла: " + ex.Message;
                    }));

                }
            });
            task.Start();
        }

        /// <summary>
        /// Нажатие на элеметнте в списке
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        protected void HandleDoubleClick(object sender, MouseButtonEventArgs e)
        {
            if (filesfolderslistView.SelectedIndex == -1)
            {
                return;
            }

            DirictoryFile selectedObj = (DirictoryFile)filesfolderslistView.SelectedItem;
            if (selectedObj != null && selectedObj.Type == TYPE_FILE_FOLDER.FOLDER)
            {
                if (selectedObj.Name == "..")
                {
                    Worker.currentFolder = getPrevPath(Worker.currentFolder);
                }
                else
                {
                    Worker.currentFolder = Worker.currentFolder + selectedObj.Name + "/";
                }
            }
            else
            {
                DownloadFileContextMenu_OnClick(sender, null);
            }

            LoadListView();

        }

        /// <summary>
        /// Возвращает путь каталога выше
        /// 
        /// </summary>
        /// <param name="curentPath">Текущйи путь. например, /root/g/</param>
        /// <returns>вернет /root/</returns>
        private string getPrevPath(string curentPath)
        {
            Regex rgx = new Regex(@"/(\w+)\/$");
            string path = rgx.Replace(curentPath, "") + "/";

            return path == "" ? "/" : path;

        }

        private void GoToHome_Click(object sender, RoutedEventArgs e)
        {
            if (!String.Equals(Worker.currentFolder, "/"))
            {
                Worker.currentFolder = "/";
                LoadListView();
            }
        }

        private void GoToPrevFolder_Click(object sender, RoutedEventArgs e)
        {
            Worker.currentFolder = getPrevPath(Worker.currentFolder);
            Worker.currentFolder += "/";
            LoadListView();
        }
    }
}
