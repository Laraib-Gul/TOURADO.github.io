<?php
$bname = $_POST['busddl'];
$bdplace = $_POST['busdplace'];
$baplace = $_POST['busaplace'];
$bddate = $_POST['bddate'];
$badate = $_POST['badate'];
$seats = $_POST['seats'];

if(!empty($bname) || !empty($bdplace) || !empty($baplace) || !empty($bddate) || !empty($badate) || !empty($seats)){
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
$stmt->bind_param("s", $bname);
$stmt->execute();
$stmt->bind_result($bname);
$stmt->store_result();
$rnum = $stmt->num_rows();

if($rnum == 0){
    $stmt->close();
    $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("sssssi", $bname, $bdplace, $baplace, $bddate, $badate, $seats);
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


