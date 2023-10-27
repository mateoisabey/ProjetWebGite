var map = L.map('map').setView([44.44898830120307, 2.493317205079201], 14);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
}).addTo(map);

L.marker([44.44898830120307, 2.493317205079201]).addTo(map)
    .bindPopup('Gîte Figuies')
    .openPopup();