<?php
// Establecer la conexión con la base de datos
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "proyecto.ING1.";
$dbname = "gyc";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$id = $_POST['productId'];
$nombre = $_POST['nombre'];
$codigo = $_POST['codigo'];
$descripcion = $_POST['descripcion'];
$color = $_POST['color'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$disponibles = $_POST['disponibles'];
$faltantes = $_POST['faltantes'];

// Consulta SQL para actualizar los datos del producto
$sql = "UPDATE ventas SET nombre_p = '$nombre', codigo_p = '$codigo', descripcion_p = '$descripcion', color = '$color', precio = $precio, cantidad = $cantidad, disponibles = $disponibles, faltantes = $faltantes WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Cambios guardados exitosamente";
} else {
    echo "Error al guardar cambios: " . $conn->error;
}

$conn->close();
?>


