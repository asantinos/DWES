<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Babel</title>
</head>

<body>
    <h1>Biblioteca Babel</h1>

    <?php
    require("material.php");
    require("libro.php");
    require("dvd.php");

    $libro1 = new Libro("1984", "George Orwell", "1234567890", true, 328);
    $libro2 = new Libro("Cien años de soledad", "Gabriel García Márquez", "5678901234", true, 417);

    $dvd1 = new DVD("Sound of Freedom", "Christopher Nolan", "9876543210", true, 135, "Crimen/Suspense");
    $dvd2 = new DVD("Origen", "Christopher Nolan", "4321098765", true, 148, "Ciencia Ficción");

    // Subtarea 4
    $materiales = [$libro1, $dvd1, $libro2, $dvd2];

    // Subtarea 5
    echo "<h2>Libros y DVD's antes de ser prestados</h2>";
    echo $materiales[0]; //ejemplo de libro
    echo $materiales[3]; //ejemplo de DVD

    echo "<h2>Prestamos el libro</h2>";
    echo $materiales[0]->prestar();
    echo "<br>";
    echo $materiales[0];

    echo "<h2>Prestamos el DVD</h2>";
    echo $materiales[3]->prestar();
    echo "<br>";
    echo $materiales[3];

    echo "<h2>Intentamos volver a tomar prestado el mismo DVD</h2>";
    echo $materiales[3]->prestar();
    echo "<br>";
    echo $materiales[3];

    echo "<h2>Devolvemos los materiales</h2>";
    echo $materiales[0]->devolver();
    echo "<br>";
    echo $materiales[0];
    echo "<br>";
    echo $materiales[3]->devolver();
    echo "<br>";
    echo $materiales[3];

    echo "<h2>Intentamos devolver material no prestado</h2>";
    echo $materiales[2]->devolver();
    echo "<br>";
    echo $materiales[2];
    echo "<br>";

    ?>
</body>

</html>