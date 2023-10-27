<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Figuiès</title>
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="./javascript/index.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
    <body>
        <div>
        <?php
        include("page/menu.html");
        ?>
        </div>
        <header class="titre">
            <img id="logo" src="images/LOGO-final-fond-transparent.png" alt="Le Logo">

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
                <button class="button" type="button" onclick=""><a href="page/contact.php">Réservez maintenant</a></button>
                <p>À partir de 550€ / semaine</p>
            </div>
            <div class="section-background-Color2">
                <?php
                include("page/caroussel.php");
                ?>
            </div>
            <div class="section-background-Color1" id="aPropos">
                <div class="description">
                    <p>Notre maison en pierre, située sur les hauteurs, entre vignes, falaises et le causse vous séduira par sa vue magnifique et son environnement agréable.</p>
                    <div id="diamond-button-description" class="diamond-background">
                        <img class="diamond" src="./images/icon-arrow-down.svg" alt="Découvrir la description">
                    </div>
                    <div id="description-show" class="toggle-collapse">
                        <p>
                            A 20 mn de Rodez, 10 mn de Marcillac et 30 mn de Conques, vous êtes <strong>idéalement situés pour
                                visiter </strong> quelques un des sites naturels ou culturels remarquables de l'Aveyron.
                        </p>
                        <p>
                            Figuies est un hameau charmant, que l'on visite à pied. Une belle balade par un chemin, vous
                            mènera de la cascade de la Roque, à celles de Salles-la source, en profitant de nombreux
                            points de vue sur le paysage. On adore aussi le sentier à flanc de versant avec des passages
                            en encorbellement creusé dans la roche ! Il nous fait pénétrer dans le paysage des falaises
                            calcaires avec de beaux points de vue sur la vallée. Vous êtes sur le GR 62 de Rodez à
                            Conques.
                        </p>
                        <p>
                            Le gîte de Figuies, d'une superficie de 75 m² sur deux niveaux, a été <strong> entièrement
                            rénové en 2021 </strong>. Une agréable décoration allie un style contemporain et des
                            matériaux naturels comme le bois et le rotin.
                        </p>
                        <p>
                            Il se compose, au rez-de-chaussée d'une pièce lumineuse ouverte sur le paysage grâce à une
                            grande baie vitrée. De 35 m² et climatisée, cet espace offre une <strong>cuisine moderne
                            bien équipée</strong>, un séjour et un coin salon chaleureux et cosys.
                        </p>
                        <p>
                            La <strong>terrasse plein sud</strong>, offre une <strong>vue imprenable sur la vallée
                            </strong> que l'on peut contempler en prenant ses repas. Vous pourrez même admirer de
                            superbes couchers du soleil.
                        </p>
                        <p>
                            A l'étage, vous disposerez de <strong>deux chambres mansardées</strong> et confortables.
                            L'une avec un lit en 140/190 et l'autre avec deux lits en 90/190. Vous y trouverez aussi la
                            salle de bain avec son WC.
                        </p>
                        <p>
                            Le <strong>jardin</strong>, très agréable, est non clos. Pourvu d'un bar extérieur, d'un
                            barbecue, d'un évier et de mobilier de jardin, vous pourrez y prendre vos repas ou vous
                            reposer à l'ombre de la glycine. Un WC et une douche complètent l'équipement.
                        </p>
                        <p>
                            Pour des vacances authentiques et au grand air, dans un <strong>lieu paisible à l'écart de
                            la circulation</strong>, vous vous sentirez chez vous tout en étant dépaysé.
                        </p>
                    </div>
                </div>
            </div>
            <div class="section-background-Color2" id="nosService">
                <div class="section-equipment" >
                    <div>
                        <h2 class="titre">Capacité</h2>
                        <div class="equipment-details">
                            <p><strong>Personne</strong>: 4</p>
                            <p><strong>Chambre</strong>: 2</p>
                            <p><strong>Personne (maximum)</strong>: 4</p>
                        </div>
                    </div>
                    <div>
                        <h2 class="titre">Equipements</h2>
                        <div class="equipment-details">
                            <div class="equipment-logo-and-text">
                                <img class="little-logo" src="./images/icon-animaux.png" alt="logo animaux">
                                <p>Animaux acceptés</p>
                            </div>
                            <div class="equipment-logo-and-text">
                                <img class="little-logo" src="./images/icon-parking.png" alt="logo parking">
                                <p>Parking</p>
                            </div>
                            <div class="equipment-logo-and-text">
                                <img class="little-logo" src="./images/icon-terrasse.png" alt="logo terrasse">
                                <p>Terrasses</p>
                            </div>
                            <div class="equipment-logo-and-text">
                                <img class="little-logo" src="./images/icon-tv.png" alt="logo television">
                                <p>Télévision</p>
                            </div>
                        </div>
                        <div id="diamond-button-equipment" class="diamond-background">
                            <img class="diamond" src="./images/icon-arrow-down.svg" alt="Découvrir la description">
                        </div>
                        <div id="equipment-show" class="toggle-collapse">
                            <div class="equipment-details-list">
                                <p>- Abris pour vélo ou VTT</p>
                                <p>- Barbecue</p>
                                <p>- Cuisine équipée</p>
                                <p>- Habitation indépendante</p>
                                <p>- Jardin</p>
                                <p>- Local matériel fermé</p>
                                <p>- Parking privé</p>
                                <p>- Salon de jardin</p>
                                <p>- Terrain non clos</p>
                                <p>- Terrasse</p>
                                <p>- Animaux acceptés (Payant)</p>
                                <p>- Location de linge (Payant)</p>
                                <p>- Ménage (Payant)</p>
                                <p>- Climatisation</p>
                                <p>- Cheminée</p>
                                <p>- Lave vaisselle</p>
                                <p>- Sèche cheveux</p>
                                <p>- Télévision</p>
                                <p>- Escalade à 5km</p>
                                <p>- VTT / Vélo</p>
                                <p>- Musée à 3km</p>
                                <p>- Randonnée pédestre</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h2 class="titre">Tarifs 2023</h2>
                        <p><strong>- Semaine Moyenne saison</strong> à 550€</p>
                        <p><strong>- Nuitée Moyenne saison</strong> à 85€</p>
                        <p><strong>- Semaine Haute Saison</strong> à 650€</p>
                        <p><strong>- Nuitée Haute Saison</strong> à 110€</p>
                    </div>
                    <div>
                        <h2 class="titre">Moyens de paiment</h2>
                        <div class="equipment-details">
                            <p>Chèques</p>
                            <p>Espèces</p>
                            <p>Virements</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-background-Color1">
                <div id="map" class="map"></div>
                <script src="javascript/map.js"></script>

            </div>
        </section>
    <footer>
        <div class="foot">
            <img class="imgFoot" src="images/tel.png">
            <p>+33(0) 6 41 57 73 20</p>
        </div>
        <div class="foot">
            <img class="imgFoot" src="images/mail.png">
            <p>beatrice.boyer29@orange.fr</p>
        </div>
        <div class="foot">
            <img class="imgFoot" id="facebook" src="images/facebook.png">
            <p>gitefiguies</p>
        </div>
    </footer>

    </body>
</html>