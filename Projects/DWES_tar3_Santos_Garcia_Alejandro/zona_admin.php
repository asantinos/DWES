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

$conn = conectarBD();

function listarPizzas($conn)
{
    $consulta = $conn->prepare("SELECT nombre, precio, ingredientes FROM pizzas");
    $consulta->execute();

    echo "<table border='1'>";
    echo "<tr><th>Nombre</th><th>Precio</th><th>Ingredientes</th></tr>";

    foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $row) {
        echo "<tr>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["precio"] . "€</td>";
        echo "<td><i>" . $row["ingredientes"] . "</i></td>";
        echo "</tr>";
    }

    echo "</table>";
}

// Cerrar sesión al hacer clic en "Cerrar sesión"
if (isset($_GET['cerrar_sesion'])) {
    session_start();
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domino's Pizza - Pedido</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["nombre"])) {
        echo "<h2>Bienvenido " . $_SESSION["nombre"] . "</h2>";
    }
    ?>

    <a href="?cerrar_sesion">Cerrar sesión</a>

    <input type="button" value="Editar pizza">

    <h1>Nuestras pizzas</h1>
    <?php
    listarPizzas($conn);
    ?>

    <br>

</body>

</html>
</body>

</html>