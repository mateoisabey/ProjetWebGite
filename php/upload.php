<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require("connect.php");

    $connexion = mysqli_connect(SERVEUR, NOM, PASSE, BASE);

    // Vérifiez la connexion à la base de données
    if ($connexion->connect_error) {
        die("La connexion à la base de données a échoué : " . $connexion->connect_error);
    }

    // Vérifiez si un fichier a été téléchargé avec succès
    if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
        // Récupérez le contenu du fichier téléchargé
        $imageContent = file_get_contents($_FILES["file"]["tmp_name"]);

        // Échappez les données pour éviter les injections SQL (utilisez des requêtes préparées pour plus de sécurité)
        $imageContent = $connexion->real_escape_string($imageContent);

        // Insérez l'image dans la base de données
        $query = "INSERT INTO images (image_data) VALUES ('$imageContent')";

        if ($connexion->query($query) === TRUE) {
            echo "<script>alert('L\'image a été téléchargée et stockée dans la base de données avec succès.');</script>";

            // Redirigez l'utilisateur vers la page précédente
            echo "<script>window.history.go(-1);</script>";
            exit;
        } else {
            echo "Une erreur s'est produite lors de l'insertion de l'image dans la base de données : " . $connexion->error;echo "<script>alert('L\'image a été téléchargée et stockée dans la base de données avec succès.');</script>";
            echo "<script>alert('Une erreur s\'est produite lors de l\'insertion de l\'image dans la base de données.');</script>";

            // Redirigez l'utilisateur vers la page précédente
            echo "<script>window.history.go(-1);</script>";
            exit;
        }

        // Fermez la connexion à la base de données
        $connexion->close();
    } else {
        echo "Une erreur s'est produite lors du téléchargement du fichier.";
    }
}
?>
