<?php
// Démarrez la session
session_start();

// Détruisez la session existante (si elle existe)
session_destroy();

// Redirigez l'utilisateur vers la page d'accueil (index)
header("Location: ../index.php");
exit;
?>