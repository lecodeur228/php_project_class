<?php
$host = 'localhost';
$user = 'root';
$password = '';
$datebase= 'php_class_project';

$conn = new mysqli($host,$user,$password,$datebase);

    if($conn->connect_errno){
        die('erreur de la base: ' . $conn->connect_error);
    }


?>