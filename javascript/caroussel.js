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

let observer;

function createObserver() {
    observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const img = entry.target;
                const src = img.getAttribute('data-src');
                img.setAttribute('src', src);
                observer.unobserve(img);
            }
        });
    }, { threshold: 0.5 });
}

async function loadImages() {
    const response = await fetch('php/get_images.php');
    if (response.ok) {
        const images = await response.json();

        images.forEach(function (image) {
            const imgElement = document.createElement('img');
            imgElement.setAttribute('data-src', 'data:image/jpeg;base64,' + image.image_data);
            imgElement.style.display = 'none';
            imageContainer.appendChild(imgElement);
            slides.push(imgElement);
            imageIds.push(image.id);

            observer.observe(imgElement);
        });

        if (slides.length > 0) {
            slides[0].style.display = 'block';
            currentSlide = 0;
        }
    } else {
        console.error('La requête AJAX a échoué.');
    }
}


createObserver();
loadImages();

function deleteImage() {
    if (slides.length > 0) {
        const imageToDelete = slides[currentSlide];
        const imageId = imageIds[currentSlide];

        imageContainer.removeChild(imageToDelete);
        slides.splice(currentSlide, 1);
        imageIds.splice(currentSlide, 1);

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "php/suppressionImage.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log("L'image avec l'ID " + imageId + " a été supprimée de la base de données.");
            }
        };
        const data = "image_id=" + imageId;
        xhr.send(data);
    }
}


let i = 0;

function repeatAction() {
    changeSlide(1);
    i++;

    if (i >= 80) {
        clearInterval(interval);
    }
}

const interval = setInterval(repeatAction, 6000);
