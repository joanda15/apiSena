<?php
session_start();

// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Datos de conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password_db = ""; // Contraseña de la base de datos
    $database = "nova";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password_db, $database);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta SQL para verificar las credenciales del empleado
    $sql = "SELECT * FROM empleado WHERE emailEmpleado = '$email' AND contraseEmpleado = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Credenciales válidas, iniciar sesión y redirigir al usuario a su página principal
        $_SESSION['email'] = $email;
        echo "<script>alert('Inicio de sesión exitoso');</script>";
        exit();
    } else {
        // Credenciales inválidas, mostrar un mensaje de error
        echo "<script>alert('Email o contraseña incorrectos.'); window.location='index.html';</script>";
        exit();
    }
}
?>
