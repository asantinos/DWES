<?php function factorial($n)
{
    $result = 1;

    for ($i = 1; $i <= $n; $i++) {
        $result *= $i;
    }
    return $result;
}
?>

<?php function factorial_recursivo($n)
{
    if ($n == 0) {
        return 1;
    } else {
        return $n * factorial_recursivo($n - 1);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial</title>
</head>

<body>
    <h1>Factorial</h1>

    <p>
        <?php
        echo "El factorial de 5 es " . factorial(5);
        ?>
    </p>

    <p>
        <?php
        echo "El factorial de 9 es " . factorial_recursivo(9);
        ?>
    </p>

    <!-- Number by Input -->
    <form method="POST">
        <label>Introduce un número:</label>
        <br>
        <input type="number" name="number" />
        <input type="submit" value="Calcular" />
    </form>

    <?php
    if (!empty($_POST['number'])) {
        $n = $_POST['number'];
        echo '<br>' . 'El factorial de ' . $n . ' es ' . factorial($n);
    }
    ?>
</body>

</html>