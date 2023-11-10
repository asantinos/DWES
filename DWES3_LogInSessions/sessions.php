<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones</title>
</head>

<body>
    <?php
    //en sessio hay un array vacío
    session_start(); //lo queremos hacer siempre, pero las caracteristicas no, unicamente si es información nueva
    if (!isset($_SESSION["count"])) {
        $_SESSION["count"] = 0;
        $_SESSION["nombre"] = "pedro";
        $_SESSION["rol"] = "admin";
    } else {
        $_SESSION["count"]++;
    }




    //print_r($_COOKIE);
    //print_r($_SESSION);

    echo "Hola " . $_SESSION["nombre"] . "<br>";
    echo "Es tu  sesión número: " . $_SESSION["count"] . " (esto se hace con un contador). " . "<br>";


    ?>
</body>

</html>