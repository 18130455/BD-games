<? require_once 'connect.php'; ?><html>
<head> <title> игры | Лосева </title> </head>
<body>
<table border="1">
<tr>
<th>Ид</th> <th>дата приобретения</th> <th>дата окончания</th> 
<th>id игры</th> <th>id цифрового магазина</th> <th>стоимость</th>
<th>ключ</th> <th> Изменить </th> <th> Удалить </th> </tr>
<?php
$link = mysqli_connect($host, $user, $password) or die ("Невозможно подключиться к серверу"); 
$result = mysqli_query($link, "SELECT * FROM f0472780_loseva.game_key"); 
mysqli_select_db($link, "f0472780_loseva") or die("Нет такой таблицы!");
while ($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['id_key']   . "</td>";
    echo "<td>" . $row['rus_data_n'] . "</td>";
    echo "<td>" . $row['rus_data_o']  . "</td>";
    echo "<td>" . $row['game_name']   . "</td>";
    echo "<td>" . $row['market_name'] . "</td>";
    echo "<td>" . $row['key_sum']  . "</td>";
    echo "<td>" . $row['key_num']   . "</td>";
    echo "<td><a href='edit.php?id_key="   . $row['id_key']. "'>Изменить</a></td>";
    echo "<td><a href='delete.php?id_key=" . $row['id_key']. "'>Удалить</a></td>";
    echo "</tr>";
} 

print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего: $num_rows </p>");

?>
<p> <a href="new.php"> Добавить </a>
<p> <a href="http://f0472780.xsph.ru/loseva/WWW/bd_user/bd_games/index.php"> Назад </a>
</body> </html>