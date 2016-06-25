<?php
session_start();
$connect=mysql_connect("localhost","root","")or die("We did not connect to the database");
mysql_select_db("beach",$connect)or die("We did not select the database");
if(isset($_POST['submit']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$age=$_POST['age'];
	$pno=$_POST['pno'];
	$location=$_POST['location'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$pwd=$_POST['pwd'];
	$confirm=$_POST['confirm'];
	if(!empty($fname)&& !empty($lname)&& !empty($age)&& !empty($pno)&& !empty($location)&& !empty($email)&& !empty($username)&& !empty($pwd)&& !empty($confirm))
	{
		
		$query="SELECT username FROM signup WHERE username='$username'";
		$query_run=mysql_query($query);
		if(mysql_num_rows($query_run)==1)
		{
			echo "<style type='text/css'>
		#username{
			border:3px solid red;
		}
		</style>";
			echo "<center><button style='background-color:red;color:white;font-weight:bold;font-size:20px;'>username ".$username." Already exists</button></center>";
		}
		else
		{
	if($pwd==$confirm)
	{
		$pwd_length=strlen($pwd);
		if($pwd_length>6)
		{
			$email_r=strpos($email,"@");
			if(!$email_r)
			{
				echo "<style type='text/css'>
		#email{
			border:3px solid red;
		}
		</style>";
				echo "<center><button style='background-color:red;color:white;font-weight:bold;font-size:20px;'>Invalid email address</button><center>";
			}
			else
			{
	
	$sql="INSERT INTO signup(fname,lname,age,pno,location,email,username,pwd,confirm)VALUES('$_POST[fname]','$_POST[lname]','$_POST[age]','$_POST[pno]','$_POST[location]','$_POST[email]','$_POST[username]','$_POST[pwd]','$_POST[confirm]')";
	if(mysql_query($sql,$connect))
	{
		echo "<center><button style='background-color:green;color:white;font-weight:bold;font-size:20px;'>Thanx ".$fname. " You were successifully registered</button><center>";
		$_SESSION['fname']=$fname && $_SESSION['lname']=$lname;
	}
	else
	{
		echo "Error occured in inserting data into the database";
	}
	}
	}
	else
	{
		echo "<center><button style='background-color:red;color:white;font-weight:bold;font-size:20px;'>Password should be more than 6 characters</button></center>";
	}
	}
	else
	{
		echo "<style type='text/css'>
		#confirm{
			border:3px solid red;
		}
		</style>";
		echo "<center><button style='background-color:red;color:white;font-weight:bold;font-size:20px;'>Password does not match</button></center>";
		
	}
	}
	}
	else
	{
	
		echo "<center><button style='background-color:red;color:white;font-weight:bold;font-size:20px;'>All the fields are needed</button></center>";
	}
}

?>



<html>
<head>
<title>Turkana Hotsport Beach</title>
<meta name="viewport"content="device-width,initial-scale=1.0"/>
	<link type="text/css"rel="stylesheet"href="css/bootstrap.min.css"/>
	<link type="text/css"rel="stylesheet"href="eatery.css"/>
</head>
<body style="background-image: url(img/beach12.jpg)">
<div class="container">
<div class="row">
<div class="col-lg-3">
<a href="index.php"class="btn btn-success"type="button">Proceed to home <span class="glyphicon glyphicon-chevron-right"></span></a>
</div><!--End of col-lg-3-->
<div class="col-lg-6">
<div class="panel">
<div class="panel-heading btn btn-primary btn-block">
	<h3>SIGN UP HERE</h3>
</div><!--End of panel heading-->
<div class="panel-body btn btn-default btn-block"id="nav">
	<form method="POST"action="signup.php"class="form-inline"role="form">
	<table class="table">
	<tr>
		<td><label for="fname">FIRST NAME</label></td>
		<td><input type="text"name="fname"id="fname"class="form-control"/></td>
	</tr>
	<tr>
		<td><label for="lname">LAST NAME</label></td>
		<td><input type="text"name="lname"id="lname"class="form-control"/></td>
	</tr>
	<tr>
		<td><label for="age">AGE</label></td>
		<td><input type="text"name="age"id="age"class="form-control"/></td>
	</tr>
	<tr>
		<td><label for="pno">PHONE NUMBER</label></td>
		<td><input type="text"id="pno"name="pno"class="form-control"/></td>
	</tr>
	<tr>
		<td><label for="location">LOCATION</label></td>
		<td><input type="text"name="location"id="location"class="form-control"/></td>
	</tr>
	<tr>
		<td><label for="email">EMAIL</label></td>
		<td><input type="text"name="email"id="email"class="form-control"/></td>
	</tr>
	<tr>
		<td><label for="username">USERNAME</label></td>
		<td><input type="text"name="username"id="username"class="form-control"/></td>
	</tr>
	<tr>
		<td><label for="password">PASSWORD</label></td>
		<td><input type="password"name="pwd"id="password"class="form-control"/></td>
	</tr>
	<tr>
		<td><label>CONFIRM PASSWORD</label></td>
		<td><input type="password"name="confirm"id="confirm"class="form-control"id="confirm"></td>
	</tr>
	<tr>
		<td><input type="submit"name="submit"value="SUBMIT"class="btn btn-success btn-lg"id="submit"/></td>
		<td><input type="reset"value="CANCEL"class="btn btn-danger btn-lg"/></td>
	</tr>
		
		</table>
	</form>
</div><!--End of panel-->
</div><!--End of panel-->
</div><!--End of col-lg-6-->
</div><!--End of row-->
</div><!--End of container-->
	
<script type="text/javascript"src="jquery-1.11.1.min.js"></script>
<script type="text/javascript"src="js/bootstrap.min.js"></script>
<script type="text/javascript"src="eatery.js"></script>
</body>
</html>