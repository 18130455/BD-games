
<html>
<?php
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно подключиться к серверу");
$query = "SELECT * FROM f0472780_loseva.game_keys WHERE id_key=".$_GET['id_key'];
$rows = mysqli_query($link, $query) or die ("Ошибка в запросе");
while ($st = mysqli_fetch_array($rows)) {
$id = $_GET['id_key'];
$data_n = $st['key_data_n'];
$data_o = $st['key_data_o'];
$id_game = $st['id_game'];
$id_market = $st['id_market'];
$sum = $st['key_sum'];
$num = $st['key_num'];
}
print "<H2>Изменить:</H2>";
print "<form action='save_edit.php' metod='GET'>";

print "дата приобретения: <input name='data_n' type='date' value='".$data_n."'><br>";
print "дата окончания: <input name='data_o' type='date' value='".$data_o."'><br>";

$query_1 = "SELECT * FROM f0472780_loseva.games";
$rows_1 = mysqli_query($link, $query_1) or die ("Ошибка в запросе");
$query_11 = "SELECT * FROM f0472780_loseva.games WHERE id_game='$id_game'";
$rows_11 = mysqli_query($link, $query_11) or die ("Ошибка в запросе");

$arr_1 = array();
while ($row=mysqli_fetch_array($rows_11)){$arr_1 = $row;}
echo("id игры:<select id='id_game' name='id_game'>");
echo("<option value=''></option>");
while ($row=mysqli_fetch_array($rows_1)){
    if($arr_1[1]==$row[1]) {echo("<option value='$row[0]' selected> $row[0]. $row[1] </option>");} 
    else {echo("<option value='$row[0]'> $row[0] - $row[1]</option>");}
}echo("</select><br>");
    
$query_2 = "SELECT * FROM f0472780_loseva.market";
$rows_2 = mysqli_query($link, $query_2) or die ("Ошибка в запросе");
$query_21 = "SELECT * FROM f0472780_loseva.market WHERE id_market='$id_market'";
$rows_21 = mysqli_query($link, $query_21) or die ("Ошибка в запросе");

$arr_2 = array();
while ($row=mysqli_fetch_array($rows_21)){$arr_2 = $row;}
echo("id цифрового магазинa:<select id='id_market' name='id_market'>");
echo("<option value=''></option>");
while ($row=mysqli_fetch_array($rows_2)){
    if($arr_2[1]==$row[1]) {echo("<option value='$row[0]' selected> $row[0]. $row[1] </option>");} 
    else {echo("<option value='$row[0]'> $row[0] - $row[1]</option>");}
}echo("</select><br>");

print "стоимость: <input name='sum' type='text' value='".$sum."'><br>";
print "ключ: <input name='num' type='text' value='".$num."'><br>";

print "<input type='hidden' name='id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Назад </a>";
mysqli_close($link);
?>
</html>