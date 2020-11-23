<?php
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно подключиться к серверу");
$zapros="DELETE FROM f0472780_loseva.games WHERE id_game=" . $_GET['id_game'];
mysqli_query($link, $zapros);
header("Location: index.php");
exit;
?>