<? require_once 'connect.php'; ?><html>
<head> <title> Сведения о прользователях сайта </title> </head>
<body>
<table border="1">
<tr>
<th>id</th> <th>Название</th> <th>url</th> 
<th> Редактировать </th> <th> --- </th> </tr>
<?php
$link = mysqli_connect($host, $user, $password) or die ("Невозможно подключиться к серверу"); 
$result = mysqli_query($link, "SELECT * FROM f0472780_loseva.market"); 
mysqli_select_db($link, "f0472780_loseva") or die("Нет такой таблицы!");
while ($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['id_market'] . "</td>";
    echo "<td>" . $row['market_name'] . "</td>";
    echo "<td>" . $row['market_url'] . "</td>";

    echo "<td><a href='edit.php?id_market=" . $row['id_market']. "'>Редактировать</a></td>";
    echo "<td><a href='delete.php?id_market=" . $row['id_market']. "'>Удалить</a></td>";
    echo "</tr>";}
print "</table>";
$num_rows = mysqli_num_rows($result); 
print("<P>Всего: $num_rows </p>");
?>
<p> <a href="http://f0472780.xsph.ru/loseva/WWW/bd_user/bd_games/index.php"> Назад </a>
<p> <a href="new.html"> Добавить </a>
</body> </html>
