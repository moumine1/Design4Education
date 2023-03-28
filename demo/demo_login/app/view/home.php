<?php
require_once '../common/db.php';
require_once '../common/common.php';
$loginid = $_SESSION['loginid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>HOME</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../web/css/home.css">

</head>

<body>
    <form>

        <!-- tên login là tên đăng nhập trong màn 'Login' -->
        <div>
            <p>User login: <?php echo $loginid; ?></p>
        </div>


        <div>
            <p>Time login: <?php date_default_timezone_set('Asia/Ho_Chi_Minh');
                                echo date("Y-m-d H:i") ?></p>
        </div>
        <div>
            
        </div>
        <div><br><br><br>
            <h4><a style="text-decoration: none" href="">Reset password</a> | <a style="text-decoration: none"
                    href="../controller/logout.php">Logout</a> </h4>
        </div>
        <form>
</body>

</html>