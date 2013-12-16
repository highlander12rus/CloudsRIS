using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace Client.Interfaces
{
    interface IUser
    {
        string Authorize(string login, string password);
        string GetUserInfo(string token);//Todo: пнуть Илью
        bool EditUserInfo(string name,string email,string token);
    }
}
