<?php
function divide($num1, $num2)
{
    if ($num2 == 0) {
        $message = "No se puede dividir entre 0";
        throw new Exception($message);
    }
    return $num1 / $num2;
}

function squareRoot($num)
{
    if ($num < 0) {
        $message = "No se puede calcular la raiz cuadrada de un número negativo";
        throw new Exception($message);
    }
    return sqrt($num);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excep</title>
</head>

<body>
    <?php
    echo "<h1>Inicio del programa</h1>";

    try {
        echo divide(10, 2) . "<br>";
        echo divide(10, 0) . "<br>";
        echo divide(10, 5) . "<br>";
    } catch (Exception $e) {
        echo "Se ha producido un error: " . $e->getMessage();
    } finally {
        echo "<h1>Fin del programa</h1>";
    }
    ?>

    <?php
    echo "<h1>Inicio del programa</h1>";

    try {

        echo squareRoot(10) . "<br>";
        echo squareRoot(-9) . "<br>";
        echo squareRoot(16) . "<br>";
    } catch (Exception $e) {
        echo "Se ha producido un error: " . $e->getMessage();
    } finally {
        echo "<h1>Fin del programa</h1>";
    }
    ?>
</body>

</html>