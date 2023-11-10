<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login_sessions.php?redirect=true');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>

<body>
    <h1>Bienvenido!</h1>
</body>

</html>