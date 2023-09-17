<?php 

$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'belajar_phpmysql';

$conn = mysqli_connect($hostname, $username, $password, $dbname) or die(mysqli_error($conn));

?>