using Client.Classes;
using System.Collections.Generic;


namespace Client.Interfaces
{
    interface IFolder
    {
        bool CreateFolder(string path, string token);


        bool DeleteFolder(string path, string token);

        /// <summary>
        /// Получения списка диикторий и файлов на сервере
        /// </summary>
        /// <param name="path">путь до дериктории на сервере которую надо поулчть</param>
        /// <param name="token"> Токен пользователя</param>
        /// <returns></returns>
        Dirictory GetFolderContent(string path, string token);
    }
}
