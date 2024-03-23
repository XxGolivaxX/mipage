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

// Verificar si se recibió una solicitud de eliminación
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    // Obtener el ID del producto a eliminar
    $id = $_POST["id"];

    // Preparar la consulta para eliminar el producto
    $query = "DELETE FROM ventas WHERE id = $id";

    // Ejecutar la consulta
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Error al eliminar el producto: " . mysqli_error($conn));
    }

    // Devolver una respuesta exitosa
    echo "Producto eliminado exitosamente";
} else {
    // Realizar la consulta para obtener los datos de ventas
    $query = "SELECT * FROM ventas";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Error en la consulta: " . mysqli_error($conn));
    }

    // Preparar los datos como un array asociativo
    $ventas = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $ventas[] = $row;
    }

    // Devolver los datos de ventas en formato JSON
    echo json_encode($ventas);
}

// Cerrar la conexión
mysqli_close($conn);
?>


