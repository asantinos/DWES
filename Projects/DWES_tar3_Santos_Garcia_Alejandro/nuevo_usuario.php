<?php

function conectarBD()
{
    $cadena_conexion = 'mysql:dbname=dwes_t3;host=127.0.0.1';
    $usuario = "root";
    $clave = "";

    try {
        $bd = new PDO($cadena_conexion, $usuario, $clave);
        return $bd;
    } catch (PDOException $e) {
        echo "Error conectando a la bd: " . $e->getMessage();
    }
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $usuario = $_POST["usuario"];
    $nombre = $_POST["nombre"];
    $clave = $_POST["clave"];
    $correo = $_POST["correo"];
    $rol = 2; // Asignamos rol 2 (cliente) por defecto

    // Conectar a la base de datos
    $conn = conectarBD();

    // Insertar el nuevo usuario en la base de datos
    $stmt = $conn->prepare("INSERT INTO usuarios (usuario, nombre, clave, correo, rol) VALUES (:usuario, :nombre, :clave, :correo, :rol)");
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':clave', $clave);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':rol', $rol);

    try {
        $stmt->execute();
        // Redirigimos a la página de pedido.php con la sesion iniciada
        session_start();
        $_SESSION["usuario"] = $usuario;
        $_SESSION["rol"] = $rol;
        $_SESSION["nombre"] = $nombre;
        header("Location: pedido.php");
        
    } catch (PDOException $e) {
        echo "Error al crear el usuario: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Domino's Pizza - Registrar</title>
</head>

<body>
    <h2>Resgistro de nuevo usuario</h2>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required><br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br><br>

        <label for="clave">Clave:</label>
        <input type="password" name="clave" required><br><br>

        <label for="correo">Correo:</label>
        <input type="email" name="correo" required><br><br>

        <input type="submit" value="Registrar">

        <a href="index.php">Volver</a>
    </form>
</body>

</html>