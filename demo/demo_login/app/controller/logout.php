<?php
// back to login page
session_start();
session_destroy();
header("location: ../view/login.php");