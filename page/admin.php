<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="FR">
<head>
    <title>Gestion des Réservations</title>

    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
    <script src="../javascript/admin.js"></script>
    <link rel="stylesheet" href="../style/admin.css">

</head>
<H1>Gestion des réservations</H1>
<H2><a href="../index.php">Accueil</a></H2>
<body onload = "getdates()">
<form onsubmit="addRes();">
    <label for="titre">Titre :</label>
    <input type="text" id="titre" name="titre" required><br><br>

    <label for="debut">Date de début :</label>
    <input type="datetime-local" id="debut" name="debut" required><br><br>

    <label for="fin">Date de fin :</label>
    <input type="datetime-local" id="fin" name="fin" required><br><br>

    <input type="submit" value="Enregistrer la réservation">
</form>
<div id="calendar" style="width: 600px; height: 400px;"></div>
<div id="test-result"></div>

</body>
</html>


