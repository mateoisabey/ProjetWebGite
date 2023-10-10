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
<html lang="FR">
<head>
    <title>Administration</title>

    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
    <script src="../javascript/admin.js"></script>

</head>
<body onload = "getdates()">
<form action="../php/enregistrementRes.php" method="post">
    <label for="titre">Titre :</label>
    <input type="text" id="titre" name="titre" required><br><br>

    <label for="debut">Date de début :</label>
    <input type="datetime-local" id="debut" name="debut" required><br><br>

    <label for="fin">Date de fin :</label>
    <input type="datetime-local" id="fin" name="fin" required><br><br>

    <input type="submit" value="Enregistrer la réservation">
</form>
<form method="post" action="">
    <input type="submit" name="logout" value="Déconnexion">
</form>
<div id="calendar" style="width: 600px; height: 400px;"></div>
<div id="test-result"></div>



</body>
</html>


