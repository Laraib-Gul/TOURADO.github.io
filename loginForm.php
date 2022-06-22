<?php
$uemail = $_POST['uemail'];
$upassword = $_POST['upassword'];

$host="localhost";
$user="root";
$password="";
$db="tourado";

$conn=mysqli_connect($host,$user,$password,$db);
$query="SELECT * From users where email = '$uemail' and upassword='$upassword'";
$result=mysqli_query($conn, $query);
if(mysqli_num_rows($result) == 1){
    session_start();
    $_SESSION['auth']= 'true';
    header('location:loginAuth.php');
}
else{
    require_once __DIR__ . "/wrongAuth.php";
}
?>
