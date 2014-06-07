using System.IO;

namespace Client.Interfaces
{
    interface IFile
    {
        bool CreateFile(string fileName, string pathToFolder, long fileSize, string userToken, Stream stream);

        bool ChangeFileName(string name, string pathToFolder, string newName, string token);
        bool DeleteFile(string name, string pathToFolder, string token);


        bool GetFile(string fileId, string token, Stream stream, long fileSize); 
    }
}
