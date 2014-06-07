using System;
using System.Collections.Generic;
using System.IO;
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


        public static Dirictory GetFolderContent(string path)
        {
            return folderClass.GetFolderContent(path, tokenAuth);
        }

        /// <summary>
        /// СОздает файл
        /// </summary>
        /// <param name="fileName">Имя создаваймого файла</param>
        /// <param name="pathToFolder">Полынй путь до дериктории на сервер куда грузим файл</param>
        /// <param name="fileSize">размер  файла в байтах</param>
        /// <param name="fulPathToFile">путь до файла с именем файла на локальном компьютере</param>
        /// <returns></returns>
        public static bool CreateFile(string fileName, string pathToFolder, long fileSize, Stream stream)
        {
            try
            {
                return fileClass.CreateFile(fileName, pathToFolder, fileSize, tokenAuth, stream);
            }
            catch (Exception ex)
            {
                return false;

            }

        }

        public static bool DownloadFile(string fileId, Stream stream, long fileSize)
        {
            return fileClass.GetFile(fileId, tokenAuth, stream, fileSize);
        }
    }
}
