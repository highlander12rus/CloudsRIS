using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace Client.Interfaces
{
    interface IFile
    {
        byte CreateFile (string name,string pathToFolder,string md5Hash, ulong fileSize,string securityMethod);
        bool ChangeFileName(string name, string pathToFolder, string newName);
        bool DeleteFile(string name, string pathToFolder);
        bool GetFile(string name, string pathToFolder); //todo: уточнить
    }
}
