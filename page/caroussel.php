<div class="carousel">
    <div class="slide-container" id="imageContainer">
        <!-- Les images du carrousel seront chargées via AJAX -->
    </div>
    <button id="prevBtn" onclick="changeSlide(-1)">Précédent</button>
    <button id="nextBtn" onclick="changeSlide(1)">Suivant</button>
    <?php

    if (isset($_SESSION["loggedin"])) {
        echo '<button onclick="deleteImage()" id="deleteButton">Supprimer cette image</button>';
    }
    ?>

</div>

<?php

if (isset($_SESSION["loggedin"])) {
    echo '<form action="../php/upload.php" method="post" enctype="multipart/form-data">
                <label for="file">Sélectionnez une image à télécharger :</label>
                <input type="file" name="file" id="file" accept=".jpg, .jpeg, .png">
                <input type="submit" name="submit" value="Télécharger">
          </form>';
}
?>

<script src="javascript/caroussel.js"></script>
