<?php
$host = 'localhost'; // http://localhost/phpmyadmin/index.php?route=/sql&db=nova&table=empleado&pos=0
$dbname = 'nova'; // http://localhost/phpmyadmin/index.php?route=/database/structure&db=nova
$username = 'root';
$password = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obtener datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta SQL para verificar el inicio de sesión
    $sql = "SELECT * FROM empleados WHERE emailEmpleados = ? AND passEmpleados = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email, $password]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo "Inicio de sesión exitoso";
        // Puedes redireccionar a otra página aquí si lo deseas
    } else {
        echo "Error al iniciar sesión";
    }
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>

