<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DWES Tema 3</title>
</head>

<body>
    <p>
        <?php
        if (is_null($_GET["nombre"])) {
            echo "No se ha introducido el nombre<br>";
        } else {
            echo "Hola " . $_GET["nombre"] . "<br>";
        }

        if (empty($_GET["apellido"])) {
            echo "No se ha introducido el apellido<br>";
        } else {
            echo "Tu apellido es " . $_GET["apellido"] . "<br>";
        }




        /*
        echo $_SERVER['REQUEST_METHOD'];
        echo "<br>";
        // echo $_GET["nombre"];
        // echo "<br>";
        print_r($_GET);
        echo "<br>";

        echo "Hola " . $_GET["nombre"] . " " . $_GET["apellido"] . "<br>";

        $edad = $_GET["edad"];
        echo "Tiene " . $edad . " años" . "<br>";

        echo $_GET["direccion"] . "<br>";
        */

        ?>
    </p>
</body>

</html>