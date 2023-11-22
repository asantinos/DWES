<?php

function conectarBD(){
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

function mostrarNombresPizzas() {
    $conn = conectarBD();
    $stmt = $conn->query("SELECT nombre FROM pizzas");
    $pizzas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $pizzas;
}

$pizzas = mostrarNombresPizzas();

echo "<h1>Lista de Pizzas</h1>";

if (isset($pizzas) && count($pizzas) > 0) {
    echo "<ul>";
    foreach ($pizzas as $pizza) {
        echo "<li>" . $pizza['nombre'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No hay pizzas en la base de datos.</p>";
}
?>
