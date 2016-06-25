
<?php
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
	<title>Turkana Beach</title>
	<meta charset="utf-8"/>
	<meta name="viewport"content="device=device-width,initial-scale=1.0"/>
	<link type="text/css"rel="stylesheet"href="css/bootstrap.min.css"/>
	<link type="text/css"rel="stylesheet"href="beach.css"/>
	<link type="text/css"rel="stylesheet"href="jquery-ui.min.css"/>
</head>
<body>
<?php

include 'header.php';
?>
<div class="container-fluid">
<div class="row">
<div class="col-sm-4">
<center style="font-size: 2em;font-family: lucida calligraphy;">SERVICES PROVIDED</center>
<hr style="border: 3px solid red;margin-top: -10px;">
<div class="panel">
<ul class="nav nav-tabs">
<li class="active"><a href="#accommodation"data-toggle="tab">Accommodation</a></li>
<li><a href="#sports"data-toggle="tab">clubs &amp Sports</a></li>
<li><a href="#catery"data-toggle="tab">Catery</a></li>
<li><a href="#refreshment"data-toggle="tab">Refreshment</a></li>
	
</ul>
<div class="tab-content">
<div class="tab-pane active"id="accommodation">
	<ul class="list-group">
	<li class="list-group-item">
	Turkana Beach is a self contained beach that is recognized world 
	wide by most of the tourists. According to steadman report released on 
	on 22<sup>rd</sup> October last year it was ranked among the best beaches
	in East and Central Africa. In terms of accommodation it is the leading beach
	in Kenya that provides quality accommodation services.	
	</li>
	<h3>Accommodation Availlable</h3>
	<li class="list-group-item">
	<ul class="list-group">
	<li class="list-group-item">A 3 bedroom house with a seating room worth sh.300 per day</li>
	<li class="list-group-item">A 2 bedroom house with a seating room worth sh.200 per day</li>
	<li class="list-group-item">A 3 bedroom house with a seating room worth sh.100 per day</li>
	<li class="list-group-item">A room sh.200 per day</li>	
	</ul>
		
	</li>
	<h3>More Information</h3>
	<li class="list-group-item">
     The beach also provides all the necesary things required in 
     the self contailed house. for example
     <ul class="list-group">
     <li class="list-group-item">A 24 inch flat screen</li>
     <li class="list-group-item">A micro wave</li>
     <li class="list-group-item">An Internet connection  <small>Among others</small></li>
     	
     </ul>
		
	</li>
		
	</ul>
</div><!--end of tab pane-->
<div class="tab-pane"id="sports">
<ul class="list-group">
<li class="list-group-item">
   Turkana County receives a large number of tourists from different
	parts of the world since it has beautiful sceneries. The tourists
	therefore need social and recreation activities such as sports to enable
	them to enjoy themselves and break monotony.
</li>
<h3>Sports Activities</h3>
<li class="list-group-item">
	<ul class="list-group">
	<li class="list-group-item">Swimming</li>
	<li class="list-group-item">Scating</li>
	<li class="list-group-item">Golf</li>
	<li class="list-group-item">footbal</li>
	<li class="list-group-item">Chase</li>
	<li class="list-group-item">Computer Games</li>
		
	</ul>
</li>
	
</ul>
	
</div><!--End of tab pane-->
<div class="tab-pane"id="catery">
<ul class="list-group">
<li class="list-group-item">
	Since most people need to take care of there stomach, Turkana 
	beach decided to come up with a cafeteria that will provide quality
	and efficient services to all the vistors. It had employed several qualified 
	personel that deliver and provide food to the vistors.
</li>
<h3>Cartegories of food provided</h3>
<li class="list-group-item">
<ul class="list-group">
	<li class="list-group-item">Snarks</li>
	<li class="list-group-item">Main Dishes</li>
	<li class="list-group-item">Breakfast</li>
	<li class="list-group-item">European Food</li>
	<li class="list-group-item">Chinese Food</li>
	<li class="list-group-item">African Food</li>
</ul>
	
</li>
	
</ul>
	
</div><!--End of tab pane-->
<div class="tab-pane"id="refreshment">
<ul class="list-group">
<li class="list-group-item">
	The Beach provides different facilites that helps the
	vistors to refresh themselves in times of stress and even 
	when they are tired.
</li>
<h3>Refreshments</h3>
<li class="list-group-item">
	<ul class="list-group">
	<li class="list-group-item">Entertainment</li>
	<li class="list-group-item">sports &amp; clubs</li>
	<li class="list-group-item">Drinking</li>
	<li class="list-group-item">Celebrations</li>
	<li class="list-group-item">Dancing</li>
		
	</ul>
</li>
	
</ul>
	
</div><!--End of tab pane-->
	
</div><!--End of content-->
	
</div><!--End of panel-->
	
</div><!--End of col-->
<div class="col-sm-8">
<div class="carousel slide"id="carousel">
	<ul class="carousel-indicators">
	<li data-slide-to="0"id="#carousel"class="active"></li>
	<li data-slide-to="1"id="#carousel"></li>
	<li data-slide-to="2"id="#carousel"></li>
	<li data-slide-to="3"id="#carousel"></li>
	<li data-slide-to="4"id="#carousel"></li>
	<li data-slide-to="5"id="#carousel"></li>
	<li data-slide-to="6"id="#carousel"></li>
		
	</ul><!--End of carousel indicators-->
	<div class="carousel-inner">
	<div class="item active">
		<img src="img/beach29.jpg"class="btn btn-block"/>
	</div><!--end of carousel item-->
	
	<div class="item">
		<img src="img/beach31.jpg"class="btn btn-block"/>
	</div><!--end of carousel item-->
	<div class="item">
		<img src="img/beach16.jpg"class="btn btn-block"/>
	</div><!--end of carousel item-->
	
	<div class="item">
		<img src="img/beach39.jpg"class="btn btn-block"/>
	</div><!--end of carousel item-->
	
	<div class="item">
		<img src="img/beach17.jpg"class="btn btn-block"/>
	</div><!--end of carousel item-->
	
	<div class="item">
		<img src="img/beach40.jpg"class="btn btn-block"/>
	</div><!--end of carousel item-->
	<div class="item">
		<img src="img/beach39.jpg"class="btn btn-block"/>
	</div><!--end of carousel item-->
	<div class="item">
		<img src="img/beach48.jpg"class="btn btn-block"/>
	</div><!--end of carousel item-->
	<div class="item">
		<img src="img/beach15.jpg"class="btn btn-block"/>
	</div><!--end of carousel item-->
		
	</div><!--end of carousel inner-->
	<a href="#carousel"data-slide="prev"class="left carousel-control"><span class="icon-prev"></span></a>
	<a href="#carousel"data-slide="next"class="right carousel-control"><span class="icon-next"></span></a>
		
	</div><!--End of carousel-->
	
</div><!--End of col-->	
<div class="modal fade"id="modal">
	<div class="modal-dialog">
	<div class="modal-content">
	
	
	<div class="panel"style="border: 1px ridge blue;">
<div class="panel-heading btn btn-primary btn-block">
<a href="#modal"class="close"data-toggle="modal">&times;</a>
<h2>please login</h2>
	
</div><!--End of panel-heading-->
<div class="panel-body">
<form class="form-horizontal"role="form"method="POST"action="index.php">
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
	
		
	</div><!--end of modal content-->
		
	</div><!--End of modal dialog-->
		
	</div><!--End of modal-->
</div><!--End of of row-->
	<?php

include 'footer.php';

?>
</div><!--end of container fluid-->
	
</body>

</html>