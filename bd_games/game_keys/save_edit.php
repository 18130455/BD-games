<html>
<?php
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно подключиться к серверу");
if(isset($_GET['id'])&&isset($_GET['data_n'])&&isset($_GET['data_o'])&&
isset($_GET['id_game'])&&isset($_GET['id_market'])&&isset($_GET['sum'])&&isset($_GET['num'])){
    $data_n = htmlentities(mysqli_real_escape_string($link, $_GET['data_n']));
    $data_o = htmlentities(mysqli_real_escape_string($link, $_GET['data_o']));
    $id_game = htmlentities(mysqli_real_escape_string($link, $_GET['id_game']));
    $id_market = htmlentities(mysqli_real_escape_string($link, $_GET['id_market']));
    $key_sum = htmlentities(mysqli_real_escape_string($link, $_GET['sum']));
    $key_num = htmlentities(mysqli_real_escape_string($link, $_GET['num']));
    $id = htmlentities(mysqli_real_escape_string($link, $_GET['id']));
    $zapros="UPDATE
    f0472780_loseva.game_keys SET 
    key_data_n='$data_n',
    key_data_o='$data_o',
    id_game='$id_game',
    id_market='$id_market',
    key_sum='$key_sum',
    key_num='$key_num'
    WHERE id_key='$id'";
    mysqli_query($link, $zapros) or die("Запрос");
    if(mysqli_affected_rows($link)>0) {
        echo 'Все сохранено. <a href="index.php"> Назад </a>';
    } 
    else {echo 'Ошибка сохранения. <a href="index.php"> Назад</a> ';}
} 
else {echo("Введены некорректные данные");}
?>
</html>