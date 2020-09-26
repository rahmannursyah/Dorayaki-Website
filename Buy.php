<?php
include './layouts/header.php';

if(!isset($_SESSION['user'])){
    header("Location:./");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/homepage.css">
    <title>Buy Verification</title>
</head>
<body>
<div style=" margin-top:20px; margin-right:20%; margin-left:20%" class="form-group">
    <?php
        if($_GET['id'] === '1'){
           ?>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                     aria-valuemin="0" aria-valuemax="100" style="width:10%">
                         10%
                    </div>
                </div>
                <form method="POST" action="./buy.php?id=2">
                <label for="name">Recepient</label>
                <input class="form-control" type="text" id="name" name="recepient" required="true" >
                <br>
                <label for="name">Address</label>
                <input  class="form-control" type="text" id="name" name="Address" required="true">
                <br>
                <label for="name">Courrier</label>
                <br>
                <div class="radio">
                <label>
                <input type="radio" name="cour" id="courrier" value="Go-Jek" required="true"> 
                Go-Jek
                </label>
                <br>
                <label>
                <input type="radio" name="cour" id="courrier" value="Grab">
                Grab
                </label>
                </div>
                <br>
                <input type="submit" class="btn btn-primary btn-block" value="Next">
                
                </form>

            <?php
        }else if($_GET['id'] === '2'){
                if(!isset($_POST['recepient']) && !isset($_POST['Address'])){
                    header("Location:./buy.php?id=1");
                  
                }
            
            ?>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                     aria-valuemin="0" aria-valuemax="100" style="width:50%">
                         50%
                    </div>
                </div>
                <form method="POST" enctype="multipart/form-data" action="./controllers/doPost.php">
                    <br>
                    <label for="name" >Proof of Payment</label>
                    <br>
                        <?php
                                $_SESSION['Transaction'] = array(
                                    'Recepient' => $_POST['recepient'],
                                    'Address' => $_POST['Address'],
                                    'Courrier' => $_POST['cour']
                                );    
                         $token = password_hash(uniqid(),PASSWORD_BCRYPT);
                            $_SESSION['Token-Password-Hash'] = $token;
                        ?>
                        <input name="token" type="hidden" value="<?=$token?>">
                        <input type="file" name="foto">
                        <small id="passwordHelpBlock" class="form-text text-muted">
                        Upload file Transaction Only JPG & PNG
                        </small>
                        <br>
                    <input type="submit" class="btn btn-primary btn-block" value="Submit"> 
                </form>
            <?php

        }
    ?>
     </div>
</body>
</html>