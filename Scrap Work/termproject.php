<html>
<body>
<table border="1">

<?php 

	class schedule 
	{
		private $hr;
		private $dys;
		private $coName;
		
		public function __construct($hr, $dys, $coName)
		{
			$this->hr = $hr;
			$this->dys = $dys;
			$this->coName = $coName;
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

		public function InsertClass()
		{
				//if($numClasses 
		}
		
		public function readCSV()
		{
			
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
		
		public function storeData()
		{
			
		}
	}


$course = "";
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
	
	
}	




?>

</table>
</body>
</html>
