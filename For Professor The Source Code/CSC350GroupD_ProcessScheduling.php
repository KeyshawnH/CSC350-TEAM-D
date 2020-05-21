<html>
<body>
<table border="1">

<?php 
	class schedule 
	{
		private $hr;
		private $dys;
		private $coName;
		
		private $servername = "localhost";
		private $username = "root";
		private $password = "";
		private $dbname = "scheduling";
				
		public function __construct()
		{
			// Create connection
			$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
			// Check connection
			if ($conn->connect_error)
				die("Connection failed: " . $conn->connect_error);
			else
				echo "<br>Connection Successful</br>";
		}
		
		public function readClasses()
		{
			if(isset($_POST['Submit'])) 
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
					/*	creates a copy of file and renames it as uploads[file_name]	*/
					if (move_uploaded_file($_FILES["classes_to_upload"]["tmp_name"], $target_file)) 
						echo "The file ". basename( $_FILES["classes_to_upload"]["name"]). " was uploaded.";
				  
					else 
						echo "A error has occured uploading.";
				}
				
				$conn = mysqli_connect("localhost", "root", "", "scheduling");

				if($conn)
				{
					$file = $_FILES["classes_to_upload"]["tmp_name"];
					$handle = fopen($file,"r");
					while(($cont=fgetcsv($handle,1000,","))!==false)
					{
						$hr = 0;
						
						/*	Selects data for hourly distribution	*/
						$sql = "SELECT cono, labhr+lechr AS total FROM coursedetails WHERE  cono = '$cont[0]'";
						if($result = mysqli_query($conn, $sql))
						{	
						
						if (mysqli_num_rows($result) > 0) 
						{
								echo "<table border = 1>";
								echo "<tr>";
									echo "<th>cono</th>";
									echo "<th>total</th>";
									//echo "<th>labhr</th>";
									//echo "<th>lechr</th>";
								echo "</tr>";
							 while($row = mysqli_fetch_array($result))
							  {
								echo "<tr>";
								echo "<td>" . $row['cono'] . "</td>";
								$hr = $row['total'];
								echo "<td>" . $row['total'] . "</td>";
							  }
							 
								
								// Free result set
								mysqli_free_result($result);

							
							/*Performing Hourly Distribution*/
							$dys = $cont[1];
							$coName = $cont[0];
							$daysDistr = array();
							if(!is_Numeric($hr) || !is_Numeric($dys))
							echo "Invalid input. Numeric values only for total course hours and days to be scheduled.";
				
							elseif(is_float($hr) || is_float($dys))
								echo "Invalid input. Decimal values are not accepted for total course hours and days to be scheduled.";
							
							elseif($hr <= 0 || $dys <= 0)
								echo "Invalid input. Numeric values must be nonnegative values.";
							
							elseif($hr < $dys)
								echo "Total courses must be greater than days to be scheduled.";
								
							else
							{
								$sum = 0; //holds value of accumulated sum in array
									$temp1 = $hr; 
									$temp2 = $dys;
									for($i = 0; $i <= $dys - 1; $i++)
									{
										$quotient = round($temp1/$temp2, 0, PHP_ROUND_HALF_UP);
										//echo $temp1."/".$temp2."<br></br>";
										$daysDistr[$i] = $quotient;
										
										$numerator = $temp1 - $quotient;
										$denominator = $temp2 - 1;
										$temp1 = $numerator;
										$temp2 = $denominator; 
									}
							}
							
							/* Print Hourly Distribution Array*/
							$withComma = implode(",", $daysDistr);
							//echo "<tr>";
								echo "<td>" . $withComma . "</td>";
							echo "</tr>";
							echo "</table>";
							echo "<br></br>";
							
							/*starts scheduling sections by going into roomweek and checking for available hourly time slots*/
							/*$sql2 = "SELECT roomno FROM roomweek WHERE roomavailability = 'Yes' ";
							if($result = mysqli_query($conn, $sql))
							{	
								if (mysqli_num_rows($result) > 0) 
								{
									for($i = 0; i < sizeof($daysDistr); $i++)
									{
										$daysofWeek = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
										for($j = 0; j < sizeof($daysofWeek); $j++)
										{
											$counter = 0;
											
											while($row['$dayofWeek[$j]'] <= 10)
											{
												
												$counter += $daysDistr[$i];
												$insertSQL = "INSERT INTO roomweek ('$j') VALUES('$row['$dayofWeek[$j]']')";
												
												break;
											}
										}
									}
								}	
						} */
					}
							
						else
							echo "0 results";
						
						}
					}
				}
			}
		}

		public function readRooms()
		{
			if(isset($_POST['Submit']))
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
					/*	creates a copy of file and renames it as uploads[file_name]	*/
					if (move_uploaded_file($_FILES["rooms_to_upload"]["tmp_name"], $target_file)) 
						echo "The file ". basename( $_FILES["rooms_to_upload"]["name"]). " was uploaded.";
				  
					else 
						echo "A error has occured uploading.";
				} 
			$conn = mysqli_connect("localhost", "root", "", "scheduling");

			if($conn)
			{
				$file = $_FILES["rooms_to_upload"]["tmp_name"];
				$handle = fopen($file,"r");
				while(($cont=fgetcsv($handle,1000,","))!==false)
				{
					
					$table=rtrim($_FILES["rooms_to_upload"]["tmp_name"], ".csv");
		
						$query = "INSERT INTO roomweek (roomno, roomavailibility, monday, tuesday, wednesday, thursday, friday, saturday, sunday)
						VALUES ('$cont[0]', 'Yes', '0', '0', '0', '0', '0', '0', '0')";
						echo $query;
						mysqli_query($conn, $query);
				}
			}
			}
		}
		
		public function makeGrid()
		{
			$daysofWeek = array(" ", "Monday", "Tuesday", "Wednesday", 
								"Thursday", "Friday", "Saturday", "Sunday");
								
								
			$hours = array("8:00 am", "9:00 am", "10:00 am", "11:00 am", "12:00 pm",
							"1:00 pm", "2:00 pm", "3:00 pm", "4:00 pm", "5:00 pm", 
							"6:00 pm", "7:00 pm", "8:00 pm", "9:00 pm", "10:00 pm");
	
			for ($j = 0; $j <= sizeof($daysofWeek) - 1; $j++)
				echo "<td><b>$daysofWeek[$j]</b></td>"; 
				
			for ($i = 0; $i <= sizeof($hours) - 1 ; $i++)
				echo "<tr></tr> <td><b>$hours[$i]</b></td> <td></td> 
						<td></td> <td></td> 
						<td></td> <td></td> 
						<td></td> <td></td>"; 
		}
		
		
		
		public function printMasterList()
		{
			$conn = mysqli_connect("localhost", "root", "", "scheduling");

			if($conn)
			{
			
				$query1 = "SELECT *, sectiondetails.cono FROM scheduledtimes JOIN sectiondetails ON sectiondetails.secno = scheduledtimes.secno";
				$result = mysqli_query($conn, $query1);
				
				
				echo "<table border = 1>"; // start a table tag in the HTML

				while($row = mysqli_fetch_array($result))
				{   //Creates a loop to loop through results
					echo "<tr><td>" . $row['cono'] . "</td><td>" . $row['secno'] . "</td><td>" . $row['DayMeet1'] . 
						"</td><td>" . $row['DayMeet2'] . "</td><td>". $row['DayMeet3'] . 
						"</td><td>". $row['StartTime1'] . "</td><td>". $row['StartTime2'] . 
						"</td><td>".$row['StartTime3'] . "</td><td>". $row['EndTime1'] . 
						"</td><td>".$row['EndTime2'] . "</td><td>".$row['EndTime3'] . "</td></tr>";  
				}

				echo "</table>"; //Close the table in HTML
			}
			//mysql_close(); //Make sure to close out the database connection
		}
		
		
	}

/*	link: https://www.w3schools.com/php/php_mysql_select.asp
	username and password is same as MySQL workbench root login info
	$dbname is scheduling 
*/

if(isset($_POST['Submit']))		
{


/*	After uploading both classes.csv and rooms.csv files onto the upload page, it will take
	a few minutes for the file to appear in htdocs. Once both files appear in the htdocs folder, 
	then the other parts of the schedule processing will run smoothly.*/

	$class1 = new schedule();
	$class1->readClasses();
	$class1->readRooms();

			
	//$class1->printMasterList();	
}

?>

</table>
</body>
</html>
