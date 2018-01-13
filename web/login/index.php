<!DOCTYPE html>
<html lang='pt-BR'>
    <head>
        <?php require '../commons/header.php';?>
        <title>Imobille Site - Login</title>
        <link rel='stylesheet' type='text/css' href='../resources/login/css/login.css'/>
        <script type='text/javascript' src='../resources/login/js/login.js'></script>
    </head>
    <body>
        <div class="page">
            <?php require '../commons/navbar.php';?>
            <div class="content">
                <div class="user">
                    <div class="user-img" style="background-image: url(../resources/main/images/users/nouser.jpg);"></div>
                </div>
                <div class="box-login">
                    <input type="text" id="login" placeholder="login">
                    <input type="password" id="password" placeholder="senha">
                    <a href="javascript:void(0);" onclick="login();" class="btn-login">Login</a>
                </div>
            </div>
        </div>
    </body>
</html>