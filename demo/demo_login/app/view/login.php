<?php
    require_once '../common/db.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>LOGIN</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../web/css/login.css">
</head>
<body>
    <form method='POST' action="">
        <div class="errors">
        <span><?php require_once '../controller/error_login.php'?></span>
        </div>
        
        <div class="name">
            <label>User</label>
            <input type='textbox' name='loginid' value="<?php echo isset($_POST['login']) ? $_POST['loginid'] : "" ?>">                 
        </div>

        <div class="password">
            <label>Password</label>
            <input type='password' name='password' value="<?php echo isset($_POST['login']) ? $_POST['password'] : "" ?>">
        </div>
        
        <div class="request">
            <a href="../controller/request_password_C.php"><em>Forgot password</em></a>       
        </div>
        
        <input type='submit' name='login' value='Login'>
    </form>
</body>
</html>