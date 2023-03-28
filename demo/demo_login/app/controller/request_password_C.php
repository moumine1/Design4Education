<?php
include '../model/admin.php';
session_start();

$request_succ = "";
$id_check = $msg_error='';

if(isset($_POST['btn_request'])){
    if (empty($_POST['login_id_request'])){
        $msg_error = 'Please enter login id.';
    } else {
        $id_check = $_POST['login_id_request'];
        if (strlen($id_check) < 4) {
            $msg_error = 'Please enter login id at least 4 characters.';
        } else{
            $row_check = is_id_exists($id_check);
            if ($row_check == false){
                $msg_error= "Login id is not exists";
            } 
        }
    }
}
require_once '../view/request_password.php';  
if(isset($_POST['btn_request'])){
    if (empty($msg_error)) {
        $_SESSION['login_id'] = $id_check;
        $request_succ = request_pwd($_SESSION['login_id']);
    
    if ($request_succ == true){
        unset($_SESSION['login_id']);
        echo "<script>
                alert('Request Successfull'); 
                window.location.href='../view/login.php';
            </script>"; 
        
    }
}
}


?>
