<div class="carousel-section">
    <div class="carousel">
        <img id="prevBtn"
             class="prev-and-next-btn"
             onclick="changeSlide(-1)"
             src="./images/arrow-left.png"
             alt="Previous image"
        />
        <div class="slide-container" id="imageContainer">
            <!-- Les images du carrousel seront chargées via AJAX -->
        </div>
        <img id="nextBtn"
             class="prev-and-next-btn right"
             onclick="changeSlide(1)"
             src="./images/arrow-right.png"
             alt="Next image"
        />
    </div>


    <?php
    if (isset($_SESSION["loggedin"])) {
        echo '<button class="admin-carousel-delete-image" onclick="deleteImage()" id="deleteButton">Supprimer cette image</button>';

        echo '<form class="admin-carousel-controls" action="../php/upload.php" method="post" enctype="multipart/form-data">
                <label for="file">Sélectionnez une image à télécharger :</label>
                <input type="file" name="file" id="file" accept=".jpg, .jpeg, .png">
                <input type="submit" name="submit" value="Télécharger">
          </form>';
    }
    ?>
    <link rel="stylesheet" href="style/caroussel.css">
    <script src="javascript/caroussel.js"></script>
</div>
