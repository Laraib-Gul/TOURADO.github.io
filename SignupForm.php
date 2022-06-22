<?php
$uname = $_POST['uname'];
$uemail = $_POST['uemail'];
$upassword = $_POST['upassword'];

if(!empty($uname) || !empty($uemail) || !empty($upassword)){
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "tourado";

//create connection

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

if(mysqli_connect_error()){
    die('Connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
}

else{
    $SELECT = "SELECT email From users where email=? Limit 1";
    $INSERT = "INSERT INTO users (username, email, upassword) values (?, ?, ?)" ;
//Prepare Statement
$stmt = $conn->prepare($SELECT);
$stmt->bind_param("s", $uemail);
$stmt->execute();
$stmt->bind_result($uemail);
$stmt->store_result();
$rnum = $stmt->num_rows();

if($rnum == 0){
    $stmt->close();
    $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("sss", $uname, $uemail, $upassword);
    $stmt->execute();
    require_once __DIR__ . "/chooseTourPlan.php";

}

else{
    require_once __DIR__ . "/alreadyRegistered.php";
}
$stmt->close();
$conn->close();
}
}

else{
    echo "All fields are required.";
    die();
}
?>


