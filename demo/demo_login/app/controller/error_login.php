<?php 
    $_error = array();
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['login'])) {
            if (empty($_POST['loginid'])){
                $_error['loginid'] ='Please enter login id.';
            } 
            elseif (strlen($_POST['loginid']) < 4) {
                $_error[] ='Please enter login id at least 4 characters.';
            } else {
                $user_name = $_POST['loginid'];
            }

            if (empty($_POST['password'])){
                $_error['password'] ='Please enter the password.';
            } 
            elseif (strlen($_POST['password']) < 6) {
                $_error[] ='Please enter a password of at least 6 characters.';
            } else {
                $password = md5($_POST['password']);
            }
                    
            if (!empty($_POST['loginid']) && !empty($_POST['password'])) {
                $sql_admin = "SELECT * FROM admins WHERE login_id=? LIMIT 1"; 
                $statement_admin = $conn->prepare($sql_admin);
                $statement_admin->bindParam(1, $user_name, PDO::PARAM_STR);
                $statement_admin->execute();
                $row = $statement_admin->fetch(PDO::FETCH_ASSOC);
                if(is_array($row)) {
                    if ($row['password'] == $password) {
                        $_SESSION['loginned'] = true;
                        $_SESSION['loginid'] = $_POST["loginid"];
                        header('location: home.php');
                    } else {
                        $_error[] ='The password is incorrect.';
                    } 
                } else {
                    $_error[] ='Account does not exist.';
                }
            }
        }
        if(!empty($_error)) { 
            foreach ($_error as $v) {
                echo $v .'</br>';
            } 
        }
    }
?>
