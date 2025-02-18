<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['first-name'];
    $cognome = $_POST['last-name'];
    $email = $_POST['email'];
    $messaggio = $_POST['message'];
    $captcha = $_POST['captcha'];

    // Verifica la risposta al CAPTCHA
    if ($captcha != '5') {
        echo "Errore: Risposta al CAPTCHA errata!";
        exit;
    }

    // Imposta l'email a cui inviare il modulo
    $to = "mirko@walloandfriends.it";
    $subject = "Nuovo messaggio da $nome $cognome";

    // Corpo dell'email
    $message = "Nome: $nome\n";
    $message .= "Cognome: $cognome\n";
    $message .= "Email: $email\n\n";
    $message .= "Messaggio:\n$messaggio";

    // Intestazioni email
    $headers = "From: $email";

    // Invia l'email
    if (mail($to, $subject, $message, $headers)) {
        echo "Messaggio inviato con successo!";
    } else {
        echo "Errore nell'invio del messaggio. Riprova più tardi.";
    }
} else {
    echo "Errore: il modulo non è stato inviato correttamente.";
}
?>
