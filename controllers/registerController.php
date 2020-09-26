<?php
include './../helpers/config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
        $userRegis = mysqli_real_escape_string($connect,$_POST['username']);
        $emailRegis = mysqli_real_escape_string($connect,$_POST['email']);
        $passRegis = password_hash(mysqli_real_escape_string($connect,$_POST['password']),PASSWORD_DEFAULT);
        
        $result = DuplicateData("SELECT * FROM users_tbl",$userRegis,$emailRegis);
        if($result === 1) header("Location:./../register.php?error=1");
        else if($result == 2) header("Location:./../register.php?error=2");
        RegisterData($userRegis,$emailRegis,$passRegis);
        echo"HALO";
        header("Location:./../login.php?succ=1");
        
    }

}




