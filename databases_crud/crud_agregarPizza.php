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

function listarPizzas($conn)
{
    // Preparamos la consulta
    $consulta = $conn->prepare("SELECT nombre, precio FROM pizzas");
    // Ejecutamos la consulta
    $consulta->execute();

    // Listamos las pizzas
    foreach ($consulta as $row) {
        echo $row['nombre'] . " - " . $row['precio'] . "€<br>";
    }
}

function agregarPizza($conn)
{
    // Revisa si se ha enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recibimos los datos del formulario
        $nombrePizza = $_POST['nombre'];
        $costePizza = $_POST['coste'];
        $precioPizza = $_POST['precio'];
        $ingredientesPizza = $_POST['ingredientes'];

        // Preparamos la consulta SQL
        $sql = $conn->prepare("INSERT INTO pizzas (nombre, coste, precio, ingredientes) VALUES (:nombre, :coste, :precio, :ingredientes)");

        // Vinculamos los parámetros
        $sql->bindParam(':nombre', $nombrePizza);
        $sql->bindParam(':coste', $costePizza);
        $sql->bindParam(':precio', $precioPizza);
        $sql->bindParam(':ingredientes', $ingredientesPizza);

        // Ejecutamos la consulta
        $sql->execute();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agergar Pizza</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>
        <br>
        <label for="coste">Coste</label>
        <input type="number" name="coste" id="coste" required>
        <br>
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio" required>
        <br>
        <label for="ingredientes">Ingredientes</label>
        <textarea name="ingredientes" id="" cols="30" rows="3"></textarea>
        <br>
        <input type="submit" value="Agregar Pizza">
    </form>

    <h1>Nuestras pizzas</h1>

    <?php
    agregarPizza($conn);
    listarPizzas($conn);
    ?>

</body>

</html>