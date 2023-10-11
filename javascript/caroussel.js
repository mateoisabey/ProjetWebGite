let currentSlide = 0;
let slides = [];
let imageIds = [];

function showSlide(n) {
    slides[currentSlide].style.display = 'none';
    currentSlide = (n + slides.length) % slides.length;
    slides[currentSlide].style.display = 'block';
}

function changeSlide(n) {
    showSlide(currentSlide + n);
}


async function loadImages() {
    const response = await fetch('php/get_images.php');
    if (response.ok) {
        const images = await response.json();

        images.forEach(function (image) {
            const imgElement = document.createElement('img');
            imgElement.src = 'data:image/jpeg;base64,' + image.image_data;
            imgElement.style.display = 'none'; // Cachez toutes les images par défaut
            imageContainer.appendChild(imgElement);
            slides.push(imgElement);
            imageIds.push(image.id); // Stockez les ID dans le tableau imageIds
        });

        if (slides.length > 0) {
            slides[0].style.display = 'block'; // Affichez la première image
            currentSlide = 0;
        }
    } else {
        console.error('La requête AJAX a échoué.');
    }
}
function deleteImage() {
    if (slides.length > 0) {
        const imageToDelete = slides[currentSlide];
        const imageId = imageIds[currentSlide]; // Récupérez l'ID de l'image actuellement affichée

        // Supprimez l'image du carrousel
        imageContainer.removeChild(imageToDelete);
        slides.splice(currentSlide, 1);
        imageIds.splice(currentSlide, 1);

        // Effectuez une requête AJAX pour supprimer l'image de la base de données en utilisant imageId
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "php/suppressionImage.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Suppression réussie dans la base de données
                console.log("L'image avec l'ID " + imageId + " a été supprimée de la base de données.");
            }
        };

        // Envoyez l'ID de l'image à supprimer
        const data = "image_id=" + imageId;
        xhr.send(data);
    }
}


loadImages();
