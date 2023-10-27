<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page de Contact</title>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet'/>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
    <link rel="stylesheet" href="../style/contact.css">
    <script src="../javascript/admin.js"></script>
</head>
<body onload="getdates()">
<header class="titre">
    <H1 id="titreMenu">Figuiès</H1>
    <div class="head" id="log">
        <a href="../index.php">Acceuil</a>
    </div>
</header>
<section>
    <h1>Contactez-nous</h1>
    <div class="contact-info">

        <p><strong>Nom de l'entreprise :</strong> Gîte des figuier</p>
        <p><strong>Téléphone :</strong> +33(0) 6 41 57 73 20</p>
        <p><strong>Email :</strong> beatrice.boyer29@orange.fr</p>

    </div>
    <h1>Disponibilité :</h1>
    <div id="calendar" style="width: 600px; height: 400px;"></div>
</section>
</body>
</html>
