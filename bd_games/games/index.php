<? require_once 'connect.php'; ?><html>
<head> <title> Игры </title> </head>
<body>
<table border="1">
<tr>
<th>Название</th> <th>жанр</th> <th>разработчик</th> <th>издатель</th> 
<th>объем продаж</th> 
<th> Редактировать </th> <th> --- </th> </tr>
<?php
$link = mysqli_connect($host, $user, $password) or die ("Невозможно подключиться к серверу"); 
$result = mysqli_query($link, "SELECT * FROM f0472780_loseva.games"); 
mysqli_select_db($link, "f0472780_loseva") or die("Нет такой таблицы!");
while ($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['game_name'] . "</td>";
    echo "<td>" . $row['game_genre'] . "</td>";
    echo "<td>" . $row['game_raz'] . "</td>";
    echo "<td>" . $row['game_izd'] . "</td>";
    echo "<td>" . $row['game_v'] . "</td>";
    echo "<td><a href='edit.php?id_game=" . $row['id_game']. "'>Редактировать</a></td>";
    echo "<td><a href='delete.php?id_game=" . $row['id_game']. "'>Удалить</a></td>";
    echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); 
print("<P>Всего: $num_rows </p>");

?>
<p> <a href="http://f0472780.xsph.ru/loseva/WWW/bd_user/bd_games/index.php"> Назад </a>
<p> <a href="new.html"> Добавить </a>
</body> </html>