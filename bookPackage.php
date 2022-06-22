<?php
$puname = $_POST['puname'];
$puemail = $_POST['puemail'];
$puphone = $_POST['puphone'];
$pucnic = $_POST['pucnic'];
$puaddress = $_POST['puaddress'];
//$pddl = $_POST['pddl'];
$pkgid = $_POST['pkgid'];

if(!empty($puname) || !empty($puemail) || !empty($puphone) || !empty($pucnic) || !empty($puaddress) || !empty($pkgid)){
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
    $SELECT = "SELECT puemail From book_package where puemail=? Limit 0";
    $INSERT = "INSERT INTO book_package (puname, puemail, puphone, pucnic,puaddress, pkgid) values (?, ?, ?, ?, ?, ?)" ;
//Prepare Statement
$stmt = $conn->prepare($SELECT);
$stmt->bind_param("s", $puemail); 

$stmt->execute();
$stmt->bind_result($puemail);
$stmt->store_result();
$rnum = $stmt->num_rows();

if($rnum == 0){
    $stmt->close();
    $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("ssiisi", $puname, $puemail, $puphone, $pucnic, $puaddress, $pkgid);
    $stmt->execute();
    require_once __DIR__ . "/Billing_Info.php";

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



<!-- JOIN Query -->
<!--SELECT * FROM book_package INNER JOIN packages ON book_package.pddl=packages.pkgName; -->