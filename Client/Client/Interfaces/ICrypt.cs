using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace Client.Interfaces
{
    interface ICrypt
    {
        string PasswordCrypt(string password);
        /// <summary>
        /// Шифрование файла
        /// </summary>
        /// <param name="pathToFile"> Полный путь к файлу на локальном компьютере</param>
        /// <returns>Полный путь к зашифрованному файлу на локальном компьютере</returns>
        string FileCrypt(string pathToFile);
        /// <summary>
        /// Дешифрование файла
        /// </summary>
        /// <param name="pathFileSource">Полный путь к зашифрованному файлу на локальном копмпьютере</param>
        /// <param name="pathFileDest">Полный путь на локальном компьютере к новому файлу, полученному путем расшифрования </param>
        /// <returns></returns>
        bool FileDecrypt(string pathFileSource,string pathFileDest );

        string CalculateMd5(string pathFile);

    }
}
