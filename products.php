<?php
include './database/connect.php';
include './layouts/header.php';
include './../helpers/config.php';
$q="SELECT * FROM products";
$result = mysqli_query($connect,$q);


session_start();
$id = ($_SESSION['user']['id']);
$cartQuery = "SELECT COUNT(userId) as total FROM cart_tbl WHERE userId = $id";
$res = mysqli_query($connect,$cartQuery);
$temp = mysqli_fetch_assoc($res);
$cartCounting = $temp['total'];
?>
<html>
<head>
<link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/homepage.css">
    <script type="text/javascript" src="jquery.js"></script>
    <script>
        var sessionID;
    function loadjquery(){
        if(window.jQuery){
            console.log("jquerySuccess!")
             sessionID = <?php 

             if(isset($_SESSION['user']['id'])){
             echo $_SESSION['user']['id']; 
            }else{
                echo "undefined";
            }
         ?>
        }
    }
    var count = <?=$cartCounting?>;
    loadjquery();
    
</script>
    <script  type="text/javascript" src="./Javascript/cart.js"></script>

</head>
<center><h1 style="font-size: 75px;">Product List<br></h1></center>
<body>

<div id="cart" style="text-align:center">
    <?php
    if(isset($_SESSION['user'])){
    ?>
        <span>Your Cart: </span>
    <span id="countCart"> <?=$cartCounting?></span>
    <?php
    }?>
</div>
 <table border='1' cellpadding='5' cellspacing='8' align='center'>
            <tr bgcolor='orange'>
                        <td style='white-space: nowrap;'>Nama</td>
                        <td style='white-space: nowrap;'>Foto</td>
                        <td style='white-space: nowrap;'>Harga</td>
                        <td>Yang Mau Dibeli</td>
                        </tr>
                 <?php
                  while($data = mysqli_fetch_array($result)){
                 ?>   
                
                 <tr>
                        <td style='white-space: nowrap; padding-left: 20px;padding-right: 20px;'><?=$data['Nama'] ?></td>
                        <td style='white-space: nowrap;'><img width="25%" src="<?="Images/".$data['img']?>"></td>
                        <td style='white-space: nowrap;'><?=$data['Harga'] ?></td>
                        <td style='white-space: nowrap;'> <button class="btn btn-danger" onclick="onAdd(<?=$data['ID']?>,<?= $_SESSION['user']['id']?>)" style="margin-left:20px"> add </button> </td>
                    </tr>
                    <script>
                       
                    </script>
                    <?php
                
                      
                       
                
                    } ?>
                    <form autocomplete="off" name="cart" method="POST" action="./Buy.php?id=1">
                    <tr>
                    	<td colspan="4">
                    <center>
                        <input type="submit" value="Beli" class="btn btn-primary">
                        <button type="button" onclick="onShow(<?=$_SESSION['user']['id']?>)" class="btn btn-primary">Show my Cart</button>
                        <button type="button" onclick="clearAll(<?=$_SESSION['user']['id']?>)" class="btn btn-primary">Clear my Cart</button>         
                    </center>
                </td>
            </tr>
            <div id="listGroup">
                 
            </div>

</body>



</html>