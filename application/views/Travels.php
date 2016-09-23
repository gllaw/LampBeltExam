<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$userDeets = $this->session->userdata('currentUser');
$yourTripDeets = $this->session->userdata('userTrips');
$otherTripDeets = $this->session->userdata('other');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Travel Dashboard</title>
</head>
<body>
	<h1>Hello <?= $userDeets['name'] ?> ! 
	<h2>Your Trip Schedules</h2>
	<p>Destination: 
		<table>
			<tr>
		    	<th>Destination</th>
		    	<th>Travel Start Date</th>
		    	<th>Travel Return Date</th>
		    	<th>Plan</th>
		  	</tr>
		  	<tr>
		  		<td><a href="#"><?= $yourTripDeets['destination'] ?></a></td>
		  		<td><?= $yourTripDeets['start'] ?></td>
		  		<td><?= $yourTripDeets['return'] ?></td>
		  		<td><?= $yourTripDeets['plan'] ?></td>
		  	</tr>
		</table>
	<h2>Other User's Travel Plans</h2>
		<table>
			<tr>
				<th>Name</th>
		    	<th>Destination</th>
		    	<th>Travel Start Date</th>
		    	<th>Travel Return Date</th>
		    	<th>Do You Want to Join?</th>
		  	</tr>
		  	<tr>
		  		<td><?= $otherTripDeets['name'] ?></td>
		  		<td><a href="destination"><?= $otherTripDeets['destination'] ?></a></td>
		  		<td><?= $otherTripDeets['start'] ?></td>
		  		<td><?= $otherTripDeets['return'] ?></td>
		  		<td><?= $otherTripDeets['plan'] ?></td>
		  		<a href="join">Join</a>
		  	</tr>
		</table>
	<a href="/Sessions/destroy">Logout</a>
	<a href="/Sessions/addTripView">Add Travel Plan</a>
</body>
</html>
