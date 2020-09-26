<?php

session_start();
$userid=$_SESSION['user']['id'];
session_unset();
session_destroy();
setcookie('user','apaaja',time()-3600*24,'/');
setcookie('sec','apaaja',time()-3600*24,'/');
include './../database/connect.php';
$sql="UPDATE users_tbl SET Cookie='',Cookie_exp='0' WHERE id='$userid'";
$result = $connect->query($sql);
header("Location: ./../login.php");