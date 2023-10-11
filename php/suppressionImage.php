<?php

require("connect.php");
session_start();

$connexion = mysqli_connect(SERVEUR, NOM, PASSE, BASE);

if (isset($_POST['image_id'])) {
    $imageId = $_POST['image_id'];
    $query = "DELETE FROM images WHERE id = $imageId";
    if ($connexion->query($query) === TRUE) {
        echo "L'image a été supprimée avec succès de la base de données.";
    } else {
        echo "Erreur lors de la suppression de l'image de la base de données : " . $connexion->error;
    }
}

$connexion->close();
?>
