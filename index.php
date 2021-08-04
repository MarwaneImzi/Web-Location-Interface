<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" type="text/css" href="StyleSheet.css">
    <meta charset="utf-8" />
    <title>Home</title>

</head>
<body>
<ul>
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="allstudents.php">All Student Locations</a></li>
                <li><a href="24hr.php">Past 24hours</a></li>
				<li><a href="searchlocation.php">Search Location</a></li>
				<li><a href="location.php">Student location</a></li>
            </ul>

<div class="bg"></div>

<div class="container">
  <form action="index.php" method="post">

		<p>StudentID: <input type="text" name="StudentID"  minlength="6" maxlength="6"/></p>
		<p>Firstname: <input type="text" name="FirstName" minlength="1"/></p>
		<p>Surname: <input type="text" name="Surname" minlength="1"/></p>

		<select name="location">
  <option value="Library">Library</option>
  <option value="Fenner">Fenner</option>
  <option value="Hardy">Hardy</option>
  <option value="Esk">Esk</option>
  <option value="Ferens">Ferens</option>
  <option value="Wilberforce">Wilberforce</option>
</select>

		<p>Action:<br/>
		<input type="radio" name="action" value="add" checked="true">Add (New Student)</input><br/>
		<input type="radio" name="action" value="delete">Delete Student (Requires Student ID)</input><br/>
		<input type="radio" name="action" value="update">Update Details (All Feilds must be filled)</input>
		</p>

		<p><input type="submit" value="Send"></input></p>
	</form>
</div>


<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $server = 'sql.rde.hull.ac.uk';
	$connectionInfo = array( "Database"=>"rde_580468");
	$link = sqlsrv_connect($server,$connectionInfo);
	

	$getmaxQuery='select max(ID) as maxId from students';
	$query = sqlsrv_query( $link, $getmaxQuery);
	$row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
	$maxId = $row['maxId'];
	date_default_timezone_set("Europe/London");
	$dateTime= date('Y-m-d H:i:s');
	
	switch($_POST['action'])
	{
		case 'add':
			$insert_query = "INSERT INTO students (ID, StudentID, FirstName, Surname, location, DateCreated) VALUES (?, ?, ?, ?, ?, ?)";
			$params = array($maxId+1,$_POST['StudentID'],$_POST['FirstName'],$_POST['Surname'],$_POST['location'], $dateTime);
			$result = sqlsrv_query($link,$insert_query,$params);
			break;
		case 'delete':
			$delete_query = "delete from students where StudentID=?";
			$params = array($_POST['StudentID']);
			$result = sqlsrv_query($link,$delete_query,$params);
			break;
		case 'update':
			$update_query = "update students set FirstName=?, Surname=?, location=?, DateCreated=? where StudentID=?";
			$params = array($_POST['FirstName'],$_POST['Surname'],$_POST['location'],$dateTime,$_POST['StudentID']);
			$result = sqlsrv_query($link,$update_query,$params);
			break;
	};
	};
	
?> 


</body></html>