<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de visitas</title>
</head>

<body>
    <?php
    if (isset($_COOKIE['visitas'])) {
        $visitas = $_COOKIE['visitas'];
        $visitas++;
    } else {
        $visitas = 1;
    }

    setcookie(
        "visitas", // Nombre de la cookie
        $visitas, // Valor de la cookie
        time() + 60 * 60 * 24 // Tiempo de vida de la cookie (1 dia)
    );

    echo "Visitas: " . $_COOKIE['visitas'] . "<br>";
    // print_r($_COOKIE);
    ?>

</body>

</html>