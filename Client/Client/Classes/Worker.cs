using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Security.Cryptography.X509Certificates;
using System.Text;
using System.Windows;
using Client.Interfaces;
using Microsoft.Win32;

namespace Client.Classes
{
    internal static class Worker
    {
        public static IUser userClass = User.getIUser();
        public static IFile fileClass = Files.getInterface();
        public static IFolder folderClass = Folder.getInterface();
        public static ICrypt cryptClass = Crypt.getICrypt();
        private static string tokenAuth = "";
        public static string currentFolder = "/";
        public static bool isCreationFile = true;
        public static string pathForCreation = "";
        public static bool isOperationInCurFolder = true;



        public static bool Autorization(string login, string password)
        {
            tokenAuth = userClass.Authorize(login, password);
            if (tokenAuth == "Логин или пароль неверны")
                return false;
            return true;

        }

        public static bool CreateFolder(string path)
        {
            return folderClass.CreateFolder(path, tokenAuth);
        }

        public static bool DeleteFolder(string path)
        {
            return folderClass.DeleteFolder(path, tokenAuth);
        }

        public static Dictionary<string, List<string>> GetFolderContent(string path)
        {
            return folderClass.GetFolderContent(path, tokenAuth);
        }

        public static bool CreateFile(string name, string pathToFolder, string cryptMethod)
        {
            try
            {
                FileDialog openFileDialog1 = new OpenFileDialog();
                Nullable<bool> result = openFileDialog1.ShowDialog();
                bool res = false;
                if (result == true)
                {
                    string filename = openFileDialog1.FileName;
                    string cryptFilePath = cryptClass.FileCrypt(filename);
                    string md5 = cryptClass.CalculateMd5(cryptFilePath);
                    FileInfo file = new FileInfo(filename);
                    long size = file.Length;
                    using (BinaryReader br = new BinaryReader(File.Open(cryptFilePath, FileMode.Open)))
                    {
                        res = fileClass.CreateFile(name, pathToFolder, md5, (ulong)size, cryptMethod, tokenAuth,
                                                   br.BaseStream);
                    }
                    File.Delete(cryptFilePath);
                }

                return res;
            }
            catch (Exception)
            {
                return false;
                
            }
            
        }

        public static bool DownloadFile(string name, string pathToFolder)
        {
            FileDialog openFileDialog1 = new SaveFileDialog();
            Nullable<bool> result = openFileDialog1.ShowDialog();
            bool res = false;
            if (result == true)
            {
                string filename = openFileDialog1.FileName;
                using (BinaryReader br = new BinaryReader(File.Open(filename + "TMP", FileMode.Create)))
                {
                    res = fileClass.GetFile(name, pathToFolder, tokenAuth, br.BaseStream);
                }
                res = cryptClass.FileDecrypt(filename + "TMP", filename);
                File.Delete(filename + "TMP");
            }
            return res;
        }
    }
}
