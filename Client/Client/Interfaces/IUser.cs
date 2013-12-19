
namespace Client.Interfaces
{
    interface IUser
    {
        string Authorize(string login, string password);
        string GetUserInfo(string token);//Todo: пнуть Илью
        bool EditUserInfo(string name,string email,string token);
    }
}
