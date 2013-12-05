<style>
    
    .content {
        width: 800px;
        height: 400px;
        position: absolute;
        top: 50%;
        margin-top: -200px;
        margin-left: -400px;
        left: 50%;
    }
    
    .left_container {
        float:left; 
        width: 350px; height: 400px;
        border-right: 1px solid #00cce4;
    }
    .right_container {
        float: right;
        width: 445px;height: 400px;
    }
    
    .right_container img {
        margin-left: 20px;
    }
    
</style>
<div class="content">
    
    <div class="left_container">
        <?= $auth ?>
        <br>
        <?=(isset($error) ? $error : '') ?>
    </div>
    <div class="right_container">
        <img src="/img/server.jpg" width="360" height="240" style="margin-bottom:12px;">
        <div style="text-align:center">
            Скачать клиента!<br><br>
            <a href ="" style="padding:11px 80px;background-color:#00cce4; color: #fff;">
                Скачать
            </a>
        </div>
             
    </div>
    
</div>