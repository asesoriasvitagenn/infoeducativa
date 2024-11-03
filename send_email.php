<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validación del email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email no válido.";
        exit;
    }

    $to = "vale_gm145@hotmail.com"; // Cambia esto por tu dirección de correo
    $subject = "Nuevo mensaje de contacto";
    $body = "Nombre: $name\nEmail: $email\nMensaje: $message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Mensaje enviado con éxito.";
    } else {
        echo "Error al enviar el mensaje.";
    }
    print_r($_POST);
}
?>