<html>
<head>
	<title>BMCC Scheduling Program</title>
	<style>
			h1
			{
				text-align: center;
				font-size: 40px;
			}
			
			.Submitbtn
			{
				font-size: 32px;
				font-family: "Times New Roman";
				text-align: center;
				height:150px;
				width:650px;
				float:left;
				margin: 0 auto; 
				
			}
			
			p.paragraph
			{
				font-size: 32px;
				font-family: "Times New Roman";
				text-align: center;
				text-decoration: underline;
			}
			
	</style>
</head>

<h1><a href= "homepage.php">BMCC Scheduling Program </a></h1>
<body>
<p class = "paragraph"> Please Choose From the following: </p>
	<form action="homepage.php" method="post">
		<tr>
				<tr>
					<td colspan = "2">&nbsp;
					<a href= "upload2.php">
					<input type="button" value="Schedule Classes" name="ScheduleClasses" class = "Submitbtn"/></a></td>
				</tr>
				
				<tr>
					<td colspan = "2">&nbsp;
					<a href= "aboutpage.php">
					<input type="button" value="About Page" name="AboutPage" class = "Submitbtn"/></a></td>
				</tr>
			</tr>
		<table>
		
	</form>


<?php

?>


</body>
</html>