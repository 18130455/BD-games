<html>
<?php
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно подключиться к серверу");
if(isset($_GET['id'])&&isset($_GET['name'])&&isset($_GET['url'])){
    $name = htmlentities(mysqli_real_escape_string($link, $_GET['name']));
    $url = htmlentities(mysqli_real_escape_string($link, $_GET['url']));
    $id = htmlentities(mysqli_real_escape_string($link, $_GET['id']));
    $zapros="UPDATE
    f0472780_loseva.market
    SET market_name='$name',
    market_url='$url'
    WHERE id_market='$id'";
    mysqli_query($link, $zapros) or die("Запрос");
    if(mysqli_affected_rows($link)>0) {
        echo 'Все сохранено. <a href="index.php"> назад </a>';
    } 
    else {echo 'Ошибка сохранения. <a href="index.php"> назад</a> ';}
} 
else {echo("Введены некорректные данные");}
?>
</html>