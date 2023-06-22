<?php
$host = "localhost";
$user = "root";
$password = '';
$db_name = "inventorymanagement";

$con = mysqli_connect($host, $user, $password, $db_name);
if (mysqli_connect_errno()) {
    die("Failed to connect with MySQL: " . mysqli_connect_error());
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "select * from user where email = '$email' and password = '$password'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if ($count == 1) {
    require("./table.php");
} else {
    echo "<h1> Login Failed.</h1>";
}
?>