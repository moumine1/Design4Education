<?php
//require_once '../common/db.php';
    session_start();
    if(!($_SESSION['loginned'])){
        header("Location: ../view/login.php");
    }
?>