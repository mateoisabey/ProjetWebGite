<?php
require("connect.php");
session_start();
// Établissez une connexion à la base de données (remplacez avec vos informations de connexion)
$connexion = mysqli_connect(SERVEUR, NOM, PASSE, BASE);
if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}
// Récupérez les données de la réservation depuis la requête POST
$titre = mysqli_real_escape_string($connexion, $_POST['titre']);
$debut = mysqli_real_escape_string($connexion, $_POST['debut']);
$fin = mysqli_real_escape_string($connexion, $_POST['fin']);
echo($titre);
// Préparez la requête SQL pour insérer la réservation dans la table
$sql = "INSERT INTO reservations (titre, debut, fin) VALUES ('$titre', '$debut', '$fin')";

if (mysqli_query($connexion, $sql)) {
    echo "La réservation a été enregistrée avec succès.";
} else {
    echo "Erreur lors de l'enregistrement de la réservation : " . mysqli_error($connexion);
}

// Fermez la connexion à la base de données
mysqli_close($connexion);
?>
