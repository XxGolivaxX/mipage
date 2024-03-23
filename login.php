<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "proyecto.ING1.";
$dbname = "gyc";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) 
{
    die("No hay conexión: ".mysqli_connect_error());
}

$nombre = $_POST["txtusuario"];
$pass = $_POST["txtpassword"];

$query = mysqli_query($conn,"SELECT * FROM login WHERE usuario = '".$nombre."' and password = '".$pass."'");
$nr = mysqli_num_rows($query);

if($nr == 1)
{
    session_start(); // Inicia la sesión
    $_SESSION['username'] = $nombre; // Guarda el nombre de usuario en la sesión
    header("Location: principal.html");
    exit; // Termina el script para evitar que se ejecute más código innecesario
}
else if ($nr == 0) 
{
    echo "<script> alert('Error');window.location= 'login.html' </script>";
    exit; // Termina el script después de la redirección
}

?>
