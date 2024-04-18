<?php
$server = 'localhost';
$username = 'root';
$pwd = '';
$database = 'crud';

$conn = mysqli_connect($server, $username, $pwd, $database);

if(!$conn){
    die('failed to connect' . mysqli_connect_error());
}

$sno = $_GET['sno'];

$sql = "DELETE from `notes` WHERE `sno`='$sno'";

mysqli_query($conn, $sql);

header("Location: index.php");
exit();

?>