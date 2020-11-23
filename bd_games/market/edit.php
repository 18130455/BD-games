
<html>
<?php
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно подключиться к серверу");
$query = "SELECT * FROM f0472780_loseva.market WHERE id_market=".$_GET['id_market'];
$rows = mysqli_query($link, $query) or die ("Ошибка в запросе");
while ($st = mysqli_fetch_array($rows)) {
$id=$_GET['id_market'];
$name = $st['market_name'];
$url = $st['market_url'];
}
print "<H2>Изменить:</H2>";
print "<form action='save_edit.php' metod='get'>";
print "Название: <input name='name' type='text' value='".$name."'><br>";
print "url: <input name='url' type='text' value='".$url."'><br>";

print "<input type='hidden' name='id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться</a>";
mysqli_close($link);
?>

</html>