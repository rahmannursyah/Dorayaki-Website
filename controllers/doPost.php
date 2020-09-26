<?php

use function PHPSTORM_META\type;

include '../database/connect.php';
session_start();
/*
Product id list nya ada di tabel cart, lu nanti select tampung ke array terus
insert ke transaction detail.

transaction header itu itungan nya jika terjadi 1 kali transaksi dia masuk 1

*/
//csrf

if($_SESSION['Token-Password-Hash'] === $_POST['token']){
echo $_POST['recep'];
echo $_POST['passwordbaru'];

$recepient = $_SESSION['Transaction']['Recepient'];
$address = $_SESSION['Transaction']['Address'];
$courrier = $_SESSION['Transaction']['Courrier'];
$file = $_FILES['foto'];



$bol_img = false;
//image
$typeImage = array('png','jpg','bmp','gif');

foreach($typeImage as $bla){
    if("image/jpeg" === $file['type']){
         $bol_img = true;   
         break;
    }
}

if($bol_img === false) header("Location:../");

//insert transactionHeader
$userID = $_SESSION['user']['id'];
$query = "INSERT INTO header_transaction_tbl VALUES(,userID,NOW())";
// echo $query;

// bind param
$query = "INSERT INTO ";
$stmt = mysqli_prepare($connect,$query);

$connect>





//

// print_r($file);
move_uploaded_file($file['tmp_name'],'../image_transaction/'.uniqid().".jpg");





}else{
    echo"Hacker";
}
?>