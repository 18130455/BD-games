<?php
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно подключиться к серверу");
$zapros="DELETE FROM f0472780_loseva.game_keys WHERE id_key=" . $_GET['id_key'];
mysqli_query($link, $zapros);
header("Location: index.php");
exit;
?>