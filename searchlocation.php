<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Search Location</title>
</head>
    <link rel="stylesheet" type="text/css" href="StyleSheet.css">
<body>

<?php 
if ($_SERVER['REQUEST_METHOD'] === 'GET')
	{
		$server = 'sql.rde.hull.ac.uk';
		$connectionInfo = array( "Database"=>"rde_580468");
		$link = sqlsrv_connect($server,$connectionInfo);

		$location = $_GET['location'];
		if (isset($_GET['searchfind']))
		{
			$describeQuery = "SELECT * FROM students WHERE location LIKE '%".$location."%'";
			$result = sqlsrv_query($link, $describeQuery);
		}
	}
?>

<ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="allstudents.php">All Student Locations</a></li>
                <li><a href="24hr.php">Past 24hours</a></li>
				<li><a class="active" href="searchlocation.php">Search Location</a></li>
				<li><a href="location.php">Student location</a></li>
            </ul>
			<div class="bg"></div>

			<div class="container">
			<p>Choose a location to view which students are at the location</p>
			<Form name="searchform" action="searchlocation.php" method="get">
		<select name="location">
  <option value="Library">Library</option>
  <option value="Fenner">Fenner</option>
  <option value="Hardy">Hardy</option>
  <option value="Esk">Esk</option>
  <option value="Ferens">Ferens</option>
  <option value="Wilberforce">Wilberforce</option>
</select>

			<p><input type="submit" name="searchfind" value="Search"></input></p>
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