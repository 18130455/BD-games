<html>
<?php
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно подключиться к серверу");
if(isset($_GET['id'])&&isset($_GET['genre'])&&isset($_GET['raz'])&&isset($_GET['izd'])&&isset($_GET['v'])&&isset($_GET['name'])){
    $name = htmlentities(mysqli_real_escape_string($link, $_GET['name']));
    $genre = htmlentities(mysqli_real_escape_string($link, $_GET['genre']));
    $raz = htmlentities(mysqli_real_escape_string($link, $_GET['raz']));
    $izd = htmlentities(mysqli_real_escape_string($link, $_GET['izd']));
    $v = htmlentities(mysqli_real_escape_string($link, $_GET['v']));
    $id = htmlentities(mysqli_real_escape_string($link, $_GET['id']));
    $zapros="UPDATE
    f0472780_loseva.games
    SET game_name='$name',
    game_genre='$genre',
    game_raz='$raz',
    game_izd='$izd',
    game_v='$v'
    WHERE id_game='$id'";
    mysqli_query($link, $zapros) or die("Запрос");
    if(mysqli_affected_rows($link)>0) {
        echo 'Все сохранено. <a href="index.php"> Вернуться к списку пользователей </a>';
    } 
    else {echo 'Ошибка сохранения. <a href="index.php"> Вернуться к списку пользователей</a> ';}
} 
else {echo("Введены некорректные данные");}
?>
</html>