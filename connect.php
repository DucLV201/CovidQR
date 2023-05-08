<?php 
$username = "root"; // Khai báo username
$password = "";      // Khai báo password
$server = "localhost";   // Khai báo server
$dbname = "test";      // Khai báo database

// Kết nối database
$connect = new mysqli($server, $username, $password, $dbname);

//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
if ($connect->connect_error) {
    die("Kết nối lỗi:" . $connect->connect_error);
    exit();
}


?>