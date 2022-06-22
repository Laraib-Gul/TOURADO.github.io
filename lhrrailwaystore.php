<?php
$ltname = $_POST['ltname'];
$ltclass = $_POST['ltclass'];

$ladults = $_POST['ladults'];
$lkids = $_POST['lkids'];
$linfants = $_POST['linfants'];
$lddate = $_POST['lddate'];
$ladate = $_POST['ladate'];


if(!empty($ltname) || !empty($ltclass) || !empty($lddate) || !empty($ladate) || !empty($ladults) || !empty($lkids) || !empty($linfants)){
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
    $SELECT = "SELECT ltrainname From lhrrailway where ltrainname=? Limit 1";
    $INSERT = "INSERT INTO lhrrailway (ltrainname, lddate, ladate, ltrainclass, ladults, lkids, linfants) values (?, ?, ?, ?, ?, ?, ?)" ;
//Prepare Statement
$stmt = $conn->prepare($SELECT);
$stmt->bind_param("s", $ltname);
$stmt->execute();
$stmt->bind_result($ltname);
$stmt->store_result();
$rnum = $stmt->num_rows();

if($rnum == 0){
    $stmt->close();
    $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("ssssiii", $ltname, $lddate, $ladate, $ltclass, $ladults, $lkids, $linfants);
    $stmt->execute();
    require_once __DIR__ . "/loginAuth.php";

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


