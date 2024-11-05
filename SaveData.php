<?php 
include('includes/Connection.php');
    $con = connection();

    $chip = isset($_GET['idChip']) ? $_GET['idChip'] : null;
    $lat = isset($_GET['lat']) ? $_GET['lat'] : null;
    $lon = isset($_GET['lon']) ? $_GET['lon'] : null;

    if ($lat === null || $lon === null) {
        echo "Falta latitud o longitud";
        exit;
    }

    if ($chip === null) {
        echo "IdChipFaltante";
        exit;
    }

    $stmt = $con->prepare("INSERT INTO coordenadas (idChip, longitud, latitud) VALUES (?, ?, ?)");
    $stmt->bind_param("sdd", $chip, $lon, $lat);

    if ($stmt->execute()) {
        echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $con->close();
?>
