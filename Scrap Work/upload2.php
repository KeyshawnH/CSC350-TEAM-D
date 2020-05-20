<html>
	<head>
		<title>BMCC Scheduling Program</title>
		<style>
			h1
			{
				text-align: center;
				font-size: 40px;
			}
			table
			{
				text-align: center;
				font-size: 32px;
				width: 100px;
				height: 100px;
				margin: 0 auto; 
			}
			.Uploadbtn 
			{
				font-size: 20px;
				font-family: "Times New Roman"; 
				
				height: 34px;
				margin: 0 auto;          
				float:left;
			} 
			
			.Submitbtn
			{
				font-size: 32px;
				font-family: "Times New Roman";
				text-align: center;
				height:50px;
				width:650px;
				float:left;
				margin: 0 auto; 
				
			}
			
			body
			{
				text-align: center;
			}
			
		</style>
	</head>
<body>
<h1>Schedule Classes</h1>

<form action="termproject.php" method="post" enctype="multipart/form-data">
	<table>
			<tr>
				<td><label for="file">File for Classes</label></td>
				<td><label for="file">File for Rooms</label></td>
			</tr>
			
			<tr>
				<td><label for="file">format: .csv</label></td>
				<td><label for="file">format: .csv</label></td>
			</tr>
	
			<tr>
				<!-- only allows .csv to be be uploaded -->
				<td><input type="file" accept = ".csv" name="classes_to_upload" id="classes_to_upload" class ="Uploadbtn"/> </td>
				<td><input type="file" accept = ".csv" name="rooms_to_upload" id="rooms_to_upload" class ="Uploadbtn"/> </td>
			</tr>
			
			<!--<tr>
				<td><input type="button" value="Upload" name="submitClasses" class ="Uploadbtn" /> </td>
				<td><input type="button" value="Upload" name="submitRooms" class ="Uploadbtn" /> </td>
			</tr> -->
			
			<!-- merges 2 cells to fit submit button into -->
			<tr><td colspan = "2">&nbsp;<input type="submit" value="Submit" name="Submit" class = "Submitbtn"/></td></tr>
	</table>
		
</form>

</body>
</html>