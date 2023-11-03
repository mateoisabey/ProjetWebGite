<?php
require("connect.php");
session_start();
$connexion = mysqli_connect(SERVEUR, NOM, PASSE, BASE);
if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

$titre = mysqli_real_escape_string($connexion, $_POST['titre']);
$debut = mysqli_real_escape_string($connexion, $_POST['debut']);
$fin = mysqli_real_escape_string($connexion, $_POST['fin']);

$sql = "INSERT INTO reservations (titre, debut, fin) VALUES ('$titre', '$debut', '$fin')";

if (mysqli_query($connexion, $sql)) {
    echo "Réservation effectuer";
} else {
    echo "Erreur lors de l'enregistrement de la réservation";
}

mysqli_close($connexion);
?>
