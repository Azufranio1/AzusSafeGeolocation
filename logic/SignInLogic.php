<?php
session_start();
include('../includes/Connection.php');

if (isset($_SESSION['idUser']) && isset($_SESSION['username'])) {
    header("Location: GeoMapa.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING) ?? '';
    $correo = filter_input(INPUT_POST, 'correo', FILTER_SANITIZE_EMAIL) ?? '';
    $password = $_POST['password'] ?? '';
    $ConPassword = $_POST['ConPassword'] ?? '';

    // Verificar que todos los campos estén llenos
    if (empty($username) || empty($correo) || empty($password) || empty($ConPassword)) {
        header("Location: SignIn.php?error=" . urlencode('Todos los campos son obligatorios'));
        exit();
    }

    // Verificar que el correo sea válido
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        header("Location: SignIn.php?error=" . urlencode('El correo electrónico no es válido'));
        exit();
    }

    // Verificar que las contraseñas coincidan
    if ($password !== $ConPassword) {
        header("Location: SignIn.php?error=" . urlencode('Las contraseñas no coinciden'));
        exit();
    }

    // Verificar la longitud mínima de la contraseña
    if (strlen($password) < 8) {
        header("Location: SignIn.php?error=" . urlencode('La contraseña debe tener al menos 8 caracteres'));
        exit();
    }

    // Verificar si el usuario o correo ya existen
    if (verificarUsuarioCorreo($username, $correo)) {
        header("Location: SignIn.php?error=" . urlencode('El usuario o correo ya están registrados'));
        exit();
    }

    // Generar ID de usuario y guardar datos temporalmente en la sesión
    $nuevoId = generarIdUsuario();
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $_SESSION['temp_registration'] = [
        'nuevoId' => $nuevoId,
        'username' => $username,
        'correo' => $correo,
        'hashed_password' => $hashed_password
    ];

    // Redirigir a la página de código de recuperación
    header("Location: RecuperacionSetup.php");
    exit();
}

function verificarUsuarioCorreo($username, $correo) {
    $con = connection();
    $stmt = $con->prepare("SELECT * FROM usuario WHERE username = ? OR correo = ?");
    $stmt->bind_param("ss", $username, $correo);
    $stmt->execute();
    $result = $stmt->get_result();
    $exists = $result->num_rows > 0;
    $stmt->close();
    $con->close();
    return $exists;
}

function generarIdUsuario() {
    $con = connection();
    $result = $con->query("SELECT MAX(CAST(SUBSTRING(idUser, 5) AS UNSIGNED)) as max_id FROM usuario WHERE idUser LIKE 'USR-%'");
    $row = $result->fetch_assoc();
    $maxId = $row['max_id'] ?? 0;
    $newNumericId = $maxId + 1;
    $newId = 'USR-' . str_pad($newNumericId, 3, '0', STR_PAD_LEFT);
    $con->close();
    return $newId;
}
?>