<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération et nettoyage des données du formulaire
    $name = sanitize_input($_POST['name']);
    $email = sanitize_input($_POST['email']);
    $subject = sanitize_input($_POST['subject']);
    $message = sanitize_input($_POST['message']);

    // Adresse e-mail du destinataire
    $to = "selebungapatrick@gmail.com";
    
    // Sujet de l'e-mail
    $email_subject = "Message de Contact: $subject";
    
    // Corps du message
    $email_body = "Nom: $name\n";
    $email_body .= "E-mail: $email\n";
    $email_body .= "Message: \n$message\n";

    // En-têtes de l'e-mail
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Envoi de l'e-mail
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<script>alert('Votre message a été envoyé. Merci !');</script>";
    } else {
        echo "<script>alert('Désolé, une erreur s\'est produite.');</script>";
    }
}

// Fonction de nettoyage des entrées
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
