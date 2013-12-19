using System.Collections.Generic;

namespace Client.Interfaces
{
    interface IFolder
    {
        bool CreateFolder(string path,string token);
        /// <summary>
        /// Изменение имени папки
        /// </summary>
        /// <param name="name">старое имя папки с указанием полного пути</param>
        /// <param name="new_name">новое имя папки с указанием полного пути</param>
        /// <returns></returns>
        bool ChangeFolderName(string name, string new_name,string token);

        bool DeleteFolder(string path,string token);

        Dictionary<string, List<string>> GetFolderContent(string path, string token);
    }
}
