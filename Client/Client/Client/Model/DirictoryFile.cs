using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace Client.Model
{
    enum TYPE_FILE_FOLDER {
        FILE,
        FOLDER
    };

    class DirictoryFile
    {
        /// <summary>
        /// Путь до картинки
        /// </summary>
        public string Image 
        {
            get { return Type == TYPE_FILE_FOLDER.FOLDER ? "image/show_folder.png" : "image/show_file.png"; }
            set {Image = value; }
        }

        public TYPE_FILE_FOLDER Type 
        {
            get;
            set;
        }

        /// <summary>
        /// Имя файла или папки
        /// </summary>
        public string Name
        {
            get;
            set;
        }
        public System.Windows.Visibility isDelete 
        {
            get { return System.Windows.Visibility.Hidden; }
        }

        public System.Windows.Visibility isDownload
        {
            get { return Type == TYPE_FILE_FOLDER.FOLDER ? System.Windows.Visibility.Hidden : System.Windows.Visibility.Visible; }
        }


        public DirictoryFile(TYPE_FILE_FOLDER type, string name)
        {
            Name = name;
            Type = type;
        }

        public DirictoryFile(Client.Classes.File file, string name)
        {
            Name = name;
            Type = TYPE_FILE_FOLDER.FILE;
            File = file;
        }

        /// <summary>
        /// Hack для хранение инфы о файлах
        /// </summary>
        public Client.Classes.File File
        {
            get;
            set;
        }
    }
}