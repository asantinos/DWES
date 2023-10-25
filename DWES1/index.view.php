<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
</head>

<body>
    <style>
        li {
            list-style: none;
        }
    </style>
    <h1>Books</h1>

    <h2>By Author</h2>
    <ul>
        <?php foreach ($authorFilteredList as $libro) : ?>
            <li>
                <a href=<?= $libro['url']; ?>>
                    <?php
                    echo $libro["title"]
                    ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>By Year</h2>
    <ul>
        <?php foreach ($yearFilteredList as $libro) : ?>
            <li>
                <a href=<?= $libro['url']; ?>>
                    <?php
                    echo $libro["title"]
                    ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>