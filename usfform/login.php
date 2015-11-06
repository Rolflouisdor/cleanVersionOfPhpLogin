<?php
/*
 Login.php
 
 login in members

*/

// start session/load configs

session_start();

include('connection.php');
include('includes/config.php');

$error['alert'] = '';
$error['mail'] = '';
$error['pass'] = '';
 
$input['mail'] = '';
$input['pass'] = '';

//check if the form is submitted

if(isset($_POST['submit']))
{
	// process if form is submitted 
	// first step check if there's value in form
	
	if($_POST['email'] == '' || $_POST['password'] =='')
	{
		// both fields or one field is empty display error 
		
		if($_POST['email'] ==''){$error['mail'] = 'required:';}
		if($_POST['password'] ==''){$error['pass'] = 'required:';}
		$error['alert'] = 'please fill in required fields';
		
		$input['email'] = $_POST['email'];
		$input['password'] = $_POST['password'];
		
		include('views/v_login.php');
	}
	else
	{
		// check if email and password match against the data in the db
		$input['email']	= htmlentities($_POST['email'], ENTER_QUOTES);
		$input['password']	= htmlentities($_POST['password'], ENTER_QUOTES);
		
		// create query
		
		if($stmt = $connect->query("SELECT * FROM  users WHERE email=? AND password =?"))
		{
			// if statement checks out then do this
			
			// also I am adding prottection against sql injections and site scripting using the md5 and asult methods	
			
			//$stmt->bind_param("ss", $input['email'],md5($input['password']. $config['asult']));
			
			$stmt->bind_param("ss", $input['emails'],$input['passwords']);
			
			$stmt->execute();
			$stmt->store_result();
			
			// check if  
			
				if($stmt->num_rows > 0)
				{
					// set session variable
					
					$_SESSION['email'] = $input['email'];
					
					header('Location: user.php');
				}
				else
				{
					// user name or password is incorrect
					
					$error['alert'] = "email or password is incorrect";
					include('views/v_login.php'); 
				}
		}
		else
		{
			echo "ERROR: Could not prepare MySQLi Statement."; 	
		}
		
	}
}
else
{
	// I want to display the form 
	include('views/v_login.php');
}
