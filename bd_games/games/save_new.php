<?php
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password) or die ("Невозможно подключиться к серверу");
if(isset($_GET['genre'])&&isset($_GET['raz'])&&isset($_GET['izd'])&&isset($_GET['v'])&&isset($_GET['name'])){
    $name = htmlentities(mysqli_real_escape_string($link, $_GET['name']));
    $genre = htmlentities(mysqli_real_escape_string($link, $_GET['genre']));
    $raz = htmlentities(mysqli_real_escape_string($link, $_GET['raz']));
    $izd = htmlentities(mysqli_real_escape_string($link, $_GET['izd']));
    $v = htmlentities(mysqli_real_escape_string($link, $_GET['v']));

    mysqli_select_db($link, "f0472780_loseva") or die("Данной таблицы не существует.");
    $sql_add = "INSERT INTO f0472780_loseva.games
    (id_game, game_name, game_genre, game_raz, game_izd, game_v)
    VALUES
    (NULL, '$name', '$genre', '$raz', '$izd', '$v')";
    mysqli_query($link, $sql_add) or die("Невозможно выполнить запрос!");
    
    if(mysqli_affected_rows($link)>0){
        print "<p>Готово.";
        print "<p><a href=\"index.php\"> Вернуться </a>";}
    else{ print "Ошибка сохранения, <a href=\"index.php\"> назад</а>";}
}
else{ echo("Введены некорректные данные");}
mysqli_close($link);
?>