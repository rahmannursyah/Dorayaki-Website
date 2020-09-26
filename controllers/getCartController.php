<?php

include './../database/connect.php';
session_start();


if($_SESSION['user']['id'] === $_POST['UseID']){
    $id = $_SESSION['user']['id'];
    // echo $_POST['UseID'];
    $query = "SELECT Nama,Harga FROM cart_tbl ct 
    JOIN products p ON
        ct.productId = p.ID
     WHERE userId = $id";

 if($result = mysqli_query($connect,$query)){
        echo "<h2>Your Cart Details</h2>";
		while($row = mysqli_fetch_assoc($result)){
            //echo $row['Nama'];
            ?>
            <ul class="list-group"> 
                <li class="list-group-item">Item: <?=$row['Nama']?></li>
                <li class="list-group-item">Harga: <?=$row['Harga']?></li>
            </ul>
            <?php
        }

 }else{
     echo "query gagal";
 }


}
else{
   
    echo 400;
}


?>