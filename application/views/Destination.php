<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$tripDeets = $this->session->userdata('userTrips');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Destination</title>
</head>
<body>
	<h1><?= $tripDeets['destination'] ?></h1>
	<p>Planned By: <?= $tripDeets['creator'] ?></p>
	<p>Description: <?= $tripDeets['plan'] ?></p>
	<p>Travel Date From: <?= $tripDeets['startDate'] ?></p>
	<p>Travel Date To: <?= $tripDeets['returnDate'] ?></p>
	<h2>Other users joining the trip:</h2>
	<ul>
<?php
foreach ($name as $joiner){
	//make names show up as li items
}
?>
	</ul>
</body>
</html>