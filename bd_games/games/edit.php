
<html>
<?php
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно подключиться к серверу");
$query = "SELECT * FROM f0472780_loseva.games WHERE id_game=".$_GET['id_game'];
$rows = mysqli_query($link, $query) or die ("Ошибка в запросе");
while ($st = mysqli_fetch_array($rows)) {
$id=$_GET['id_game'];
$name = $st['game_name'];
$genre = $st['game_genre'];
$raz = $st['game_raz'];
$izd = $st['game_izd'];
$v = $st['game_v'];
}
print "<H2>Изменить:</H2>";
print "<form action='save_edit.php' metod='get'>";
print "Название: <input name='name' type='text' value='".$name."'><br>";
print "жанр: <input name='genre' type='text' value='".$genre."'><br>";
print "разработчик: <input name='raz' type='text' value='".$raz."'><br>";
print "издатель: <input name='izd' type='text' value='".$izd."'><br>";
print "объем продаж: <input name='v' type='text' value='".$v."'><br>";

print "<input type='hidden' name='id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться</a>";
mysqli_close($link);
?>

</html>