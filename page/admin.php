<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    // Redirigez l'utilisateur vers la page de connexion s'il n'est pas authentifié
    header("Location: login.php");
    exit;
}

if (isset($_POST["logout"])) {
    // L'utilisateur a cliqué sur le bouton "Déconnexion"
    session_destroy(); // Détruit la session actuelle
    header("Location: login.php"); // Redirige vers la page de connexion
    exit;
}
?>
<!DOCTYPE html>
<html lang="">
<head>
    <title>Administration</title>
</head>
<body>
<h1>Test</h1>

<form method="post" action="">
    <input type="submit" name="logout" value="Déconnexion">
</form>
</body>
</html>
