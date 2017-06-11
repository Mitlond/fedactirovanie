<html>
<head>
<title>Редактирование данных</title>	
</head>
<body bgcolor="#FFFFFF">
<?php
// подключение к бд 
$db = mysql_connect("localhost", "root") or die ("Не могу создать соединение");
mysql_select_db("test" , $db);
 
// Если была нажата кнопка редактирования, вносим изменения
if(isset($_REQUEST['submit_edit'])) {
$queryup = "UPDATE `res_tab` SET `id`='".$_GET['id']."',`Groups`='".$_GET['Groups']."',`Items`='".$_GET['Items']."',`Aud`='".$_GET['Aud']."',`Teachers`='".$_GET['Teachers']."' WHERE `id`='".$_GET['id']."'";
mysql_query($queryup) or die (mysql_error());
}
// запрос
print_r($queryup); 
 
// вывод
$sql = "SELECT `id`, `Groups`, `Items`, `Aud`, `Teachers` FROM `res_tab`";
$result = mysql_query($sql);
 
printf("
<!Doctype html>
<html>
	<head>
	    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1251\" />
		<title>Учебное Расписание</title> 
		
	<style type=\"text/css\">
<!--
body, html {
background-color:#9F9F9F;
}-->
</style>
	<style type=\"text/css\">
	<!--
button {
    background: #FFA200; /* Цвет фона */
    padding: 7px 30px; /* Поля вокруг текста */
    font-size: 13px; /* Размер шрифта */ 
    font-weight: bold; /* Насыщенность шрифта */
    color: #000000; /* Цвет шрифта */
    text-align: center; /* Надпись на кнопке по центру */
    border: solid 1px #73C8F0; /* Параметры рамки кнопки */ 
    cursor: pointer; /* Изменение вида курсора при наведении*/
}-->
	</style>
<h2>Редактирование таблицы данных учебного расписания</h2>
<style type=\"text/css\">
h2 { font-size: 20px; text-align: center; }
td { padding: 30px; text-align: center; vertical-align: middle; }
</style>
<center>
<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">
    <td width=180>ID</td>
    <td width=180>Группы </td>
    <td width=180>Предметы </td>  
	<td width=175>№Ауд. </td>
    <td width=170>Учителя</td>
	<td width=150>Редактирование</td>
  </tr>
</table></center>");
 
 
while ($row = mysql_fetch_array($result)) {
printf("<form action=\"redactirovanie.php\" method=\"GET\" name=\"edit_form\" >
<input type=\"hidden\" name=\"id\" value=\"".$row['id']."\" />
<center><table border='1'>
  <tr>  
    <td> <input type=\"text\" value=\"".$row['id']."\" name=\"id\" /></td>
    <td> <input type=\"text\" value=\"".$row['Groups']."\" name=\"Groups\" /> </td>
    <td> <input type=\"text\" value=\"".$row['Items']."\" name=\"Items\" /> </td> 
	<td> <input type=\"text\" value=\"".$row['Aud']."\" name=\"Aud\" /> </td> 
    <td> <input type=\"text\" value=\"".$row['Teachers']."\" name=\"Teachers\" /></td>
    <td> <input type=\"submit\" name=\"submit_edit\" class=\"buttons\" value=\"Сохранить изменения\" /> </td>
  </tr>
</table></center>
</form>
");
}

/* Выводим ссылку возврата */
echo ("<div style=\"text-align: center; margin-top: 10px;\"><a href=\"raspisanie.php\"><button>Вернуться назад</button></a></div>");
?>
</body>
</html>