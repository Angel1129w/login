<?php
$dbname = "newsize";
$host = "localhost";
$user = "postgres";
$password = "070223";
$port = "5432";
$usuario = $_POST['Usuario'];
$nombreCompleto = $_POST['NombreCompleto'];
$correo = $_POST['Correo'];
$password1 = $_POST['Password']; 

try {
    $conex = new PDO("pgsql:host=$host;dbname=$dbname;port=$port;user=$user;password=$password;port=$port;");
    $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO usuariosp (usuario,nombre_completo, correo, contraseña) VALUES (:usuario, :nombreCompleto, :correo, :contrasena)";
    $ps = $conex->prepare($sql);
    $ps->bindParam(':usuario', $usuario);
    $ps->bindParam(':nombreCompleto', $nombreCompleto);
    $ps->bindParam(':correo', $correo);
    $ps->bindParam(':contrasena', $password1);

    $st = $ps->execute();

    echo "Registro exitoso.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
