<?php

require("connect.php");
session_start();

$connexion = mysqli_connect(SERVEUR, NOM, PASSE, BASE);
$query = "SELECT * FROM images ORDER BY id DESC";
$result = $connexion->query($query);

$images = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $imageData = base64_decode($row["image_data"]);

        $images[] = array('id' => $row["id"], 'image_data' => $imageData);
    }
}

// Fermez la connexion à la base de données
$connexion->close();

header('Content-Type: application/json');
echo json_encode($images);
?>