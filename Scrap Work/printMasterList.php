<?php

/*	link: https://www.w3schools.com/php/php_mysql_select.asp
	username and password is same as MySQL workbench root login info
	$dbname is scheduling 
*/


$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "scheduling2";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error)
				die("Connection failed: " . $conn->connect_error);
			else
				echo "<br>Connection Successful</br>";
			
			
			//$query1 = "SELECT * FROM scheduledtimes"; //You don't need a ; like you do in SQL
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

			mysql_close(); //Make sure to close out the database connection
			
			
?>