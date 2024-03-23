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
    $nombre = $_POST["nombre"];
    $apellido_m = $_POST["apellido_m"];
    $apellido_p = $_POST["apellido_p"];
    $modelo_c = $_POST["modelo_c"];
    $placa_c = $_POST["placa_c"];

    // Preparar la consulta SQL para insertar el nuevo cliente en la base de datos
    $query = "INSERT INTO clientes (nombre, apellido_m, apellido_p, modelo_c, placa_c) VALUES ('$nombre', '$apellido_m', '$apellido_p', '$modelo_c', '$placa_c')";

    // Ejecutar la consulta
    if (mysqli_query($conn, $query)) {
        // Cliente agregado correctamente
        echo "<script>alert('Cliente agregado correctamente'); window.location.href = 'clientes.html';</script>";
    } else {
        // Error al agregar cliente
        echo "Error al agregar cliente: " . mysqli_error($conn);
    }
} else {
    // Manejar la búsqueda de clientes si es necesario (puedes mantener este bloque o eliminarlo según tus necesidades)
    if (isset($_GET['buscar'])) {
        $search = $_GET['buscar'];
        // Realizar la consulta para buscar clientes con el nombre que coincida con la búsqueda
        $query = "SELECT * FROM clientes WHERE nombre LIKE '%$search%' ORDER BY nombre ASC";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Error en la consulta: " . mysqli_error($conn));
        }

        // Preparar los datos como un array asociativo
        $clientes = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $clientes[] = $row;
        }

        // Devolver los resultados de la búsqueda en formato JSON
        echo json_encode($clientes);
    } else {
        // Si no hay una búsqueda, simplemente devolver todos los clientes ordenados por nombre
        $query = "SELECT * FROM clientes ORDER BY nombre ASC";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Error en la consulta: " . mysqli_error($conn));
        }

        // Preparar los datos como un array asociativo
        $clientes = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $clientes[] = $row;
        }

        // Devolver todos los clientes en formato JSON
        echo json_encode($clientes);
    }
}

// Cerrar la conexión
mysqli_close($conn);
?>

