using System;
using Client.Classes;
using Microsoft.VisualStudio.TestTools.UnitTesting;


namespace TestClient
{
    [TestClass]
    public class TestClient
    {
        [TestMethod]
        public void TestAuthorize()
        {
            var user = new User();
            var token = user.Authorize("ilia12r@gmail.com", "ilya");//FB4579611A1C7831F69AEBF64363D69EF69F8D9B74C9FE595448403542A43D4367EC727A01D0DB7DA9245E12373C105D6E6CEBEB73DBD70B6F7E5A13E0CF8C9A
            Assert.AreNotEqual("Логин или пароль неверны",token);
        }


    }
}
