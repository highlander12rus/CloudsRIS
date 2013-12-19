<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
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
    
    .regist {
        display: none; 
        background-color: #fff; 
        width: 400px; height: 400px; 
        position: absolute; 
        top: 50%;
        margin-top: -200px;
        left: 50%;
        margin-left: -200px;
        border: 2px solid #00cce4;
    }
    .regist a {
        margin: 5px;
    } 
    
    .error {
        margin-left: 60px;
        color: red;
        font-size: 14px;
    }
</style>

<div class="auth">
    <h2>CloudsRIS</h2><br>
    <form id="athorization" action="/autorization" method="post">
        <input id="email" type="text" name="email" value="Ваш email" onclick="if(this.value=='Ваш email'){this.value='';}" onblur="if(this.value==''){this.value='Ваш email';}"><br>
        <input id="password" type="password" name="password" value="пароль" onclick="if(this.value=='пароль'){this.value='';}" onblur="if(this.value==''){this.value='пароль';}"><br>
        <input name="login" type="submit" value="Войти" class="button"><br>
    </form>
    <br>
    <a href="javascript:void(0)" onclick="$('#registration').show(200)" style=" margin-left: 60px; padding:11px 80px;background-color:#00cce4; color: #fff;">
                Регистрация
            </a>
</div> 

<div id="registration" class="auth regist">
    <a href="javascript:void(0)" onclick="$('#registration').hide()">Закрыть</a>
    <h2>Регистрация</h2><br>
    <form id="form_registration" action="/registration" method="post">
        <input id="email" type="text" name="email" value="Ваш email" onclick="if(this.value=='Ваш email'){this.value='';}" onblur="if(this.value==''){this.value='Ваш email';}"><br>
        <input id="password" type="password" name="password" value="пароль" onclick="if(this.value=='пароль'){this.value='';}" onblur="if(this.value==''){this.value='пароль';}"><br>
        <input style="width:230px" type="text" name="name" value="ФИО" onclick="if(this.value=='ФИО'){this.value='';}" onblur="if(this.value==''){this.value='ФИО';}"><br>
        <input type="submit" value="Зарегистрироваться" class="button"><br>
    </form>
</div>
<script>
    $('#athorization').validate({
        rules: {
            email:{
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 6,
                maxlength: 16,
            },
        },
        messages: {
            email:{
                required: "Это поле должно быть заполнено",
                email: "Не похоже на емайл адрес",
            },
            password: {
                required: "Как мы без пароля?",
                minlength: "минимальная длинна 6 сиволов",
                maxlength: "максимальная длинна 16 сиволов",
            },
        }
    });
    
    $('#form_registration').validate({
        rules: {
            email:{
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 6,
                maxlength: 16,
            },
            name: {
                 required: true,
            },
        },
        messages: {
            email:{
                required: "Это поле должно быть заполнено",
                email: "Не похоже на емайл адрес",
            },
            password: {
                required: "Как мы без пароля?",
                minlength: "минимальная длинна 6 сиволов",
                maxlength: "максимальная длинна 16 сиволов",
            },
            name: {
                 required: true,
            },
        }
    });
</script>