<?php
function conectarBD()
{
    $cadena_conexion = "mysql:dbname=dwes_t3;host=127.0.0.1";
    $usuario = 'root';
    $clave = '';


    try {
        $bd = new PDO($cadena_conexion, $usuario, $clave);
        return $bd;
    } catch (PDOException $e) {
        echo "Error al conectar a la BD: " . $e->getMessage();
    }
}

$conn = conectarBD();

function listarPizzas($conn)
{
    $consulta = $conn->prepare("SELECT nombre, precio FROM pizzas");
    $consulta->execute();

    // foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $row) {
    //     echo $row['nombre'] . " - " . $row['precio'] . "€<br>";
    // }

    foreach ($consulta as $row) {
        echo $row['nombre'] . " - " . $row['precio'] . "€<br>";
    }
}

echo "<h1>Nuestras pizzas</h1>";
listarPizzas($conn);

//////////////////////////
// INSERTAR NUEVA PIZZA //
/////////////////////////

// Datos de la nueva pizza
$nombrePizza = "Pizza prueba";
$costePizza = 5.00;
$precioPizza = 10.00;
$ingredientesPizza = "Tomate, Mozzarella, Albahaca, Jamón, Parmesano";

// Preparamos la consulta
$insertar = $conn->prepare("INSERT INTO pizzas (nombre, coste, precio, ingredientes) VALUES (:nombre, :coste, :precio, :ingredientes)");

// Asignamos los valores a los parámetros
$insertar->bindParam(':nombre', $nombrePizza);
$insertar->bindParam(':coste', $costePizza);
$insertar->bindParam(':precio', $precioPizza);
$insertar->bindParam(':ingredientes', $ingredientesPizza);

// Ejecutamos la consulta insertar
$insertar->execute();

echo "<h1>Nuestras pizzas después de añadir la nueva</h1>";
listarPizzas($conn);
