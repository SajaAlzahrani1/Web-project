<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "discover_saudi";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {

    die("فشل الاتصال بالقاعدة: " . $conn->connect_error);

}

$conn->set_charset("utf8mb4");

?>