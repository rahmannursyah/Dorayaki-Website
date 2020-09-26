<?php
error_reporting(0); // <-- Error Report == False
function  connect($server,$name,$password,$dba){
    $con = mysqli_connect($server,$name,$password,$dba);
    if(!$con) throw new Exception("<script>location.href='FailedConnect.html'</script>");
    return $con;
}

$serv = "localhost";
$name = "root"; 
$pass = "";
//$name = "database";
//$pass = "uvuvwevwevwe onyetenyevwe ugwemuhwem osas";
$dba = "dorayaki_db";

$connect = null;

try{    
        $connect =  connect($serv,$name,$pass,$dba);

    }
    catch(Exception $e){
        echo $e->getMessage();
    }

?>