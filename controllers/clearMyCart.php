<?php
include './../database/connect.php';
session_start();

if($_SESSION['user']['id'] === $_POST['UseID']){
	$id = $_SESSION['user']['id'];
    // echo $_POST['UseID'];
    $query = "DELETE FROM cart_tbl WHERE userId = $id";
    mysqli_query($connect,$query);
}