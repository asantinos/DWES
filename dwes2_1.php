<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Numeros</h1>
    <p>
        <?php
        /////////////
        // Numeros //
        ////////////

        echo PHP_INT_SIZE . "<br>"; // Tamaño en bytes
        echo PHP_INT_MIN . "<br>"; // Valor minimo
        echo PHP_INT_MAX . "<br>"; // Valor maximo
        $a = 3 / 2; // Division de enteros no da problema
        echo $a . "<br>";

        ?>
    </p>

    <h1>Cadenas</h1>
    <p>
        <?php
        /////////////
        // Cadenas //
        ////////////

        $var = "Paco";
        $a = "Hola $var <br>"; // Comillas magicas
        $b = 'Hola $var';
        $c = "hola " . $var . "<br>"; // Concatenacion  
        ?>
    </p>
</body>

</html>