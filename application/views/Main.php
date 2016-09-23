<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login/Registration</title>
</head>
<body>
	<div id="register">
	    <h3>Register</h3>
		<form id="reg" action="register" method="post">
		    <p>Name:</p>
		    <input type="text" name="name"><br>
		    <p>Username:</p>
		    <input type="text" name="username"><br>
		    <p>Password:</p>
		    <input type="password" name="password"><br>
		    <p>Confirm Password:</p>
		    <input type="password" name="confirmPassword"><br>
		    <input class="button" type="submit" value="Register">
	        <?= $this->session->flashdata('regError'); ?>
		</form>
	</div>
	<div id="login">
	    <h3>Login</h3>
		<form id="login" action="login" method="post">
		    <p>Username:</p>
		    <input type="text" name="username"><br>
		    <p>Password:</p>
		    <input type="password" name="password"><br>
		    <input class="button" type="submit" value="Login">
	        <?= $this->session->flashdata('loginError'); ?>
	        <?= $this->session->flashdata('DNEerror'); ?>
		</form>
	</div>
</body>
</html>