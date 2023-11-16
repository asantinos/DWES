<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin') {
        header('Location: welcome.html');
    } else {
        $username = $_POST['username'];
        $err = true;
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