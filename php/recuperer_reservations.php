<?php
    require("connect.php");
    session_start();
    $connexion = mysqli_connect(SERVEUR, NOM, PASSE, BASE);
    if (!$connexion) {
        die("La connexion à la base de données a échoué : " . mysqli_connect_error());
    }


    $sql = "SELECT * FROM reservations";
    $result = mysqli_query($connexion, $sql);
    if ($result) {
        $reservations = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $date_debut = null;
            $date_fin = null;

            try {
                $date_debut = new DateTime($row['debut']);
            } catch (Exception $e) {
            }

            try {
                $date_fin = new DateTime($row['fin']);
            } catch (Exception $e) {
            }

            while ($date_debut <= $date_fin) {
                $dates_rouges[] = $date_debut->format('Y-m-d');
                $date_debut->modify('+1 day');
            }
        }
        $dates_rouges = array_unique($dates_rouges);
        $dates_rouges = array_values($dates_rouges);
        echo json_encode($dates_rouges);

    } else {
        echo "Pas de données";
    }

mysqli_close($connexion);
?>
