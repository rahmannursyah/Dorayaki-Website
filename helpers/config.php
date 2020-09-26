<?php
require './../database/connect.php';
;
  function LoginData($query,$username,$password){
        global $connect;
        $result = mysqli_query($connect,$query);
        if($result->num_rows > 0 && $result->num_rows < 2){
            while($row = $result->fetch_assoc()){
                if($row['Username']  === $username && $row['Password'] === $password){
                 return $row;
                }
            }
            return "WRONG PASSWORD";
        }else{
            return "WRONG PASSWORD";
        }

    }

    function DuplicateData($query,$username,$email){
        global $connect;
        $result = mysqli_query($connect,$query);
        while($row = $result->fetch_assoc()){
            if($row['Username'] === $username) return 1;
            else if($row['Email'] === $email) return 2;
        }
        return 0;
    }

    function RegisterData($user,$email,$pass){
        global $connect;
        /*
            Prepare Statement
            1. Prepare ur query
            2. Bind param vuln values || i d s
            3. Execute
        */
        
        $stmt = $connect->prepare("INSERT INTO users_tbl (Username,Email,Password) VALUES (?,?,?)");
        $stmt->bind_param("sss",$user,$email,$pass);
        $stmt->execute();
        $stmt->close();
    }

    function countingProduct(){
        global $connect;
        $q="SELECT * FROM products";
        $result = mysqli_query($connect,$q);
        $count = $result->num_rows;
        return $count;
    }

    function AddtoCart($productId,$userId){
        global $connect;
        $query = "INSERT INTO cart_tbl VALUES($productId,$userId)";
        mysqli_query($connect,$query);
    }

    function generateToken(){
        $token = md5(random_bytes(60));
        return $token;
    }

    

        
        $query = "SELECT COUNT(userId) as total FROM cart_tbl WHERE userId = $id";
        $res = mysqli_query($connect,$query);
        mysqli_fetch_assoc($res);
      
 
    //Add Function Here




?>