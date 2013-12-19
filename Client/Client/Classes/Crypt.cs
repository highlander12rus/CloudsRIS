using System;
using System.IO;
using System.Security.Cryptography;
using System.Text;
using Client.Interfaces;



namespace Client.Classes
{

    class Crypt : ICrypt
    {
        private const int BLOCK_SIZE = 8192;
        private const string PATH_TO_KEY = "key";
        private const string PATH_TO_IV = "iv";
        private static byte[] KEY;
        private static byte[] IV;

        public Crypt()
        {
            GenerateKeyIV();
        }
        string ICrypt.PasswordCrypt(string password)
        {
            SHA512 sha512 = new SHA512Managed();
            byte[] result;
            result = sha512.ComputeHash(Encoding.UTF8.GetBytes(password));
            return BitConverter.ToString(result).Replace("-", "");
        }

        string ICrypt.FileCrypt(string pathToFile)
        {
            
            if (File.Exists(pathToFile))
            {
                using (Aes aes = Aes.Create())
                {
                    using (var br = new BinaryReader(new FileStream(pathToFile, FileMode.Open)))
                    {
                        
                        using (var bw = new BinaryWriter(new FileStream(pathToFile+"TMP", FileMode.Create)))
                        {
                            
                            bw.Write(EncryptBytes(br.ReadBytes(LengthFIleInBytes(pathToFile))));
                        }
                    }
                }

                return pathToFile + "TMP";
            }
            else return "";
        }

        bool ICrypt.FileDecrypt(string pathFileSource, string pathFileDest)
        {
            if (File.Exists(pathFileSource))
            {
                using (Aes aes = Aes.Create())
                {
                    using (var br = new BinaryReader(new FileStream(pathFileSource, FileMode.Open)))
                    {

                        using (var bw = new BinaryWriter(new FileStream(pathFileDest, FileMode.Create)))
                        {

                            bw.Write(DecryptBytes(br.ReadBytes(LengthFIleInBytes(pathFileSource))));
                        }
                    }
                }

                return true;
            }
            else return false;
        }

        string ICrypt.CalculateMd5(string pathFile)
        {
            
            var sb = new StringBuilder();

            MD5 md5Hasher = MD5.Create();

            using (FileStream fs = File.OpenRead(pathFile))
            {
                foreach (Byte b in md5Hasher.ComputeHash(fs))
                    sb.Append(b.ToString("x2").ToLower());
            }

             return sb.ToString();

        }

        static byte[] EncryptBytes(byte[] block)
        {

            byte[] encrypted;
            
            using (Aes aesAlg = Aes.Create())
            {
                aesAlg.Key = KEY;
                aesAlg.IV = IV;

                // Create a decrytor to perform the stream transform.
                ICryptoTransform encryptor = aesAlg.CreateEncryptor(aesAlg.Key, aesAlg.IV);

                // Create the streams used for encryption.
                using (MemoryStream msEncrypt = new MemoryStream())
                {
                    using (CryptoStream csEncrypt = new CryptoStream(msEncrypt, encryptor, CryptoStreamMode.Write))
                    {
                        using (BinaryWriter swEncrypt = new BinaryWriter(csEncrypt))
                        {

                            //Write all data to the stream.
                            swEncrypt.Write(block);
                        }
                        encrypted = msEncrypt.ToArray();
                    }
                }
            }


            // Return the encrypted bytes from the memory stream.
            return encrypted;
        }
        static byte[] DecryptBytes(byte[] block)
        {
            byte[] result;
            
            using (Aes aesAlg = Aes.Create())
            {
                aesAlg.Key = KEY;
                aesAlg.IV = IV;

                // Create a decrytor to perform the stream transform.
                ICryptoTransform decryptor = aesAlg.CreateDecryptor(aesAlg.Key, aesAlg.IV);

                // Create the streams used for decryption.
                using (MemoryStream msDecrypt = new MemoryStream(block))
                {
                    using (CryptoStream csDecrypt = new CryptoStream(msDecrypt, decryptor, CryptoStreamMode.Read))
                    {
                        using (BinaryReader srDecrypt = new BinaryReader(csDecrypt))
                        {

                            result = ReadAllBytes(csDecrypt);
                        }
                    }
                }

            }

            return result;

        }
        static private byte[] ReadAllBytes(Stream stream)
        {
            using (var ms = new MemoryStream())
            {
                stream.CopyTo(ms);
                return ms.ToArray();
            }
        }
        /// <summary>
        /// Генерирует Key, IV необходимые для шифрования AES
        /// </summary>
        /// <returns>true, успешно сгенерированы
        /// false, генерация не удалась (возможно, ключи уже есть)</returns>
        
        private void GenerateKeyIV()
        {
            if (!File.Exists(PATH_TO_KEY) && !File.Exists(PATH_TO_IV))
            {

                AesManaged aes = new AesManaged();
                aes.GenerateKey();
                aes.GenerateIV();
                using (var bwKey = new BinaryWriter(new FileStream(PATH_TO_KEY, FileMode.Create)))
                {
                    bwKey.Write(aes.Key);
                }
                using (var bwIV = new BinaryWriter(new FileStream(PATH_TO_IV, FileMode.Create)))
                {
                    bwIV.Write(aes.IV);
                }
            }
            else
            {
                using (var brKey = new BinaryReader(new FileStream(PATH_TO_KEY, FileMode.Open)))
                {
                    KEY = brKey.ReadBytes(LengthFIleInBytes(PATH_TO_KEY));
                }
                using (var brIV = new BinaryReader(new FileStream(PATH_TO_IV, FileMode.Open)))
                {
                    IV = brIV.ReadBytes(LengthFIleInBytes(PATH_TO_IV));
                }
            }
        }

        int LengthFIleInBytes(string path)
        {
            FileInfo f = new FileInfo(path); // Создаем объект класса, чтобы узнать длину файла в байтах
            return (int) f.Length;
        }
         internal static ICrypt getICrypt()
         {
             Crypt crypt = new Crypt();
             return crypt;
         }
    }
}
