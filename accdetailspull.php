<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bonitas_hub";
$conn = new mysqli($servername, $username, $password, $dbname);
$usrid = $_POST['usrid'];

$memberInfo = mysqli_query($conn, "SELECT * FROM tbl_dependents  WHERE user_id = $usrid");
// var_dump($memberInfo);
echo json_encode($memberInfo);


?>