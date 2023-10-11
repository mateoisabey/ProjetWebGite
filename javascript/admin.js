$(document).ready(function () {
    $('#calendar').fullCalendar({

        editable: false,

    });
});

function getdates() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var dates = JSON.parse(this.responseText);

            $('#calendar').fullCalendar('addEventSource', function(start, end, timezone, callback) {
                var events = [];

                dates.forEach(function(date) {
                    events.push({
                        title: 'Réservation',
                        start: date,
                        allDay: true,
                        backgroundColor: 'red'
                    });
                });

                callback(events);
            });

            // Rafraîchissez le calendrier pour afficher les nouvelles données
            $('#calendar').fullCalendar('refetchEvents');
        }
    };
    xmlhttp.open("GET", "../php/recuperer_reservations.php", true);
    xmlhttp.send();
}

function addRes() {
    var titre = document.getElementById("titre").value;
    var debut = document.getElementById("debut").value;
    var fin = document.getElementById("fin").value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/enregistrementRes.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                console.log("Réponse reçue avec succès : " + xhr.responseText);
                // Traitez la réponse ici, si nécessaire
            } else {
                console.error("Une erreur s'est produite : " + xhr.status);
                // Traitez les erreurs de la requête ici, si nécessaire
                alert("Problème lors de l'enregistrement");
            }
        }
    };

    var data = "titre=" + encodeURIComponent(titre) + "&debut=" + encodeURIComponent(debut) + "&fin=" + encodeURIComponent(fin);

    xhr.send(data);
}






