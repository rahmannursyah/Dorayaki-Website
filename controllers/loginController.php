<?php
    include './../helpers/config.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = mysqli_real_escape_string($connect,$_POST['username']);
        $password = mysqli_real_escape_string($connect,$_POST['password']);
        $sql = "SELECT * FROM users_tbl WHERE Email = ?";
        $stmt=$connect->prepare($sql);
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        // $result = $connect->query($sql);
        $data = mysqli_fetch_array($result);
        $hashpass = $data['Password'];
        $isCorrect = password_verify($password,$hashpass);


        if($isCorrect){
             session_start();
             session_regenerate_id();
             $_SESSION['user'] = $data;

            if(isset($_POST['remember'])){
                $n = 30;
                $userid=$data['id'];
                $result = bin2hex(random_bytes($n));
                $hash = password_hash($result, PASSWORD_DEFAULT);
                $date=date('Y-m-d',time()+3600*24*7);
                setcookie('user',$username,time()+3600*24*7,'/','',false,true);
                setcookie('sec',$result,time()+3600*24*7,'/','',false,true);
                $sql="UPDATE users_tbl SET Cookie='$hash',Cookie_exp='$date' WHERE id='$userid'";                
                $result = $connect->query($sql);
            }

             header("Location: ./../products.php");
        }else{
            header("Location: ./../login.php?error=1");
        }
       
    }
?>