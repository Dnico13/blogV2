<?php

// Assurez-vous que le formulaire a été soumis via la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    // ------------------------------------------
    // 1. Récupération et Nettoyage des Données
    // ------------------------------------------

    // je nettoie l'adresse email pour éviter les caractères de saut de ligne (Injection d'En-têtes)
    $email = str_replace(array("\r", "\n"), '', htmlspecialchars($_POST['email']));

    // je récupère et nettoie les autres données
    $nom = htmlspecialchars($_POST['name']);
    $message = htmlspecialchars($_POST['message']);
   
    // $telephone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; 
    // $prenom = isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : ''; 
     $objet = isset($_POST['objet']) ? htmlspecialchars($_POST['objet']) : ''; 

    // ------------------------------------------
    // 2. Validation de l'Email
    // ------------------------------------------

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Adresse email invalide. Veuillez vérifier le format.'); window.location.href = '/contact';</script>";
        exit;
    }

    // ------------------------------------------
    // 3. Configuration de l'Email
    // ------------------------------------------

    // Adresse email de destination (votre email de réception)
    $destinataire = "Dnico13@hotmail.com"; // <-- Votre adresse de réception

    // Adresse email pour la copie cachée (facultatif, pour trace)
    //$copie_cachee = "Dnico13@hotmail.com"; // <-- REMPLACEZ PAR L'EMAIL DE VOTRE CHOIX

    // Sujet de l'email
    $sujet = "Nouveau message du Portfolio - " . $nom; // Ajout du nom au sujet

    // L'expéditeur doit être une adresse de VOTRE domaine pour éviter les problèmes de spam/DMARC
    $expediteur = "contact@techforbusiness.fr"; // <-- Utilisez une adresse valide de votre domaine

    // ------------------------------------------
    // 4. En-têtes pour un email HTML structuré et sécurisé
    // ------------------------------------------
    
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    // L'expéditeur est votre propre adresse domaine
    $headers .= "From: Message du Blog  <" . $expediteur . ">" . "\r\n"; 
    // L'adresse de réponse est celle de l'utilisateur (Pour répondre facilement)
    $headers .= "Reply-To: <" . $email . ">" . "\r\n"; 
    // Copie cachée
    //$headers .= "Bcc: " . $copie_cachee . "\r\n"; 

    // ------------------------------------------
    // 5. Corps du message HTML
    // ------------------------------------------

    $corpsMessage = "
        <html>
            <head>
            <title>Nouveau message de contact</title>
                <style>
                    body { font-family: Arial, sans-serif; }
                    .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; }
                    .header { background-color: #f2f2f2; padding: 15px; text-align: center; border-radius: 8px 8px 0 0; }
                    h2 { color: #333; }
                    p { line-height: 1.6; }
                    .info { background-color: #f9f9f9; padding: 10px; border-radius: 5px; margin-bottom: 10px; }
                    .label { font-weight: bold; color: #555; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <h2>Nouveau message du Blog: www.techforbusiness.fr</h2>
                    </div>
                    <p class='info'><span class='label'>Nom :</span> " . $nom . "</p>
                    <p class='info'><span class='label'>Email :</span> " . $email . "</p>
                    <p class='info'><span class='label'>Objet :</span> " . $objet . "</p>
                    "
                    // Ajout conditionnel du téléphone si besoin
                    // . (isset($telephone) && $telephone ? "<p class='info'><span class='label'>Téléphone :</span> " . $telephone . "</p>" : '') .
                    . "
                    <hr>
                    <p><span class='label'>Message :</span></p>
                    <p>" . nl2br($message) . "</p>
                </div>
            </body>
        </html>
    ";

    // ------------------------------------------
    // 6. Envoi de l'email et Redirection
    // ------------------------------------------

    if (mail($destinataire, $sujet, $corpsMessage, $headers)) {
        // Redirection vers une page de succès
        echo "<script>alert('Votre message a été envoyé avec succès.'); window.location.href = '/';</script>";
    } else {
        // Redirection vers une page d'erreur
        echo "<script>alert('Une erreur est survenue lors de l'envoi de votre message. Veuillez réessayer plus tard.'); window.location.href = '/contact';</script>";
    }

} else {
    // Redirige si la page est accédée directement sans soumettre le formulaire
    header("Location: / ");
    exit;
}
?>
