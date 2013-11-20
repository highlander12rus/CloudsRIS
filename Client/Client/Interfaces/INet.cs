using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace Client.Interfaces
{
    interface INet
    {
        /// <summary>
        /// Отправляет файл на сервер
        /// </summary>
        /// <param name="pathToFile">Полный путь к файлу на локальном компьютере</param>
        /// <param name="sizeFile">Размер файла</param>
        /// <param name="ip">ip-адрес сервера</param>
        /// <returns></returns>
        bool SendFile(string pathToFile, ulong sizeFile, string ip);
        /// <summary>
        /// Скачивает файл с сервера на локальный компьютер
        /// </summary>
        /// <param name="pathToFile">Полный путь, куда сохранить файл на локальном компьютере</param>
        /// <param name="Token">Уникальный идентификатор операции</param>
        /// <param name="sizeFile">Размер получаемого файла</param>
        /// <returns></returns>
        bool ReceiveFile(string pathToFile, string Token, ulong sizeFile);
    }
}
