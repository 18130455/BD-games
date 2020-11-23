<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?require_once 'connect.php';?>

<H2>Внесите данные:</H2>
<form action='save_new.php' metod='get'> 
дата приобретения: <input name='data_n' type='date'><br>
дата окончания: <input name='data_o' type='date'><br>
<?
$link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно подключиться к серверу");
$query_1 = "SELECT * FROM f0472780_loseva.games";
$rows_1 = mysqli_query($link, $query_1) or die ("Ошибка в запросе");
   echo("id игры:<select id='id_game' name='id_game'>");
    echo("<option disabled>Выберите</option>");
     while($row1 = mysqli_fetch_array($rows_1)){
        echo("<option value='$row1[0]'> $row1[0] - $row1[1]</option>");
     }echo("</select><br>");

$query_2 = "SELECT * FROM f0472780_loseva.market";
$rows_2 = mysqli_query($link, $query_2) or die ("Ошибка в запросе");
   echo("id цифрового магазина:<select id='id_market' name='id_market'>");
    echo("<option disabled>Выберите</option>");
     while($row2 = mysqli_fetch_array($rows_2)){
        echo("<option value='$row2[0]'> $row2[0] - $row2[1]</option>");
     }echo("</select><br>"); 
?>
стоимость: <input name='sum' type='text'><br>
ключ: <input name='num' type='text'><br>

<input name='add' type='submit' value='Добавить'>
<input name='b2' type='reset' value='Очистить'>
</form>
    
<p><a href="index.php"> назад</a>
