<?php
$host = '192.168.4.130';
$user = 'adminsql';
$pass = 'password';
$dbname = 'prueba';
$port = 3306; // opcional

$conexion = new mysqli($host, $user, $pass, $dbname, $port);

if ($conexion->connect_error) {
    die("❌ Error de conexión a MariaDB: " . $conexion->connect_error);
} else {
    echo "✅ Conexión exitosa a la base de datos MariaDB '$dbname'";
}

$conexion->close();
?>
