<?php
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password) or die ("Невозможно подключиться к серверу");
if(isset($_GET['data_n'])&&isset($_GET['data_o'])&&
isset($_GET['id_game'])&&isset($_GET['id_market'])&&
isset($_GET['sum'])&&isset($_GET['num'])){
    $data_n = htmlentities(mysqli_real_escape_string($link, $_GET['data_n']));
    $data_o = htmlentities(mysqli_real_escape_string($link, $_GET['data_o']));
    $id_game = htmlentities(mysqli_real_escape_string($link, $_GET['id_game']));
    $id_market = htmlentities(mysqli_real_escape_string($link, $_GET['id_market']));
    $key_sum = htmlentities(mysqli_real_escape_string($link, $_GET['sum']));
    $key_num = htmlentities(mysqli_real_escape_string($link, $_GET['num']));
    
    mysqli_select_db($link, "f0472780_loseva") or die("Данной таблицы не существует.");
    $sql_add = "INSERT INTO f0472780_loseva.game_keys
    (id_key, key_data_n, key_data_o, id_game, id_market, key_sum, key_num)
    VALUES
    (NULL, '$data_n', '$data_o', '$id_game', '$id_market', '$key_sum', '$key_num')";
    mysqli_query($link, $sql_add) or die("Невозможно выполнить запрос!");
    
    if(mysqli_affected_rows($link)>0){
        print "<p>Спасибо.";
        print "<p><a href=\"index.php\"> Назад</a>";}
    else{ print "Ошибка сохранения, <a href=\"index.php\"> Назад</а>";}
}
else{ echo("Введены некорректные данные");}
mysqli_close($link);
?>