<!DOCTYPE html>
Enter an ammount of columns and rows
<form action="" method="post">
<input type = "text" name = "row"  value = "Rows">
<br><br>
<input type = "text" name = "col"  value = "Columns">
<br><br>
<input type = "submit" name = "sub" value = "submit">
</form>
</html>
<html>
<table border ="1">
<?php

if(isset($_POST['row']))
{
$r = $_POST['row'];
}
if(isset($_POST['col']))
{
$c = $_POST['col'];

}


$total = $r * $c;
$i=0;
$j=0;
if(isset($_POST['sub']))
{
	while($i<$r)
	{
	echo "<tr>";
	while($j<$c)
	{
		echo "<td>"."  "."</td>";
		$j++;
		
	}
	echo "</tr>";
	$i++;
	
	}
}

?>

</table>
</html>