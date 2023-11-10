<?php
if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin') {
    header('Location: welcome.html');
} else {
    header('Location: error.html');
}
