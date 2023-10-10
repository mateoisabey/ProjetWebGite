<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Figuiès</title>
    <link rel="stylesheet" href="style/index.css">




</head>
    <body>
        <div>
        <?php
        include("page/menu.html");
        ?>
        </div>
        <header class="titre">

            <H1>Figuiès</H1>
            <div class="head" id="log">

                <?php
                session_start();

                if (isset($_SESSION["loggedin"])) {
                    // Si l'utilisateur est connecté, affichez le bouton de déconnexion
                    echo '<a href="php/logout.php">Logout</a> 
                            <a href="page/admin.php">admin</a>';
                } else {
                    // Si l'utilisateur n'est pas connecté, affichez le bouton de connexion
                    echo '<a href="page/login.php">Login</a>';
                }
                ?>
            </div>

        </header>
        <section>
            <div class="section-background">
                <!-- Todo: change the link -->
                <button class="button" type="button" onclick="">Réservez maintenant</button>
            </div>
            <div class="section-background-Color1">

            </div>
            <div class="section-background-Color2">

            </div>
            <div class="section-background-Color1">
                <div id="map" style="width: 600px; height: 400px;"></div>
                <script src="javascript/map.js"></script>
            </div>
        </section>

    </body>
</html>