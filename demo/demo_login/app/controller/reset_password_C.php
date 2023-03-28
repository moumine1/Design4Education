<?php 
include '../model/admin.php';
require_once '../common/common.php'; // điều kiện nếu chưa login thì xuất ra màn hình login 
//session_start();

$list_info = info_request();
$msg_error= $pass_new = '';

if(isset($_POST['btn_reset'])){
    if (empty($_POST['password_new'])){
        $msg_error ='Please enter the new password.';
    } else {               
        if (strlen($_POST['password_new']) < 6) {
            $msg_error= 'Please enter a password of at least 6 characters.';
        }   
    } 
}  
    
require_once '../view/reset_password.php'; 

if(isset($_POST['btn_reset'])){
    if(empty($msg_error)){
        $pass_new = $_POST['password_new'];
        $reset_succ = reset_pwd($_REQUEST['id_reset'],$pass_new); 
        if($reset_succ){
            echo "<script>
                    alert('Reset Successfull'); 
                    window.location.href='../controller/reset_password_C.php';
                </script>";  
        }
        
    }  
}  


?>
