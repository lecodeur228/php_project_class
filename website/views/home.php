<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'php_class_project';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die('Erreur de la base : ' . $conn->connect_error);
}

 $result = $conn->query("SELECT * FROM etudiants");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    <?php
    
        if ($result->num_rows > 0) {
            while ($row= $result->fetch_assoc()) {
                $nom = $row['nom'];
                $prenom = $row['prenom'];
                $image = $row['image_url'];
                echo "<div class='card'>
                <div class='card-header'>$nom $prenom</div>
                <div class='card-body'><img src='http://localhost/php_projet_class/website/controllers/$image'></div>
                </div>";
            }
        }
    
    
    
    ?>
</body>
</html>