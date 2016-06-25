
<?php
require 'inc.php';
$connect=mysql_connect("localhost","root","")or die("We did not connect to the database");
mysql_select_db("beach",$connect)or die("We did not select the database");
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$pwd=$_POST['pwd'];
	if(!empty($username)&&(!empty($pwd)))
	{
		$query="SELECT id FROM signup WHERE username='$username' AND pwd='$pwd'";
		if($query_run=mysql_query($query))
		{
			$query_num_rows=mysql_num_rows($query_run);
			if($query_num_rows==0)
			{
				echo "<button style='background-color:red;color:white;font-weight:bold;font-size:20px;'>Invalid username and password</button>";
			}
			else if($query_num_rows==1)
			{
				$user_id=mysql_result($query_run,0,'id');
				$_SESSION['user_id']=$user_id;
				header('Location: reservation.php');
			}
		}
		else
		{
			echo "<button style='background-color:red;color:white;font-weight:bold;font-size:20px;'>Invalid username and password</button>";;
		}
		
	}
	else
	{
		echo "<button style='background-color:red;color:white;font-weight:bold;font-size:20px;'>Password and username needed</button>";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta name="viewport"content="device=device-width,initial-scale=1.0"/>
	<title>Stage View Eatery</title>
	<link type="text/css"rel="stylesheet"href="css/bootstrap.min.css"/>
	<link type="text/css"rel="stylesheet"href="eatery.css"/>
</head>
<body style="background-image: url(img/beac31.jpg);">
<div class="container">
<div class="row">
<div class="col-lg-3">
	<a href="index.php"class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-chevron-left"></span> To Home</a>
</div><!--End of col four-->
<div class="col-lg-6">
<div class="panel"style="margin-top: 100px;border: 1px ridge blue;">
<div class="panel-heading btn btn-primary btn-block">
<h2>please login To Reserve</h2>
	
</div><!--End of panel-heading-->
<div class="panel-body">
<form class="form-horizontal"role="form"method="POST"action="<?php echo $current_file; ?>">

<div class="input-group">
<span class="input-group-addon">
	<i class="glyphicon glyphicon-user"></i>
</span>
<input type="text"name="username"class="form-control input-lg"placeholder="Enter username......"/>
	
</div><!--End of input group-->

<div class="input-group"style="margin-top: 20px;">
<span class="input-group-addon">
<i class="glyphicon glyphicon-lock"></i>	
</span>
<input type="password"class="form-control input-lg"name="pwd"placeholder="Please enter password......."/>
	
</div><!--End of input-group-->
<div class="input-group" style="margin-top: 10px;">
<input type="checkbox"class="checkbox-inline">Remember Login<br />
</div><!--End of form group-->
<input type="submit"name="submit"class="btn btn-success btn-lg pull-left"value="Login"style="margin-top: 10px;"/>
<input type="reset"value="Cancel"class="btn btn-danger btn-lg pull-right"style="margin-top: 10px;"/>

	
</form>
</div><!--End of panel body-->
<div class="panel-footer">
	<h4>Don't have an account! <a href="signup.php">sign Up Here</a></h4>
</div><!--End of panel footer-->
</div><!--End of panel-->
	
</div>
	
</div>
	
</div>

<script type="text/javascript"src="jquery-1.11.min.js"></script>
<script type="text/javascript"src="js/bootstrap.min.js"></script>
<script type="text/javascript"src="eatery.js"></script>	
</body>
</html>