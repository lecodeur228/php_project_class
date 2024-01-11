<?php

// include("./config.php");
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'php_class_project';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die('Erreur de la base : ' . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mdp = $_POST['mdp'];

    $targetDirectory = 'images/';
    $target_file = $targetDirectory . basename($_FILES["image"]["name"]); // Utilisez "name" au lieu de "image"

    $uploadOk = 1;

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["image"]["tmp_name"]);

    if ($check !== false) {
        echo "Le fichier est une image";
        $uploadOk = 1;
    } else {
        echo "Le fichier n'est pas une image";
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
        echo "L'image existe déjà";
        $uploadOk = 0;
    }

    $formats = ["jpg", "png", "jpeg"];

    if (!in_array($imageFileType, $formats)) {
        echo "Le fichier n'est pas une image";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "L'image n'a pas été téléchargée";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "Le fichier a été uploadé avec succès";
            register_user($conn, $nom, $prenom, $mdp, $target_file);
        } else {
            echo "Erreur lors du téléchargement du fichier";
        }
    }
}

// Vous pouvez vérifier ici si des champs sont vides avant la connexion à la base de données

function register_user($conn, $nom, $prenom, $mdp, $image)
{
    // Vous devriez envisager d'utiliser des requêtes préparées pour éviter les attaques par injection SQL
    $statement = $conn->prepare("INSERT INTO etudiants(nom, prenom, mdp, image_url) VALUES (?, ?, ?, ?)");
    $statement->bind_param('ssss', $nom, $prenom, $mdp, $image);
    $statement->execute();
    $statement->close();
    echo "Test";
}

?>
