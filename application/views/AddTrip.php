<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Plan</title>
</head>
<body>
	<div id="addtrip">
		<h1>Add a Trip</h1>
		<form action="addTripToDB" method="post">
		    <p>Destination:</p>
		    <input type="text" name="destination"><br>
		    <p>Description:</p>
		    <input type="text" name="plan"><br>
		    <p>Travel Date From:</p>
		    <input type="date" name="startDate"><br>
		    <p>Travel Date To:</p>
		    <input type="date" name="returnDate"><br>
		    <input class="button" type="submit" value="Add">
		    <?= $this->session->flashdata('tripError'); ?>
		</form>
	</div>
</body>
</html>