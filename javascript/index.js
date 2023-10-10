document.addEventListener('DOMContentLoaded', function () {
    var descriptionDiamondButton = document.getElementById('diamond-button-description');
    var descriptionSection = document.getElementById('description-show');
    var equipmentDiamondButton = document.getElementById('diamond-button-equipment');
    var equipmentSection = document.getElementById('equipment-show');

    descriptionDiamondButton.addEventListener('click', function () {
        if (descriptionSection.style.display === 'none' || descriptionSection.style.display === '') {
            descriptionSection.style.display = 'block';
        } else {
            descriptionSection.style.display = 'none';
        }
    });

    equipmentDiamondButton.addEventListener('click', function () {
        if (equipmentSection.style.display === 'none' || equipmentSection.style.display === '') {
            equipmentSection.style.display = 'block';
        } else {
            equipmentSection.style.display = 'none';
        }
    });
});