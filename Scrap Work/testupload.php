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
			
			<tr>
				<td><input type="submit" value="Upload" name="submitClasses" class ="Uploadbtn" /> </td>
				<td><input type="submit" value="Upload" name="submitRooms" class ="Uploadbtn" /> </td>
			</tr>
			<!-- merges 2 cells to fit submit button into -->
			<tr><td colspan = "2">&nbsp;<input type="submit" value="Submit" name="Submit" class = "Submitbtn"/></td></tr>
	</table>
		
</form>

<?php 
if($_POST["submitClasses"] == "Upload") 
			{

				$target_dir = "C:/xampp/htdocs/uploads";
				$target_file = $target_dir . basename($_FILES["classes_to_upload"]["name"]);
				$uploadOk = 1;
				$image_file_type = pathinfo($target_file,PATHINFO_EXTENSION);

				
				// Check if file already exists
				if (file_exists($target_file)) 
				{
					echo "File already present.";
					$uploadOk = 0;
				}
				
				// Limit allowed file formats
				/* elseif($file_type != "csv") 
				{
					echo " Only .csv are allowed.";
					$uploadOk = 0;
				} */
				
				// Check file size
				elseif ($_FILES["classes_to_upload"]["size"] > 1000000) 
				{
					echo "File too big.";
					$uploadOk = 0;
				}
				
				// Check if $upload_ok is set to 0 by an error
				elseif ($uploadOk == 0) 
				{
					echo "Your file was not uploaded.";
				// If all the checks are passed, file is uploaded
				}
				
				else 
				{
					if (move_uploaded_file($_FILES["classes_to_upload"]["tmp_name"], $target_file)) 
						echo "The file ". basename( $_FILES["classes_to_upload"]["name"]). " was uploaded.";
				  
					else 
						echo "A error has occured uploading.";
				}
				
				/* creates associative array based on classes*/
				$tmpName = $_FILES["classes_to_upload"]["tmp_name"];
				$ClassesArray = array_map("str_getcsv", file($tmpName));
				
				/* prints associative array*/
				foreach($ClassesArray as $value)
				{
					print_r($value);
					echo"<br></br>";
				}
			}
      
      
      
      elseif($_POST["submitRooms"] == "Upload")
			{	
				$target_dir = "C:/xampp/htdocs/uploads";
				$target_file = $target_dir . basename($_FILES["rooms_to_upload"]["name"]);
				$uploadOk = 1;
				$image_file_type = pathinfo($target_file,PATHINFO_EXTENSION);

				
				// Check if file already exists
				if (file_exists($target_file)) 
				{
					echo "File already present.";
					$uploadOk = 0;
				}
				
				// Limit allowed file formats
				elseif($file_type != "csv") 
				{
					echo " Only .csv are allowed.";
					$uploadOk = 0;
				}
				
				// Check file size
				elseif ($_FILES["rooms_to_upload"]["size"] > 1000000) 
				{
					echo "File too big.";
					$uploadOk = 0;
				}
				
				// Check if $upload_ok is set to 0 by an error
				elseif ($uploadOk == 0) 
				{
					echo "Your file was not uploaded.";
				// If all the checks are passed, file is uploaded
				}
				
				else 
				{
					if (move_uploaded_file($_FILES["rooms_to_upload"]["tmp_name"], $target_file)) 
						echo "The file ". basename( $_FILES["rooms_to_upload"]["name"]). " was uploaded.";
				  
					else 
						echo "A error has occured uploading.";
				}
	
				/* creates associative array based on rooms*/
				$tmpName = $_FILES["rooms_to_upload"]["tmp_name"];
				$RoomArray = array_map("str_getcsv", file($tmpName));
				
				/* prints associative array*/
				foreach($RoomArray as $value)
				{
					print_r($value);
					echo"<br></br>";
				}
        
        else
			{
				echo "Now Scheduling";
			}
?>

</body>
</html>
