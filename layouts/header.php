<?php
session_start();
if(!isset($_SESSION['user'])){
    if(isset($_COOKIE['user']) && isset($_COOKIE['sec'])){
        include './database/connect.php';
        $user=$_COOKIE['user'];
        $sec=$_COOKIE['sec'];
        $sql = "SELECT * FROM users_tbl WHERE Email = '$user'";
        $result = $connect->query($sql);
        $data = mysqli_fetch_array($result);
        $hashpass = $data['Cookie'];
        $isCorrect = password_verify($sec,$hashpass);
        if($data['Cookie_exp']<time()){
            $isCorrect=false;
        }
        if($isCorrect){
            session_regenerate_id();
            $_SESSION['user'] = $data;
                    $n = 30;
                    $userid=$data['id'];
                    $result = bin2hex(random_bytes($n));
                    $hash = password_hash($result, PASSWORD_DEFAULT);
                    $date=date('Y-m-d',time()+3600*24*7);
                    setcookie('sec',$result,time()+3600*24*7,'/','',false,true);
                    $sql="UPDATE users_tbl SET Cookie='$hash',Cookie_exp='$date' WHERE id='$userid'";                
                    $result = $connect->query($sql);
        }else{
            $sql="UPDATE users_tbl SET Cookie='',Cookie_exp='0' WHERE id='$userid'";
            $connect->query($sql);
            setcookie('user','apaaja',time()-3600*24,'/');
            setcookie('sec','apaaja',time()-3600*24,'/');
        }
    }
}
?>



<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 style="color: brown;" class="my-0 mr-md-auto font-weight-normal"><a href="./">Dorayaki Store</a></h5>
        <?php         if(isset($_SESSION['user'])) {
           echo '<h6 class="my-0 font-weight-normal">Welcome ,'; 
            echo( $_SESSION['user']["Username"]);
            echo '<a class="btn btn-outline-primary ml-1 mr-1" href="./controllers/logoutController.php">Logout</a>';
            echo '<a class="btn btn-outline-primary ml-1 mr-1" href="./profile.php">Profile</a>';
        }else{
        ?></span>
    <a class="btn btn-outline-primary ml-1 mr-1" href="./login.php">Login</a>
    <a class="btn btn-outline-primary ml-1 mr-1" href="./register.php">Register</a>
    <?php
        }
    ?>
</div>