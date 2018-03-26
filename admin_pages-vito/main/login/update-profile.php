<?Php

include "include/session.php";
include "config.php";



?>
<!doctype html public>

<html>

<head>
<title>Update Profile</title>

<link rel="stylesheet" href="../../static/css/bootstrap.min.css">
</head>

<body >

	<div class="container">
		<div class="wrapper">
			<h1 class="display-1"> Update Profile</h1>

			<form name=todo method=post form action='update-profileck.php' onsubmit='return validate(this)'><input name="todo" type=hidden value=update-profile>

		<div class="form-group" style="width: 35%;">
			<label for="email">Email</label>
			<input type="text" name="email" class="bginput form-control" value="" required autofocus>
		</div>
		<div class="form-group" style="width: 35%;">
			<label for="nama">Nama</label>
			<input type="text" name="nama" class="bginput form-control" value="" required>
		</div>
		<div class="form-group" style="width: 35%;">
			<label for="phone">Phone Number</label>
			<input type="number" name="phone" class="bginput form-control" value="" required>
		</div>

	<div class="form-group" style="width: 35%;">
		<label for="di1">Division</label>
		<select class="form-control" name="division" id="di1">
			<option>IT Support</option>
			<option>IT Infrastruktur</option>
			<option>IT Electronic Data Processing</option>
			<option>IT Solution</option>
		</select>
	</div>
			<button type="submit" class="btn btn-success">Update</button>

		</div>
		
	</div>

<?Php
// check the login details of the user and stop execution if not logged in
require "check.php";

// If member has logged in then below script will be execuated. 
// let us collect all data of the member 
$count=$dbo->prepare("select * from plus_signup where username='$_SESSION[username]'");
if(!($count->execute())){
echo "Database Problem ";
exit;
}else{
$row = $count->fetch(PDO::FETCH_OBJ);
}


// One form with a hidden field is prepared with default values taken from field. 


echo "</table>";
?>

</body>
<script type="text/javascript" src="../../static/js/bootstrap.min.js"></script>

</html>