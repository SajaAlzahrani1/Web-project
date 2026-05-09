<?php

$host = "sql102.infinityfree.com";
$user = "if0_41021107";
$pass = "IoBiWwRYmcrG";
$dbname = "if0_41021107_discover_saudi";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {

    die("فشل الاتصال بالقاعدة: " . $conn->connect_error);

}

$conn->set_charset("utf8mb4");

?>
