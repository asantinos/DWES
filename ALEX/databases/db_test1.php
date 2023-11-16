<?php
$cadena_conexion = 'mysql:dbname=dwes_t3;host:127.0.0.1';
$usuario = 'root';
$clave = '';


// PDO: PHP Data Objects
try {
    $db = new PDO($cadena_conexion, $usuario, $clave);
    echo 'Conectado a la base de datos';
    echo '<br>';

    $sq1 = 'SELECT usuario FROM usuarios';

    foreach ($db->query($sq1) as $row) {
        print $row['usuario'] . '<br>';
    }


    print_r($db->query($sq1)->fetchAll(PDO::FETCH_ASSOC));
} catch (PDOException $e) {
    echo 'Error conectando a la base de datos: ' . $e->getMessage();
}
