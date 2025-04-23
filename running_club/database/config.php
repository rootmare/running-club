<?php
$hn = "localhost";
$un = "Robert_Orr";
$pw = "lx6l!-KT7xlG*-it";
$db = "running_club";
// Create database connection
$conn = new mysqli($hn, $un, $pw, $db);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $db->connect_error);
}

else echo 'connection successful';
?>