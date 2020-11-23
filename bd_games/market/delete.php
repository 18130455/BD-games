<?php
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно подключиться к серверу");
$zapros="DELETE FROM f0472780_loseva.market WHERE id_market=" . $_GET['id_market'];
mysqli_query($link, $zapros);
header("Location: index.php");
exit;
?>