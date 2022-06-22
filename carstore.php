<?php
$cname = $_POST['carddl'];
$cdplace = $_POST['cardplace'];
$caplace = $_POST['caraplace'];
$cddate = $_POST['carddate'];
$cadate = $_POST['caradate'];
$seats = $_POST['seats'];


if(!empty($cname) || !empty($cdplace) || !empty($caplace) || !empty($cddate) || !empty($cadate) || !empty($seats)){
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
    $SELECT = "SELECT tmname From travel_medium where tmname=? Limit 0";
    $INSERT = "INSERT INTO travel_medium (tmname, tmdplace, tmaplace, tmddate, tmadate, seats) values (?,?, ?, ?, ?, ?)" ;
//Prepare Statement
$stmt = $conn->prepare($SELECT);
$stmt->bind_param("s", $cname);
$stmt->execute();
$stmt->bind_result($cname);
$stmt->store_result();
$rnum = $stmt->num_rows();

if($rnum == 0){
    $stmt->close();
    $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("sssssi", $cname, $cdplace, $caplace, $cddate, $cadate, $seats);
    $stmt->execute();
  header('location:Billing_Customize.php');
}

else{
    echo "Someone already registered using this email";
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


