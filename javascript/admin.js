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

