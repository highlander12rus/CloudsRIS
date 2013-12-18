using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Diagnostics;
using System.IO;
using System.Linq;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Controls.Primitives;
using System.Windows.Data;
using System.Windows.Input;
using System.Windows.Markup;
using System.Windows.Threading;
using System.Xml;
using Client.Classes;

namespace Client
{

    public partial class FileWindow : Page
    {
        private Client.Model.Directory filesfolderObj;
        private List<Client.Model.Directory> files;
        private List<Client.Model.Directory> folders;
        private bool WasSetFileName;

        public FileWindow()
        {
            InitializeComponent();
            CurFolder.Content += Worker.currentFolder;
            LoadListView();
        }


        private void LoadListView()
        {

            Dictionary<string, List<string>> files_folders = Worker.GetFolderContent(Worker.currentFolder);//new Dictionary<string, List<string>>());
            if (files_folders != null)
            {
                files =
                    (from f in files_folders["files"] select new Client.Model.Directory { Name = f, Type = "Файл" })
                        .ToList();
                folders =
                    (from f in files_folders["folders"]
                     select new Client.Model.Directory { Name = f.Substring(1), Type = "Папка" }).ToList();
                foreach (var folder in folders)
                {
                    filesfolderslistView.Items.Add(folder);
                }
                foreach (var file in files)
                {
                    filesfolderslistView.Items.Add(file);
                }
            }

        }

        // добавить файл
        private void AddFileContextMenu_OnClick(object sender, RoutedEventArgs e)
        {
            TextBoxNewName.Visibility = System.Windows.Visibility.Visible;
            LabelNewName.Visibility = System.Windows.Visibility.Visible;

            if (filesfolderslistView.SelectedIndex > -1)
            {
                filesfolderObj = new Client.Model.Directory();
                filesfolderObj = (Client.Model.Directory)filesfolderslistView.SelectedItem;

                if (filesfolderObj.Type == "Файл")
                {
                    Worker.pathForCreation = Worker.currentFolder;
                    Worker.isCreationFile = true;
                    Worker.isOperationInCurFolder = true;

                }
                else
                {
                    Worker.pathForCreation = Worker.currentFolder + filesfolderObj.Name + "/";
                    Worker.isCreationFile = true;
                    Worker.isOperationInCurFolder = false;

                }

            }
            else
            {
                Worker.pathForCreation = Worker.currentFolder;
                Worker.isCreationFile = true;
                Worker.isOperationInCurFolder = true;

            }
        }

        // добавить папку
        private void AddFolderContextMenu_OnClick(object sender, RoutedEventArgs e)
        {
            TextBoxNewName.Visibility = System.Windows.Visibility.Visible;
            LabelNewName.Visibility = System.Windows.Visibility.Visible;

            if (filesfolderslistView.SelectedIndex > -1)
            {
                filesfolderObj = new Client.Model.Directory();
                filesfolderObj = (Client.Model.Directory)filesfolderslistView.SelectedItem;

                if (filesfolderObj.Type == "Файл")
                {
                    Worker.pathForCreation = Worker.currentFolder;
                    Worker.isCreationFile = false;
                    Worker.isOperationInCurFolder = true;

                }
                else
                {
                    Worker.pathForCreation = Worker.currentFolder + filesfolderObj.Name + "/";
                    Worker.isCreationFile = false;
                    Worker.isOperationInCurFolder = false;

                }

            }
            else
            {
                Worker.pathForCreation = Worker.currentFolder;
                Worker.isCreationFile = false;
                Worker.isOperationInCurFolder = true;

            }
        }

        // удалить папку
        private void DeleteContextMenu_OnClick(object sender, RoutedEventArgs e)
        {
            if (filesfolderslistView.SelectedIndex > -1)
            {
                filesfolderObj = new Client.Model.Directory();
                filesfolderObj = (Client.Model.Directory)filesfolderslistView.SelectedItem;

                if (filesfolderObj.Type == "Папка")
                {
                    bool result = Worker.DeleteFolder(Worker.currentFolder + filesfolderObj.Name);
                    if (result)
                    {
                        filesfolderslistView.Items.Remove(filesfolderslistView.SelectedItem);// remove the selected Item
                        filesfolderslistView.Items.Refresh();
                        State.Content = "Папка была успешно удалена";
                    }
                    else State.Content = "Папка не была удалена";

                }
            }
        }

        //Скачать файл
        private void DownloadFileContextMenu_OnClick(object sender, RoutedEventArgs e)
        {
            if (filesfolderslistView.SelectedIndex > -1)
            {
                filesfolderObj = new Client.Model.Directory();
                filesfolderObj = (Client.Model.Directory)filesfolderslistView.SelectedItem;


                if (filesfolderObj.Type == "Файл")
                {
                    bool result = Worker.DownloadFile(filesfolderObj.Name, Worker.currentFolder);
                    if (result) State.Content = "Файл был успешно скачан";
                    else State.Content = "Произошла ошибка во время скачивания файла";
                }
            }
        }

        private void TextBoxNewName_KeyUp(object sender, System.Windows.Input.KeyEventArgs e)
        {

            if (e.Key != Key.Enter) return;
            TextBoxNewName.Visibility = System.Windows.Visibility.Hidden;
            LabelNewName.Visibility = System.Windows.Visibility.Hidden;
            if (Worker.isCreationFile)
            {
                if (TextBoxNewName.Text.StartsWith("/"))
                {
                    State.Content = "Имя не должно начинаться с символа /";
                    return;
                }
                var result = Worker.CreateFile(TextBoxNewName.Text, Worker.pathForCreation, "AES");
                if (result) State.Content = "Файл был успешно добавлен";
                else State.Content = "Произошла ошибка при добавлении файла";
                if (result && Worker.isOperationInCurFolder) filesfolderslistView.Items.Add(new Client.Model.Directory { Name = TextBoxNewName.Text, Type = "Файл" });
            }
            else
            {
                if (TextBoxNewName.Text.StartsWith("/"))
                {
                    State.Content = "Имя не должно начинаться с символа /";
                    return;
                }
                var result = Worker.CreateFolder(Worker.pathForCreation + TextBoxNewName.Text);
                if (result) State.Content = "Папка была успешно создана";
                else State.Content = "Произошла ошибка при создании папки";
                if (result && Worker.isOperationInCurFolder) filesfolderslistView.Items.Add(new Client.Model.Directory { Name = TextBoxNewName.Text, Type = "Папка" });
            }
            filesfolderslistView.Items.Refresh();
        }
        protected void HandleDoubleClick(object sender, MouseButtonEventArgs e)
        {
            filesfolderObj = new Client.Model.Directory();
            filesfolderObj = (Client.Model.Directory)filesfolderslistView.SelectedItem;

            if (filesfolderObj.Type == "Папка")
            {
                filesfolderslistView.Items.Clear();
                CurFolder.Content += filesfolderObj.Name;
                Worker.currentFolder += filesfolderObj.Name;
                LoadListView();
                Worker.currentFolder += "/";
                //MessageBox.Show(filesfolderObj.Name);
            }

        }
    }
}
