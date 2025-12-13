<?php
if (
  !empty($_POST['nombre']) &&
  !empty($_POST['correo']) &&
  !empty($_POST['telefono']) &&
  !empty($_POST['mensaje'])
) {
    $nombre = trim($_POST['nombre']);
    $correoRemitente = trim($_POST['correo']);
    $telefono = trim($_POST['telefono']);
    $mensaje = trim($_POST['mensaje']);

    $asunto = 'Mensaje de mi sitio web (Agroindustrias Sostenibles)';
    $correoDestinatario = 'ajboquin06@gmail.com';

    $cuerpo  = "Nombre y apellido: " . $nombre . "\r\n";
    $cuerpo .= "Correo: " . $correoRemitente . "\r\n";
    $cuerpo .= "Telefono: " . $telefono . "\r\n";
    $cuerpo .= "Asunto: " . $asunto . "\r\n";
    $cuerpo .= "Enviado el " . date('d/m/Y', time()) . "\r\n";
    $cuerpo .= "Consulta: " . $mensaje . "\r\n";

    // RECOMENDADO: usa Reply-To con el correo del usuario
    // y un From "neutro" (algunos hostings bloquean From personalizado)
    $headers  = "Reply-To: " . $correoRemitente . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $mail = mail($correoDestinatario, $asunto, $cuerpo, $headers);

    if ($mail) {
        echo "<p style='color: rgba(0,100,0,0.85)'>Correo enviado exitosamente, pronto lo contactaremos!</p>";
    } else {
        echo "<p style='color: #e7b633'>No se pudo enviar (revisa configuración de correo del hosting).</p>";
    }
} else {
    echo "<p style='color: crimson'>Por favor, ingrese toda la información.</p>";
}
