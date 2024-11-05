<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Azu's Safe Geolocation</title>
    <link rel="icon" type="image/png" href="Resources/imgs/ASGILogo.png">
    <link rel="stylesheet" href="CSS/Index.css">
</head>
<body>

<header>
    <img src="Resources/imgs/ASGTLogo.png" alt="Logo">
    <div class="buttons">
        <?php include('includes/Index.php');?>
    </div>
</header>

<div class="main-image">
    <div class="blurred-background"></div>
    <div class="text-overlay">Conoce la Ubicación en Tiempo Real</div>
</div>

<section class="description">
    <div>
        <h2>Seguimiento en Tiempo Real</h2>
        <p>Nuestro sistema permite monitorear dispositivos en tiempo real, manteniéndote informado sobre su ubicación en todo momento.</p>
        <img src="Resources/imgs/seguimiento.png" alt="Seguimiento en tiempo real">
    </div>
    <div>
        <h2>Alertas de Zona de Seguridad</h2>
        <p>Define geocercas y recibe alertas automáticas cuando un dispositivo entra o sale de las zonas seguras establecidas.</p>
        <img src="Resources/imgs/geocercas.png" alt="Alertas de geocerca">
    </div>
</section>

<section class="mission-vision">
    <div>
        <h3>Misión</h3>
        <p>Desarrollar un sistema de geolocalización preciso y confiable que permita a los usuarios monitorear dispositivos en tiempo real, establecer zonas de control y recibir alertas automáticas, asegurando la seguridad y el control en áreas críticas.</p>
    </div>
    <div>
        <h3>Visión</h3>
        <p>Convertirse en una plataforma de geolocalización avanzada y accesible que facilite el seguimiento de dispositivos e integre funcionalidades adicionales, potenciando el control de procesos y la seguridad.</p>
    </div>
</section>

<footer>
    <img src="Resources/imgs/ASGTLogo.png" alt="Logo">
    <div class="contact-info">
        <p>Contacto: carlosaliaga037@gmail.com</p>
        <p>Teléfono: +591 60571247</p>
        <p>NextGen Solution</p>
    </div>
</footer>

</body>
</html>