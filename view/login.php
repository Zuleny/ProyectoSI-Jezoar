<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../public/assets/Login/style.css">
    <title>Login Jezoar</title>
</head>
<body>
    <form class="login-box" method="get" action="../controller/loginController.php">
        <h1>Login</h1>
        <div class="textbox">
            <i class="fa fa-user text-aqua" aria-hidden="true"></i>
            <input type="text" placeholder="Username" name="username">
        </div>
        <div class="textbox">
            <i class="fa fa-fw fa-lock" aria-hidden="true"></i>
            <input type="password" placeholder="Password" name="password">
        </div>
        <button type="submit" class="btn">
                Sig In
        </button>
        <a href="https://www.facebook.com/Jezoar-228770924276961/">
            <button type="button" class="btn btn-block btn-social btn-facebook">
                <i class="fa fa-facebook"></i>
                    Facebook Jezoar's
            </button>
        </a>
        <a href="gestionDeUsuario/forgotMyPassword.php">
            <button type="button" class="btn btn-block">
                <i class="fa fa-fw fa-frown-o"></i>
                    I Forgot my password
            </button>
        </a>
    </form>
</body>
</html>