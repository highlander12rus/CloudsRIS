<style>

    .auth {

    }
    
    .auth h2{
        padding-top: 80px;
        margin: 0 auto;
        width: 200px;
        font-family: Tahoma;
        font-size: 36px;

    }
    
    .auth input{
        margin-top: 10px;
        margin-left: 60px;
        padding: 8px;
        padding-left: 10px;
        width: 180px;
        border: 1px solid #00cce4;

    }
    
    #email {
        display: block;
        background: url('/img/email.jpg') no-repeat;
        padding-left: 60px;
    }
    #password {
        display: block;
        background: url('/img/pass.jpg') no-repeat;
        padding-left: 60px;
    }
    .button {
        background-color: #00cce4;
        color: #fff;
        font-size: 20px;
        width: 250px !important;
    }
</style>

<div class="auth">
    <h2>CloudsRIS</h2><br>
    
    <form action="/change_paswd" method="post">
        <p style=" font-size: 18px; margin-left: 60px;">Ваш новый пароль</p>
        <input id="password" type="password" name="password" value="пароль" onclick="if(this.value=='пароль'){this.value='';}" onblur="if(this.value==''){this.value='пароль';}"><br>
        <input name="passwd" type="submit" value="Сменить" class="button"><br>
    </form><br>
    <a href ="/exit" style="padding:11px 102px;background-color:#00cce4;  color: #fff; margin-left: 60px;">
                Выход
            </a>
</div> 