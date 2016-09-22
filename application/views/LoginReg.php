<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<style type="text/css">
    body{
        padding-top: 2em;
    }
    #login{
        display: block; 
        vertical-align: top;
        border: 2px solid black;
        padding: 3em;
        text-align: center;
    }
    #login h3{
    	text-align: left;
    }
    #reg{
        display: block; 
        vertical-align: top;
        border: 2px solid black;
        padding: 3em;
        text-align: center;
    }
    #reg h3{
    	text-align: left;
    }
   /* #try{
    	text-align: right;
    	margin-right: 250px;
    }
   	#try p{
   		text-align: left;
   		margin-right: 250px;
   	}*/
    input{
        display: inline-block;
        vertical-align: top;
    }
    .button {
        margin-top: 20px;
    }
    p{
        display: inline-block;
        vertical-align: top;
        position: relative;
        top: -15px;
        margin-right: 10px;
    }


</style>
<body>
    <h3>Login</h3>
	<form id="login" action="/Logins/actuallyLogin" method="post">
	    <p>Email:</p>
	    <input type="text" name="email"><br>
	    <p>Password:</p>
	    <input type="password" name="password"><br>
	    <input class="button" type="submit" value="Login">
        <?= $this->session->flashdata('loginError'); ?>
	</form>
    <h3>Register</h3>
	<form id="reg" action="/Logins/register" method="post">
	    <p>First Name:</p>
	    <input type="text" name="firstName"><br>
	    <p>Last Name:</p>
	    <input type="text" name="lastName"><br>
	    <p>Email Address:</p>
	    <input type="text" name="email"><br>
	    <p>Password:</p>
	    <input type="password" name="password"><br>
	    <p>Confirm Password:</p>
	    <input type="password" name="confirmPassword"><br>
	    <input class="button" type="submit" value="Register">
        <?= $this->session->flashdata('regError'); ?>
	</form>
</body>
</html>