<?php
require("../php/connect.php");
session_start();

$connexion = mysqli_connect(SERVEUR, NOM, PASSE, BASE);

if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

$username = mysqli_real_escape_string($connexion, $_POST['username']);
$password = mysqli_real_escape_string($connexion, $_POST['password']);

$query = "SELECT * FROM utilisateurs WHERE nom_utilisateur='$username' AND mot_de_passe='$password'";

$result = mysqli_query($connexion, $query);

if (!$result) {
    die("Erreur dans la requête : " . mysqli_error($connexion));
}

if (mysqli_num_rows($result) == 1) {
    $_SESSION["loggedin"] = true;
    $_SESSION["username"] = $username;

    echo($_SESSION["loggedin"]);
    header("Location: ../page/admin.php");

} else {

    echo "Nom d'utilisateur ou mot de passe incorrect.";
    echo '<br><a href="../page/login.php">Recommancer</a>';
}


mysqli_close($connexion);
?>
