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

// Obtener el ID del producto desde la URL
$id = $_GET['id'];

// Consulta SQL para obtener el producto por su ID
$sql = "SELECT * FROM ventas WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Convertir el resultado a un arreglo asociativo
    $producto = $result->fetch_assoc();
    // Devolver el producto como JSON
    echo json_encode($producto);
} else {
    echo "Producto no encontrado";
}

$conn->close();
?>


