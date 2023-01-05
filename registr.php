<?php
include_once __DIR__ . '/incs/validation.php';
require_once __DIR__ . '/incs/data.php';
require_once __DIR__ . '/incs/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

    <form class="form" action="/incs/functions.php" method="post"><?php echo $err['success']?>
        <label for="login">Login</label>
        <input type="text" name="login" id="login" placeholder="Enter login" value="<?php echo $_POST['login']?>">
        <?php echo $err['login']?>
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password"  placeholder="Enter password">
        <?php echo $err['password']?>
        
        <label for="confirm-password">Confirm_password</label>
        <input type="password" name="confirm-password" id="confirm-password"  placeholder="Enter password">
        <?php echo $err['confirm-password']?>

        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="Enter email" value="<?php echo $_POST['email']?>">
        <?php echo $err['email']?>
        
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter Name" value="<?php echo $_POST['name']?>">
        <?php echo $err['name']?>
        
        <button class="btn">Register</button>
        <p>
            You have an account? - <a href="/index.php">Log in</a>
        </p>
    </form>
    
</body>
</html>