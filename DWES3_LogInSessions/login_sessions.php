<?php
function comproba_usuario($nombre, $clave)
{

// "SELECT user

    if ($nombre == 'usuario' && $clave == '1234') {
        $user['nombre'] = 'user';
        $user['rol'] = 0;
        return $user;
    } else if ($nombre == 'admin' && $clave == 'admin') {
        $user['username'] = 'admin';
        $user['rol'] = 1;
        return $user;
    } else {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = comproba_usuario($_POST['username'], $_POST['password']);

    if ($user == false) {
        $err = true;
    } else {
        session_start();
        $_SESSION['user'] = $_POST['username'];
        header('Location: main_session.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php
    if (isset($err)) {
        echo '<p>Incorrect username and/or password</p>';
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <input type="text" name="username" placeholder="Username" value="<?php if (isset($username)) {
                                                                                echo $username;
                                                                            } ?>">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" value="Login">
    </form>
</body>

</html>