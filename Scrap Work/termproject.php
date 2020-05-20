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
		 
		public function hourDivision($hr, $dys, $coName, &$daysDistr)
		{
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
				while ($sum != $hr) //checks to see if distribution was done correctly
				{	
					$temp1 = $hr; 
					$temp2 = $dys;
					for($i = 0; $i <= $dys - 1; $i++)
					{
						$quotient = round($temp1/$temp2, 0, PHP_ROUND_HALF_UP);
						echo $temp1."/".$temp2."<br></br>";
						$daysDistr[$i] = $quotient;
						
						$numerator = $temp1 - $quotient;
						$denominator = $temp2 - 1;
						$temp1 = $numerator;
						$temp2 = $denominator; 
						
					}
					
					//checks hourly distribution to determine if it sums up to total hours
					for($i = 0; $i <= sizeof($daysDistr) - 1 ; $i++)
						$sum += $daysDistr[$i];
					
					if($sum != $hr)
						echo "INCORRECT DISTRO";
				}	
			}
		}
		
		public function printHRS(&$daysDistr)
		{
			$dayCount = 1;
			for($i = 0; $i <= sizeof($daysDistr) - 1 ; $i++)
			{
				echo "Day ". $dayCount . ": " . $daysDistr[$i] . "<br></br>";
				$dayCount++;
			}
		}
		
		public function readClasses(&$ClassesArray)
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
				
				$conn = mysqli_connect("localhost", "root", "", "scheduling");

			if($conn)
			{
				$file = $_FILES["classes_to_upload"]["tmp_name"];
				$handle = fopen($file,"r");
				while(($cont=fgetcsv($handle,1000,","))!==false)
				{
					$query = "SELECT labhr FROM coursedetails WHERE  cono == $cont[0]";
					$result = mysqli_query($conn, $query);
					/*while($row = mysqli_fetch_array($result))
					{
						echo $row[0];
					}	
					*/
					
					
					$row = mysqli_fetch_array($result, MYSQLI_NUM);
					printf ("%s (%s)\n", $row[0]);
				}
			}
			}
		}

		public function readRooms()
		{
			//elseif($roomSubmit == "Upload")
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
				
				// Limit allowed file formats
				/*elseif($file_type != "csv") 
				{
					echo " Only .csv are allowed.";
					$uploadOk = 0;
				}*/
				
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
			//$daysofWeek = array(" ", "Monday", "Tuesday", "Wednesday", 
								//"Thursday", "Friday", "Saturday", "Sunday");
								
			$daysofWeek = array(" ", "Monday");
								
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

/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "scheduling";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
	die("Connection failed: " . $conn->connect_error);
else
	echo "<br>Connection Successful</br>";
*/

/*$course = "";
$NoDays = 0;
$Total_Hours = 0;
if(isset($_POST['submit']))							
{
	$course =  $_POST['course'];
	$NoDays =  $_POST['daysNum'];
	$Total_Hours = $_POST['courseHr'];
	
	echo $course."<br></br>";
	echo $NoDays."<br></br>";
	echo $Total_Hours."<br></br>";
	
	$HRarray = array(0,0,0,0,0,0);
	
	$class1 = new schedule($Total_Hours, $NoDays, $course);
	//$class1 = new schedule($_POST['course'], $_POST['daysNum'], $_POST['courseHr']);
	$class1->hourDivision($Total_Hours, $NoDays, $course, $HRarray);
	
	echo "<br>Daily Hour Distribution: </br>";
	$class1->printHRS($HRarray);
	$class1->makeGrid();
	
	
}	*/

//if(isset($_POST['submit']))

if(isset($_POST['Submit']))
		
{
	//if( isset($_POST['submitClasses']) ||  isset($_POST['submitRooms']) )
	//{	
	
	$HRarray = array(0,0,0,0,0,0);

	//$ClassesArray = array();
	
	$class1 = new schedule();
	$class1->readClasses($ClassesArray);
	//$class1->readRooms($RoomArray);

			
	$class1->printMasterList();

	
	
	
}

?>

</table>
</body>
</html>
