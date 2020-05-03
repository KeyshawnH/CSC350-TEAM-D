<html>
<!-- Shirley Ni's Homework #3 -->

<body>

<table border="1">

<?php



$r = '';
$c = '';
if(isset($_POST['submit']))							
{
	$r = $_POST['rows'];
	$c = $_POST['columns'];
	
	makeGrid($r, $c);
	
	
}

function makeGrid($rows, $columns){
		
		//I decremented the actual number of rows and columns 
		//because the table tag adds an extra row and column to the user inputs
		
		$rows--;
		$columns--; 
	
		for ($i = 0; $i <= $rows; $i++)
		{
			echo "<tr>"."</tr>";
			for ($j = 0; $j <= $columns; $j++)
			{
				echo "<td>"."</td>";
			}
			
		}
	
	
		
}

?>

</table>
</body>
</html>