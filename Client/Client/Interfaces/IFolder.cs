using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace Client.Interfaces
{
    interface IFolder
    {
        bool CreateFolder(string name);
        /// <summary>
        /// Изменение имени папки
        /// </summary>
        /// <param name="name">старое имя папки с указанием полного пути</param>
        /// <param name="new_name">новое имя папки с указанием полного пути</param>
        /// <returns></returns>
        bool ChangeFolderName(string name, string new_name);

        bool DeleteFolder(string path);

        bool GetFolderContent(string path);
    }
}
