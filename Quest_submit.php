<?php
$qarea = $_POST['qarea'];
$qdays = $_POST['qdays'];
$qbudget = $_POST['qbudget'];

if(!empty($qarea) || !empty($qdays) || !empty($qbudget)){
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
    $SELECT = "SELECT qarea From questionnaire where qarea=? Limit 0";
    $INSERT = "INSERT INTO questionnaire (qarea, qdays, qbudget) values (?, ?, ?)" ;
//Prepare Statement
$stmt = $conn->prepare($SELECT);
$stmt->bind_param("s", $qarea);
$stmt->execute();
$stmt->bind_result($qarea);
$stmt->store_result();
$rnum = $stmt->num_rows();

if($rnum == 0){
    $stmt->close();
    $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("sii", $qarea, $qdays, $qbudget);
    $stmt->execute();
header('location:PackagesRecommendations.php');

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