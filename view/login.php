<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../public/assets/Login/style.css">
    <title>Login</title>
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
        <input type="submit" class="btn" value="Sign In">
        <a href="hola" class="btn btn-block btn-social btn-facebook">
            <i class="fa fa-facebook"></i>
              Página de Facebook de Jezoar
        </a>
    </form>
</body>
</html>