<?php

require("connect.php");
session_start();

$connexion = mysqli_connect(SERVEUR, NOM, PASSE, BASE);
$query = "SELECT * FROM images ORDER BY id DESC";
$result = $connexion->query($query);

$images = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $images[] = array('id' => $row["id"], 'image_data' => base64_encode($row["image_data"]));
    }
}

$connexion->close();

header('Content-Type: application/json');
echo json_encode($images);
?>