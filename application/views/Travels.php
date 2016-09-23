<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$userDeets = $this->session->userdata('currentUser');
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
		<table>
			<tr>
		    	<th>Destination</th>
		    	<th>Travel Start Date</th>
		    	<th>Travel End Date</th>
		    	<th>Plan</th>
		  	</tr>
		 	<tr>
			    <td></td>
			    <td>Maria Anders</td>
			    <td>Germany</td>
		 	</tr>
		 	<tr>
			    <td>Centro comercial Moctezuma</td>
			    <td>Francisco Chang</td>
			    <td>Mexico</td>
		 	</tr>
		 	<tr>
			    <td>Ernst Handel</td>	
			    <td>Roland Mendel</td>
			    <td>Austria</td>
		 	</tr>
		 	<tr>
			    <td>Island Trading</td>
			    <td>Helen Bennett</td>
			    <td>UK</td>
		 	</tr>
		 	<tr>
			    <td>Laughing Bacchus Winecellars</td>
			    <td>Yoshi Tannamuri</td>
			    <td>Canada</td>
		 	</tr>
		 	<tr>
			    <td>Magazzini Alimentari Riuniti</td>
			    <td>Giovanni Rovelli</td>
			    <td>Italy</td>
		 	</tr>
		</table>
	<h2>Other User's Travel Plans</h2>
	<!-- <p>First Name: <?= $userDeets['first_name'] ?></p>
	<p>Last Name: <?= $userDeets['last_name'] ?></p>
	<p>Email Address: <?= $userDeets['email'] ?></p>
	<p>Password: <?= $userDeets['password'] ?></p>
	<p>Date Joined: <?= $userDeets['created_at'] ?></p> -->
	<a href="/Sessions/destroy">Logout</a>
	<a href="/#">Add Travel Plan</a>						<!-- need to set route to a function! -->
</body>
</html>
