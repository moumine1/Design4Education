<?php
include '../common/db.php';  

function is_id_exists($login_id){
    global $conn;
    $sql_admin = "SELECT * FROM admins WHERE login_id=:login_id";
    $stmt_admin = $conn->prepare($sql_admin);
    $stmt_admin->bindParam(':login_id', $login_id, PDO::PARAM_STR);
    $stmt_admin->execute();
    if ($stmt_admin->rowCount() > 0) {
        return true;
    } else 
        return false;
}

function request_pwd($login_id){
    global $conn;
    $rq_token = microtime();
    $sql_rq = 'UPDATE admins SET reset_password_token=:time_new WHERE login_id =:login_id';
    $stmt_uprequest = $conn->prepare($sql_rq);
    $stmt_uprequest->bindParam(':time_new',$rq_token, PDO::PARAM_STR);
    $stmt_uprequest->bindParam(':login_id',$login_id, PDO::PARAM_STR);
    $stmt_uprequest->execute();
    if ($stmt_uprequest){
        return true;
    } else 
        return false;
}

function info_request(){
    global $conn;
    $sql = 'SELECT * FROM admins WHERE reset_password_token != ""';
    $stmt_info = $conn->prepare($sql);
    $stmt_info->execute();
    $list_info = $stmt_info->fetchAll(PDO::FETCH_ASSOC);
    return $list_info;
}

function reset_pwd($login_id, $pw_reset){
    global $conn;
    $pass_new = md5($pw_reset);
    $sql_update = 'UPDATE admins SET password=:pw, reset_password_token =NULL WHERE login_id =:login_id';
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bindParam(':pw',$pass_new , PDO::PARAM_STR);
    $stmt_update->bindParam(':login_id',$login_id, PDO::PARAM_STR);
    $stmt_update->execute();
    if ($stmt_update){
        return true;
    } else 
        return false;
}

?>