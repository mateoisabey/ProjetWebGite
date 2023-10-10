<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Adresse e-mail de destination
    $destinataire = "mateoisabey@gmail.com";

    // Sujet de l'e-mail
    $sujet = "Nouveau message de contact de $nom";

    // Corps de l'e-mail
    $corps_message = "De : $nom\n";
    $corps_message .= "E-mail : $email\n";
    $corps_message .= "Message :\n$message";

    // En-têtes de l'e-mail
    $entetes = "From: $email\r\nReply-To: $email\r\n";

    // Envoyer l'e-mail
    if (mail($destinataire, $sujet, $corps_message, $entetes)) {
        echo "Votre message a été envoyé avec succès.";
    } else {
        echo "Une erreur s'est produite lors de l'envoi de votre message.";
    }
} else {
    echo "Accès invalide au script.";
}
?>
