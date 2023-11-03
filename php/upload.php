<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require("connect.php");

    $connexion = mysqli_connect(SERVEUR, NOM, PASSE, BASE);

    if ($connexion->connect_error) {
        die("La connexion à la base de données a échoué : " . $connexion->connect_error);
    }

    if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
        $imageContent = file_get_contents($_FILES["file"]["tmp_name"]);

        $imageContent = $connexion->real_escape_string($imageContent);


        $query = "INSERT INTO images (image_data) VALUES ('$imageContent')";

        if ($connexion->query($query) === TRUE) {
            echo "<script>alert('L\'image a été téléchargée et stockée dans la base de données avec succès.');</script>";

            echo "<script>window.history.go(-1);</script>";
            exit;
        } else {
            echo "Une erreur s'est produite lors de l'insertion de l'image dans la base de données : " . $connexion->error;echo "<script>alert('L\'image a été téléchargée et stockée dans la base de données avec succès.');</script>";
            echo "<script>alert('Une erreur s\'est produite lors de l\'insertion de l\'image dans la base de données.');</script>";

            echo "<script>window.history.go(-1);</script>";
            exit;
        }

        $connexion->close();
    } else {
        echo "Une erreur s'est produite lors du téléchargement du fichier.";
    }
}
?>
