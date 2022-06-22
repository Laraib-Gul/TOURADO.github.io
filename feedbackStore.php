<?php
$feedname = $_POST['fname'];
$feedemail = $_POST['femail'];
$feedsubject = $_POST['fsubject'];
$feedmessage = $_POST['fmessage'];

if(!empty($feedname) || !empty($feedemail) || !empty($feedsubject) || !empty($feedmessage)){
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
    $SELECT = "SELECT fname From feedback where fname=? Limit 0";
    $INSERT = "INSERT INTO feedback (fname, femail, fsubject, fmessage) values (?, ?, ?,?)" ;
//Prepare Statement
$stmt = $conn->prepare($SELECT);
$stmt->bind_param("s", $feedname);
$stmt->execute();
$stmt->bind_result($feedname);
$stmt->store_result();
$rnum = $stmt->num_rows();

if($rnum == 0){
    $stmt->close();
    $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("ssss", $feedname, $feedemail, $feedsubject, $feedmessage);
    $stmt->execute();
header('location:Feedback.html');
}

else{
    header('location:Feedback.html');
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


