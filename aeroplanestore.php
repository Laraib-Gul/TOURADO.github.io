<?php
$aname = $_POST['aname'];
$adplace = $_POST['adplace'];
$aaplace = $_POST['aaplace'];
$addate = $_POST['addate'];
$aadate = $_POST['aadate'];
$aclass = $_POST['aclass'];
$aadults = $_POST['aadults'];
$akids = $_POST['akids'];
$ainfants = $_POST['ainfants'];


if(!empty($aname) || !empty($adplace) || !empty($aaplace) || !empty($aclass) || !empty($addate) || !empty($aadate) || !empty($aadults) || !empty($akids) || !empty($ainfants)){
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
    $SELECT = "SELECT aname From aeroplane where aname=? Limit 0";
    $INSERT = "INSERT INTO aeroplane (aname, adplace, aaplace, addate, aadate, aclass, aadults, akids, ainfants) values (?, ?, ?, ?, ?,?,?,?,?)" ;
//Prepare Statement
$stmt = $conn->prepare($SELECT);
$stmt->bind_param("s", $aname);
$stmt->execute();
$stmt->bind_result($aname);
$stmt->store_result();
$rnum = $stmt->num_rows();

if($rnum == 0){
    $stmt->close();
    $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("ssssssiii", $aname, $adplace, $aaplace, $addate, $aadate, $aclass, $aadults, $akids, $ainfants);
    $stmt->execute();
    header('location:Bill_aeroplane.php');
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


