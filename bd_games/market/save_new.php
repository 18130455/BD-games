<?php
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password) or die ("Невозможно подключиться к серверу");

if(isset($_GET['name'])&&isset($_GET['url'])){
    $name = htmlentities(mysqli_real_escape_string($link, $_GET['name']));
    $url = htmlentities(mysqli_real_escape_string($link, $_GET['url']));

    mysqli_select_db($link, "f0472780_loseva") or die("Данной таблицы не существует.");
    $sql_add = "INSERT INTO f0472780_loseva.market
    (id_market, market_name, market_url)
    VALUES
    (NULL, '$name', '$url')";
    mysqli_query($link, $sql_add) or die("Невозможно выполнить запрос!");
    
    if(mysqli_affected_rows($link)>0){
        print "<p>Готово.";
        print "<p><a href=\"index.php\"> Вернуться </a>";}
    else{ print "Ошибка сохранения, <a href=\"index.php\"> Вернуться к списку пользователей</а>";}
}
else{ echo("Введены некорректные данные");}
mysqli_close($link);
?>