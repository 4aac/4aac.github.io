<?php
// Solo procesar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Limpiar los datos del formulario
    $user_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject_user = htmlspecialchars($_POST['subject']);
    $topic = htmlspecialchars($_POST['topic']);
    $message_user = htmlspecialchars($_POST['text']);

    // Email al que se enviará
    $to = "asieracunacasal19@gmail.com";

    // Construir el asunto final
    $subject = "[" . $topic . "] " . $subject_user;

    // Construir el cuerpo del mensaje
    $message = "You received a new message from your website contact form:\n\n";
    $message .= "From: " . $user_email . "\n";
    $message .= "Topic: " . $topic . "\n";
    $message .= "Subject: " . $subject_user . "\n\n";
    $message .= "Message:\n" . $message_user;

    // Cabeceras del correo
    $headers = "From: " . $user_email . "\r\n";
    $headers .= "Reply-To: " . $user_email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Enviar correo
    if (mail($to, $subject, $message, $headers)) {
        echo "<p style='color:green;'>Thank you! Your message has been sent successfully.</p>";
    } else {
        echo "<p style='color:red;'>Oops! Something went wrong. Please try again later.</p>";
    }
} else {
    // Si se accede sin enviar el formulario
    echo "<p>Invalid request.</p>";
}
?>
