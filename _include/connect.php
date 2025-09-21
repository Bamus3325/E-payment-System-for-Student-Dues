<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "dues";

$con = mysqli_connect($server, $user, $pass, $db);
if (!$con) {
    echo "Database Not Connected";
}



?>