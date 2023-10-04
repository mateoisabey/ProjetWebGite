var map = L.map('map').setView([48.8588443, 2.2943506], 15);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([48.8588443, 2.2943506]).addTo(map)
    .bindPopup('Mon point GPS fixe')
    .openPopup();