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
        echo "Error conectando a la base de datos: " . $e->getMessage();
    }
}


function comprobar_usuario($usuario, $clave)
{
    $conn = conectarBD();

    $stmt = $conn->prepare("SELECT usuario, nombre, rol FROM usuarios WHERE usuario = :usuario AND clave = :clave");
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':clave', $clave);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("usuario" => $row['usuario'], "nombre" => $row['nombre'], "rol" => $row['rol']);
    } else {
        return FALSE;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usu = comprobar_usuario($_POST["usuario"], $_POST["clave"]);
    if ($usu == FALSE) {
        $err = TRUE;
    } else {
        session_start();
        //Guardamos usuario y rol
        $_SESSION["usuario"] = $usu["usuario"];
        $_SESSION["rol"] = $usu["rol"];
        $_SESSION["nombre"] = $usu["nombre"];

        //Redirigimos dependiendo del rol
        if ($_SESSION["rol"] == "1") {
            header("Location: zona_admin.php");
        } else {
            header("Location: pedido.php");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domino's Pizza</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
    <img width="100px" src="assets/Dominos_pizza_logo.svg.png" alt="Dominos Pizza Logo">

    <?php
    if (isset($err)) {
        echo "<p>Usuario o contraseña incorrectos.</p>";
    }
    ?>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="usuario">Usuario</label>
        <input value="<?php if (isset($usuario)) echo $usuario; ?>" name="usuario" type="text">

        <label for="clave">Contraseña</label>
        <input name="clave" type="password">
        <input type="submit" value="Iniciar sesión">

        <br>

        <a href="nuevo_usuario.php">Registrarse</a>
    </form>
</body>

</html>