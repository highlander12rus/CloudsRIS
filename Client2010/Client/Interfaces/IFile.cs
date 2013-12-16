using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

namespace Client.Interfaces
{
    interface IFile
    {
        byte CreateFile (string name,string pathToFolder,string md5Hash, ulong fileSize,string securityMethod,string token,Stream stream);
        bool ChangeFileName(string name, string pathToFolder, string newName, string token);
        bool DeleteFile(string name, string pathToFolder, string token);
        bool GetFile(string name, string pathToFolder, string token); //todo: уточнить
    }
}
