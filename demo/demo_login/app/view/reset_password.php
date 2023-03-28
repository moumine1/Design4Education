<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../web/css/reset_password.css">
    <title>RESET PASSWORD</title>
</head>
<body>
    <form action="../controller/reset_password_C.php" method="POST">
        <div class="errors">
            <span><?= $msg_error ?></span>
        </div>

        <table>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>User Name</th>
                    <th>New Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list_info as $key => $value) : ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><input class="input_readonly" name="id_reset" value="<?= $value['login_id'] ?>" readonly></td>
                        <td><input type="text" name="password_new"></td>
                        <td><input type="submit" name="btn_reset" value="Reset"></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <div><br><br><a href="../view/home.php">Back to HomePage</a></div>
    </form>
</body>
</html>
