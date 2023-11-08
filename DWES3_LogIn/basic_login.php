<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loged</title>
</head>

<body>
    <?php
    echo "Welcome " . $_POST['username'] . "!" . "<br>";
    echo "Your password is: " . $_POST['password'] . "<br>";

    print_r($_POST);
    ?>
</body>

</html>