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
    <link rel="stylesheet" href="styles/pedido.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["nombre"])) {
        echo "<h2>Bienvenido " . $_SESSION["nombre"] . "</h2>";
    }
    ?>

    <a href="?cerrar_sesion">Cerrar sesión</a><br>

    <input type="button" value="Comenzar pedido" id="mostrar-pedido">

    <div class="pedido" style="display: none;">
        <div id="pizzas-pedido">
            <select name="pizzas" class="pizza-select">
                <option value="0">Selecciona una pizza</option>
                <?php
                $consulta = $conn->prepare("SELECT nombre FROM pizzas");
                $consulta->execute();
                foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $row) {
                    echo "<option value=" . $row["nombre"] . ">" . $row["nombre"] . "</option>";
                }
                ?>
            </select>
            <input type="number" name="cantidad" class="pizza-cantidad" min="1" max="10" value="1">
            <br>
        </div>

        <input type="button" value="Agregar pizza" onclick="agregarPizza()">
        <br>
        <input type="button" value="Pagar">
    </div>

    <h1>Nuestras pizzas</h1>
    <?php
    listarPizzas($conn);
    ?>

    <br>

    <script>
        const mostrarPedidoBtn = document.getElementById("mostrar-pedido");
        const pizzasPedidoDiv = document.getElementById("pizzas-pedido");

        const agregarPizza = () => {
            const nuevoDiv = document.createElement("div");

            const nuevoSelect = document.createElement("select");
            nuevoSelect.name = "pizzas";
            nuevoSelect.classList.add("pizza-select");
            nuevoSelect.innerHTML = document.querySelector(".pizza-select").innerHTML;
            nuevoDiv.appendChild(nuevoSelect);

            const nuevoInput = document.createElement("input");
            nuevoInput.type = "number";
            nuevoInput.name = "cantidad";
            nuevoInput.classList.add("pizza-cantidad");
            nuevoInput.min = "1";
            nuevoInput.max = "10";
            nuevoInput.value = "1";
            nuevoDiv.appendChild(nuevoInput);

            pizzasPedidoDiv.appendChild(nuevoDiv);
        };

        const mostrarPedido = () => {
            const pedido = document.querySelector(".pedido");
            pedido.style.display = pedido.style.display === "none" ? "block" : "none";

            mostrarPedidoBtn.value = mostrarPedidoBtn.value === "Comenzar pedido" ? "Ocultar pedido" : "Comenzar pedido";
        };

        mostrarPedidoBtn.addEventListener("click", mostrarPedido);
    </script>
</body>

</html>