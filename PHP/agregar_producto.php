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
    $codigo_p = $_POST["codigo_p"];
    $nombre_p = $_POST["nombre_p"];
    $descripcion_p = $_POST["descripcion_p"];
    $color = $_POST["color"];
    $cantidad = $_POST["cantidad"];
    $precio = $_POST["precio"];

    // Preparar la consulta SQL para insertar el nuevo producto en la base de datos
    $query = "INSERT INTO ventas (codigo_P, nombre_p, descripcion_p, color, cantidad, precio) VALUES ('$codigo_p', '$nombre_p', '$descripcion_p', '$color', '$cantidad', '$precio')";

    // Ejecutar la consulta
    if (mysqli_query($conn, $query)) {
        // Producto agregado correctamente
        // Redirigir al usuario a la página de producto guardado con los datos
        header("Location: ../PAGINAS/producto_guardado.html?codigo_p=$codigo_p&nombre_p=$nombre_p&descripcion_p=$descripcion_p&color=$color&cantidad=$cantidad&precio=$precio");
        exit();
    } else {
        // Error al agregar producto
        echo "Error al agregar producto: " . mysqli_error($conn);
    }
}

// Cerrar la conexión
mysqli_close($conn);
?>
