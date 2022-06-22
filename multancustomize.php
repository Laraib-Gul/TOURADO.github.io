<?php
$cname = $_POST['cname'];
$cphone = $_POST['cphone'];
$cemail = $_POST['cemail'];
$ccity = $_POST['ccity'];
$chotel = $_POST['chotel'];
$cdays = $_POST['cdays'];
$crestaurant = $_POST['crestaurant'];
$carea = $_POST['carea'];

$chkstr = implode(", ",$crestaurant);
$chkarea = implode(", ",$carea);

if(!empty($cname) || !empty($cphone) || !empty($cemail) || !empty($ccity) || !empty($chotel) || !empty($cdays) || !empty($chkstr) || !empty($chkarea)){
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
    $SELECT = "SELECT cemail From lhrcustomize where cemail=? Limit 0";
    $INSERT = "INSERT INTO lhrcustomize (cname, cphone, cemail, ccity, chotel, cdays, crestaurant, carea) values (?, ?, ?, ?, ?, ?, ?, ?)" ;
//Prepare Statement
$stmt = $conn->prepare($SELECT);
$stmt->bind_param("s", $cemail);
$stmt->execute();
$stmt->bind_result($cemail);
$stmt->store_result();
$rnum = $stmt->num_rows();

if($rnum == 0){
    $stmt->close();
    $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("sissssss", $cname, $cphone, $cemail, $ccity, $chotel, $cdays, $chkstr, $chkarea);
    $stmt->execute();
    require_once __DIR__ . "/LhrTM2.php";

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


