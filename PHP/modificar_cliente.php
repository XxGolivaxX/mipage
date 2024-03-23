<?php
// Establecer conexión a la base de datos
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "proyecto.ING1.";
$dbname = "gyc";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("No hay conexión: " . mysqli_connect_error());
}

// Recibir y procesar los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET["id"];
    $nombre = $_POST["nombre"];
    $apellido_m = $_POST["apellido_m"];
    $apellido_p = $_POST["apellido_p"];
    $modelo_c = $_POST["modelo_c"];
    $placa_c = $_POST["placa_c"];

    // Preparar la consulta SQL para actualizar el cliente en la base de datos
    $query = "UPDATE clientes SET nombre='$nombre', apellido_m='$apellido_m', apellido_p='$apellido_p', modelo_c='$modelo_c', placa_c='$placa_c' WHERE id=$id";

    // Ejecutar la consulta
    if (mysqli_query($conn, $query)) {
        // Cliente actualizado correctamente
        echo "Cliente actualizado correctamente";
    } else {
        // Error al actualizar cliente
        echo "Error al actualizar cliente: " . mysqli_error($conn);
    }
}

// Cerrar la conexión
mysqli_close($conn);
?>
