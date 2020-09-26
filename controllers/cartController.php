<?php

include './../helpers/config.php';

session_start();

if($_SESSION['user']['id'] === $_POST['useID']){
		
	if($_POST['procID'] > countingProduct()){

		echo 400;
	}else{

		$procID = mysqli_real_escape_string($connect,$_POST['procID']);
		$userID = mysqli_real_escape_string($connect,$_POST['useID']);

		AddtoCart($procID,$userID);
		echo 200;
	}
}else{
	echo 400;
}
