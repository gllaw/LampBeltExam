<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$var = $this->session->userdata('currentUser');

// $user = $this->session->userdata('userData');		//['first_name']

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome</title>
</head>
<body>
	<h1>Welcome <?= $var['first_name'] ?> ! 
	<h2>User Information</h2>
	<p>First Name: <?= $var['first_name'] ?></p>
	<p>Last Name: <?= $var['last_name'] ?></p>
	<p>Email Address: <?= $var['email'] ?></p>
	<p>Password: <?= $var['password'] ?></p>
	<p>Date Joined: <?= $var['created_at'] ?></p>
	<a href="/Logins/destroy">log off</a>
</body>
</html>
