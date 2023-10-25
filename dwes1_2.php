<!-- Nuestra primera instrucción en PHP! -->
<!-- LC1.1.3 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hellow World!</title>
</head>

<body>
    <h1>
        <?php echo "Hellow World" ?>
    </h1>

    <p>
        <?php
        # Comentario 1
        // Comentario 2
        /**
         * Comentario 3
         */

        $saludo = "Bienvenido";
        $nombre = "Pepe";
        echo $saludo . ", " . $nombre
            ?>
    </p>

    <p>
        <?php
        if (print "Hola") {
            echo ", caracola.";
        }
        ?>
    </p>

    <p>
        <?php
        $miEntero1 = 15; // Decimal
        $miEntero2 = 015; // Octal
        $miEntero3 = 0x15; // Hexadecimal
        echo $miEntero1 . "<br>";
        echo $miEntero2 . "<br>";
        echo $miEntero3 . "<br>";
        ?>
    </p>

    <p>
        <?php
        $a = 5;
        // $b = $a + 1;
        $b = $a++;
        $c = ++$a;

        echo "a = " . $a . "<br>";
        echo "b = " . $b . "<br>";
        echo "c = " . $c . "<br>";
        echo "a * b = " . $a * $b . "<br>";
        ?>
    </p>

    <p>
        <?php
        $a = $b = "3.1416";
        echo "a vale $a y es de tipo " . gettype($a) . "<br>";
        settype($b, "float");
        echo "b vale $b y es de tipo " . gettype($b) . "<br>";
        ?>
    </p>

    <p>
        <?php
        $libros = ["Harry Potter", "The Lord of the Rings", "Do Androids dream of Eletric Sheep"];
        $libros2 = [
            [
                "titulo" => "Harry Potter",
                "autor" => "JK Rowling",
                "fecha" => "1997",
                "url" => "http://www.ejemplo.com/",
            ],
            [
                "titulo" => "The Lord of the Rings",
                "autor" => "Tolkien",
                "fecha" => "1954",
                "url" => "http://www.ejemplo.com/",
            ],
            [
                "titulo" => "Do Androids dream of Eletric Sheep",
                "autor" => "Philip K. Dick",
                "fecha" => "1968",
                "url" => "http://www.ejemplo.com/",
            ],
            [
                "titulo" => "Artemisa",
                "autor" => "Andy Weir",
                "fecha" => "2011",
                "url" => "http://www.ejemplo.com/",
            ],
            [
                "titulo" => "The Martian",
                "autor" => "Andy Weir",
                "fecha" => "2011",
                "url" => "http://www.ejemplo.com/",
            ],

        ];


        var_dump($libros);
        echo "<br>";
        var_dump($libros2);


        echo "<br>";

        for ($i = 0; $i < count($libros); $i++) {
            echo "<br>" . $libros[$i];
        }
        ?>
    </p>

    <ul>
        <?php
        $books = $libros;

        foreach ($books as $book) {
            echo "<li>$book</li>";
        }
        ?>
    </ul>

    <ul>
        <?php
        foreach ($libros2 as $libro) {
            echo "<li>Titulo: $libro[titulo]</li>";
        }
        ?>
    </ul>

    <ul>
        <?php foreach ($libros2 as $libro): ?>
            <li>
                <a href=<?= $libro['url']; ?>> <!-- ?= es lo mismo que php echo -->
                    Comprar:
                    <?php
                    echo $libro["titulo"]
                        ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <ul>
        <?php foreach ($libros2 as $libro): ?>
            <li>
                <?php
                echo "$libro[titulo] ($libro[fecha])";
                ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <?php
    $filtro = function ($libros2, $fecha) {
        $librosFiltrados = [];

        foreach ($libros2 as $libro) {
            if ($libro["fecha"] == $fecha) {
                $librosFiltrados[] = $libro;
            }
        }

        return $librosFiltrados;
    }

        // $listaNueva = filtrarPorFecha($libros2);
        // var_dump($listaNueva)
        ?>
    <ul>
        <?php foreach ($libros2 as $libro): ?>
            <?php if ($libro['fecha'] == '2011'): ?>
                <li>
                    <?php
                    echo "$libro[titulo] ($libro[fecha])";
                    ?>
                </li>
            <?php endif; ?>
        <?php endforeach ?>
    </ul>
    <ul>
        <?php foreach ($filtro($libros2, "2011") as $libro): ?>
            <li>
                <?php
                echo "$libro[titulo] ($libro[fecha])";
                ?>
            </li>
        <?php endforeach ?>
    </ul>

    <?php
    function filtrarFechaAnt2000($libros2)
    {
        $librosFiltrados2 = [];

        foreach ($libros2 as $libro) {
            if ($libro["fecha"] <= "2000") {
                $librosFiltrados2[] = $libro;
            }
        }

        return $librosFiltrados2;
    }
    ?>
    <ul>
        <?php foreach (filtrarFechaAnt2000($libros2) as $libro): ?>
            <li>
                <?php
                echo "$libro[titulo] ($libro[fecha])";
                ?>
            </li>
        <?php endforeach ?>
    </ul>

    <?php
    // $filtroCompleto = function ($items, $key, $value) {
    //     $filteredItems = [];
    
    //     foreach ($items as $item) {
    //         if ($item[$key] === $value) {
    //             $filteredItems[] = $item;
    //         }
    //     }
    
    //     return $filteredItems;
    // };
    
    // $nuevaLista = $filtroCompleto($libros2, 'autor', 'Andy Weir');
    
    function filtroCompleto($items, $fn)
    {
        $filteredItems = [];

        foreach ($items as $item) {
            if ($fn($item)) {
                $filteredItems[] = $item;
            }
        }

        return $filteredItems;
    }
    ;

    $nuevaLista = filtroCompleto($libros2, function ($libro) {
        return $libro['autor'] === 'Andy Weir';
    });

    // array_filter es una funcion nativa de php
    $nuevaLista2 = array_filter($libros2, function ($libro) {
        return $libro['autor'] === 'Andy Weir';
    });

    var_dump($nuevaLista);
    ?>
    <!-- <ul>
        <?php foreach ($filtroCompleto($libros2, 'autor', 'JK Rowling') as $libro): ?>
            <li>
                <?php
                echo "$libro[titulo] ($libro[fecha])";
                ?>
            </li>
        <?php endforeach ?>
    </ul> -->

</body>

</html>