<div class="carousel">
    <img id="prevBtn"
         class="prevAndNextBtn"
         onclick="changeSlide(-1)"
         src="./images/arrow-left.png"
         alt="Previous image"
    />
    <div class="slide-container" id="imageContainer">
        <!-- Les images du carrousel seront chargées via AJAX -->
    </div>
    <img id="nextBtn"
         class="prevAndNextBtn right"
         onclick="changeSlide(1)"
         src="./images/arrow-right.png"
         alt="Next image"
    />
    <?php

    if (isset($_SESSION["loggedin"])) {
        echo '<button onclick="deleteImage()" id="deleteButton">Supprimer cette image</button>';
    }
    ?>

</div>

<?php

if (isset($_SESSION["loggedin"])) {
    echo '<form action="php/upload.php" method="post" enctype="multipart/form-data">
                <label for="file">Sélectionnez une image à télécharger :</label>
                <input type="file" name="file" id="file" accept=".jpg, .jpeg, .png">
                <input type="submit" name="submit" value="Télécharger">
          </form>';
}
?>
<link rel="stylesheet" href="style/caroussel.css">
<script src="javascript/caroussel.js"></script>
