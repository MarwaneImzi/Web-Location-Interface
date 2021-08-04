<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Past 24 Hours</title>
</head>
    <link rel="stylesheet" type="text/css" href="StyleSheet.css">
<body>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET')
	{
		$server = 'sql.rde.hull.ac.uk';
		$connectionInfo = array( "Database"=>"rde_580468");
		$link = sqlsrv_connect($server,$connectionInfo);

		$StudentID = $_GET['StudentID'];
		if (isset($_GET['24hrsfind']))
		{
			$describeQuery="select * from students where StudentID LIKE '%".$StudentID."%' AND DateCreated >= DATEADD(day, -1, GETDATE())";
			$result = sqlsrv_query($link, $describeQuery);
		}
	}
?>
<ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="allstudents.php">All Student Locations</a></li>
                <li><a class="active" href="24hr.php">Past 24hours</a></li>
				<li><a href="searchlocation.php">Search Location</a></li>
				<li><a href="location.php">Student location</a></li>
            </ul>
			<div class="bg"></div>

			<div class="container">

			<p>Input Student ID to check if the Student has changed location in the past 24 hours</p>

			<Form name="24hrsform" action="24hr.php" method="get">
			<p>StudentID: <input type="text" name="StudentID"  minlength="6" maxlength="6"/></p>

			<p><input type="submit" name="24hrsfind" value="Search"></input></p>
			</Form>




<?php 

	echo '<table>';
	echo '<tr><th>ID</th><th>studentid</th><th>firstname</th><th>surname</th><th>location</th><th>Date Created</th></tr>';

	while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) 
	{
	echo '<tr>';
	echo '<td>' . $row['ID'] . '</td>'; 
	echo '<td>' . $row['StudentID'] . '</td>'; 
	echo '<td>' . $row['FirstName'] . '</td>'; 
	echo '<td>' . $row['Surname'] . '</td>'; 
	echo '<td>' . $row['location'] . '</td>';
	echo '<td>' . $row['DateCreated']-> format('Y-m-d H:i:s'); '</td>'; 
	echo '</tr>';
	} 

	echo '</table>';
	
	sqlsrv_free_stmt( $query);
?>
</div>

</div>
</body>
</html>