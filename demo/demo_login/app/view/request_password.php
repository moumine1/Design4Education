<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../web/css/reset_password.css">
    <title>REQUEST</title>
</head>

<body>
    <div class="container">
        <form action="../controller/request_password_C.php" method="post">
            <div class="errors">
                <span>
                    <?php echo $msg_error; ?>
                </span>
            </div>
            <div class="request_info">
                <label>User</label>
                <input type="text" name="login_id_request">
            </div>
            
            <input type="submit" name="btn_request" value="Send require reset Password">
            
        </form>
    </div>
</body>
</html>