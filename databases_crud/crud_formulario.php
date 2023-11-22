<?php
function conectarBD()
{
    $cadena_conexion = 'mysql:dbname=dwes_t3;host=127.0.0.1';
    $usuario = "root";
    $clave = "";

    try {
        $bd = new PDO($cadena_conexion, $usuario, $clave);
        //echo "Conexión realizada con éxito";
        return $bd;
    } catch (PDOException $e) {
        echo "Error conectando a la base de datos: " . $e->getMessage();
    }
}
$conn = conectarBD();
function listarPizzas($conn, $precioFiltro = null)
{
    $sql = "SELECT nombre, precio FROM pizzas";
    if ($precioFiltro != null) {
        $sql .= " WHERE precio = :precio";
    }

    $sql = $conn->prepare($sql);

    if ($precioFiltro != null) {
        $sql->bindParam(':precio', $precioFiltro, PDO::PARAM_INT);
    }

    $sql->execute();

    foreach ($sql->fetchAll(PDO::FETCH_ASSOC) as $row) {
        echo $row["nombre"] . " " . $row["precio"] . "€.<br>";
    }
}

// Procesar el formulario
$precioFiltrado = null;
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["precio"])) {
    $precioFiltrado = $_POST["precio"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrar pizza por precio</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <label for="precio">Introduzca el precio</label>
        <input type="text" name="precio" id="precio">
        <button action="submit">Buscar</button>
    </form>

    <h1>Nuestras pizzas</h1>

    <?php
    listarPizzas($conn, $precioFiltrado);
    ?>

</body>

</html>