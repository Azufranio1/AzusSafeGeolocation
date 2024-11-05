<?php include("../logic/SignInLogic.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="icon" type="image/png" href="../Resources/imgs/ASGILogo.png">
    <link rel="stylesheet" href="../CSS/Formularios.css">
</head>
<body>
    <div class="users-form">
        <img src="../Resources/imgs/ASGTLogo.png" alt="Company Logo">
        <h1>Regístrate</h1>
        <form method="POST" action="" id="registrationForm">
            <input type="text" name="username" placeholder="Nombre de usuario" required>
            <input type="email" name="correo" placeholder="Correo electrónico" required>
            <input type="password" name="password" id="password" placeholder="Contraseña" required>
            <div class="password-requirements">
                <div class="requirement" id="length">Mínimo 8 caracteres</div>
                <div class="requirement" id="uppercase">Al menos una mayúscula</div>
                <div class="requirement" id="lowercase">Al menos una minúscula</div>
                <div class="requirement" id="number">Al menos un número</div>
                <div class="requirement" id="special">Al menos un carácter especial (!@#$%^&*)</div>
            </div>
            <input type="password" name="ConPassword" id="confirmPassword" placeholder="Confirmar Contraseña" required>
            <div class="requirement" id="match">Las contraseñas coinciden</div>
            <?php
            if (isset($_GET['error'])) {
                echo '<div class="error">' . htmlspecialchars($_GET['error']) . '</div>';
            }
            ?>
            <input type="submit" value="Registrarse">
        </form>
        <br>
        <div class="login-link">
            <a href="StartSession.php">¿Ya tienes cuenta? Inicia sesión</a>
        </div>
    </div>

    <script src="../JS/SignIn.js"></script>
</body>
</html>