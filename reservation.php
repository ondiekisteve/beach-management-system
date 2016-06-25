<?php
$connect=mysql_connect("localhost","root","")or die("We did not connect to the database");
mysql_select_db("beach",$connect)or die("We did not select the database");
if(isset($_POST['submit']))
{
	$fname=$_POST['fname'];
	$mname=$_POST['mname'];
	$lname=$_POST['lname'];
	$pno=$_POST['pno'];
	$age=$_POST['age'];
	$nationality=$_POST['nationality'];
	$email=$_POST['email'];
	$gender=$_POST['gender'];
	$rmno=$_POST['rmno'];
	$peopleno=$_POST['peopleno'];
	$date_in=$_POST['date_in'];
	$pmode=$_POST['pmode'];
	$tcode=$_POST['tcode'];
	$game=$_POST['game'];
	$food=$_POST['food'];
	$songs=$_POST['songs'];
	$cities=$_POST['cities'];
	
	
	$sql="INSERT INTO reservation(fname,mname,lname,pno,age,nationality,email,gender,rmno,peopleno,date_in,pmode,tcode,game,food,songs,cities)VALUES('$fname','$mname','$lname','$pno','$age','$nationality','$email','$gender','$rmno','$peopleno','$date_in','$pmode','$tcode','$game','$food','$songs','$cities')";
	
	if(mysql_query($sql,$connect))
	{
		echo "<center><button style='background-color:green;color:white;font-weight:bold;font-size:20px;'>Your Reservation Was Successfully</button><center>";
	}
	else
	{
		echo "Error occured in Reserving\n";
	}
}










?>

<!DOCTYPE html>
<html>
<head>
	<title>Turkana Beach</title>
	<meta charset="utf-8"/>
	<meta name="viewport"content="device=device-width,initial-scale=1.0"/>
	<link type="text/css"rel="stylesheet"href="css/bootstrap.min.css"/>
	<link type="text/css"rel="stylesheet"href="jquery-ui.min.css"/>
	<link type="text/css"rel="stylesheet"href="beach.css"/>
</head>
<body>
<?php

include 'header.php';

?>
<div class="container-fluid">
<button class="btn btn-success btn-block"><h2 style="text-align: center;font-family: algerian;font-weight: bold;">RESERVATION PORTAL</h2></button>
<div class="row">
<form method="POST"action="reservation.php">
<div class="col-sm-4">
	<fieldset>
	<legend>Personal Information</legend>
	<table class="table">
	<tr>
		<td>First Name</td>
		<td><input type="text"name="fname"class="form-control"placeholder="Enter First Name.."/></td>
	</tr>
	<tr>
		<td>Middle Name</td>
		<td><input type="text"name="mname"class="form-control"placeholder="Enter Middle Name.."/></td>
		
	</tr>
	<tr>
		<td>Last Name</td>
		<td><input type="text"name="lname"class="form-control"placeholder="Enter last Name.."/></td>
		
	</tr>
	<tr>
		<td>Phone Number</td>
		<td><input type="text"name="pno"class="form-control"placeholder="Enter Phone No.."/></td>
		
	</tr>
	<tr>
		<td>Age</td>
		<td><input type="text"name="age"class="form-control"placeholder="Enter Age.."/></td>
		
	</tr>
	<tr>
		<td>Nationality</td>
		<td><input type="text"name="nationality"class="form-control"placeholder="Enter Middle Name.."/></td>
		
	</tr>
	<tr>
		<td>Email</td>
		<td><input type="text"name="email"class="form-control"placeholder="Enter Email.."/></td>
		
	</tr>
	<tr>
		<td>Gender</td>
		<td><input type="radio"name="gender"value="Female">Female
		<input type="radio"name="gender"value="Male">Male
		</td>
		
	</tr>
		
	</table>	
	</fieldset>
</div><!--End of col-->
<div class="col-sm-4">	
<fieldset>
	<legend>Reserving</legend>
	<table class="table">
		<tr>
			<td>Number of Rooms</td>
			<td><input type="number"name="rmno"class="form-control"/></td>
		</tr>
		<tr>
			<td>Days To Spend</td>
			<td><input type="number"name="days"class="form-control"/></td>
		</tr>
		<tr>
			<td>Number of People</td>
			<td><input type="number"name="peopleno"class="form-control"/></td>
		</tr>
		<tr>
			<td>Day To Check In</td>
			<td><input type="text"name="date_in"class="form-control"id="date"/></td>
		</tr>
		
		<tr>
			<td>Mode of Payment</td>
			<td>
				<select name="pmode"class="form-control">
					<option value="Mpesa">Mpesa</option>
					<option value="Cash">Cash</option>
					<option value="Cheque">Cheque</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Transaction Code</td>
			<td><input type="text"name="tcode"class="form-control"/></td>
		</tr>
	</table>
</fieldset>
</div><!--End of col-->
<div class="col-sm-4">
	<fieldset>
	<legend>Interests &amp;Hobbies</legend>
	<table class="table">
		<tr>
			<td>Favourite Game</td>
			<td>
				<select name="game"class="form-control">
					<option value="Football">Football</option>
					<option value="Valleyball">Valleyball</option>
					<option value="Swimming">Swimming</option>
					<option value="Skating">Skating</option>
					<option value="Criket">Criket</option>
					<option value="Golf">Golf</option>
					<option value="Hockey">Hockey</option>
					<option value="Tenis">Tenis</option>
					<option value="Football">Chess</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Favourite Food</td>
			<td>
				<select name="food"class="form-control">
					<option value="Pizza">Pizza</option>
					<option value="Burglar">Burglar</option>
					<option value="Salad">Salad</option>
					<option value="Chips">Chips</option>
					<option value="Chicken">Chicken</option>
					<option value="Chapati">Chapati</option>
					<option value="Hot dogs">Hot Dogs</option>
					<option value="Cakes">Cakes</option>
					<option value="Chocolate">chocolate</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Favourite Songs</td>
			<td>
				<input type="checkbox"name="songs"value="Blues">Blues &nbsp;&nbsp;&nbsp;
				<input type="checkbox"name="songs"value="Reggue">Reggue&nbsp;&nbsp;
				<input type="checkbox"name="songs"value="Bongo">Bongo<br />
				<input type="checkbox"name="songs"value="Love Songs">Love Songs
				<input type="checkbox"name="songs"value="Riddim">Riddim
				<input type="checkbox"name="songs"value="Gospel">Gospel
				
			</td>
		</tr>
		<tr>
			<td>Favourite Cities in Kenya</td>
			<td>
				<select name="cities"class="form-control">
				<option value="Nairobi">Nairobi</option>
				<option value="Mombasa">Mombasa</option>
				<option value="Kisumu">Kisumu</option>
				
					
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2">N/B: All fields should be filled</td>
		</tr>
		<tr>
			<td><input type="submit"class="btn btn-success btn-lg"name="submit"value="Submit"/></td>
			<td><input type="reset"class="btn btn-danger btn-lg"name="reset"value="Cancel"/></td>
		</tr>
	</table>
</fieldset>

</div><!--End of col-->
</form>
	
</div><!--End of row-->

<?php

include 'footer.php';

?>
	
</div><!--end of container fluid-->
	
	
	
	
	
	<script type="text/javascript"src="jquery-1.11.1.min.js"></script>
	<script type="text/javascript"src="js/bootstrap.min.js"></script>
	<script type="text/javascript"src="jquery-ui.min.js"></script>
	<script type="text/javascript"src="beach.js"></script>
</body>

</html>