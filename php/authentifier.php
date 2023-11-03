<?php
require("../php/connect.php");
session_start();

$connexion = mysqli_connect(SERVEUR, NOM, PASSE, BASE);

if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

$username = mysqli_real_escape_string($connexion, $_POST['username']);
$password = mysqli_real_escape_string($connexion, $_POST['password']);

$query = "SELECT mot_de_passe FROM utilisateurs WHERE nom_utilisateur=?";
$stmt = mysqli_prepare($connexion, $query);
mysqli_stmt_bind_param($stmt, 's', $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$result) {
    die("Erreur dans la requête : " . mysqli_error($connexion));
}

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row['mot_de_passe'];

    if (password_verify($password, $hashed_password)) {
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;
        header("Location: ../page/admin.php");
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
        echo '<br><a href="../page/login.php">Recommencer</a>';
    }
} else {
    echo "Nom d'utilisateur ou mot de passe incorrect.";
    echo '<br><a href="../page/login.php">Recommencer</a>';
}

mysqli_close($connexion);
?>
