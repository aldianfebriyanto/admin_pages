<?

include "config.php"; // database connection details stored here

?>
<!doctype html public >

<html>

<head>
<title>signup form</title>

<link rel="stylesheet" href="../../static/css/bootstrap.min.css">
</head>

<body>

<div class="container">
 <div class="wrapper">
 	<h1 class="display-1">Daftar</h1>


	<form name=form1 method=post action='signupck.php' onsubmit='return validate(this)'><input type=hidden name=todo value=post>

<div class="form-group" style="width: 35%;">
<label for="username">Username</label>
    <input type="text" class="bginput form-control" name="username" placeholder="Username" required autofocus>
</div>

<div class="form-group" style="width: 35%;">
	<label for="password">Password</label>
	<input type="password" name="password" placeholder="Password" class="bginput form-control" >
</div>

<div class="form-group" style="width: 35%;">
	<label for="password2">Re-enter Password</label>
	<input type="password" name="password2" placeholder="Re-enter Password" class="bginput form-control" required>
</div>

<div class="form-group" style="width: 35%;">
	<label for="email">Email</label>
	<input type="text" name="email" placeholder="Email" class="bginput form-control" required>
</div>

<div class="form-group" style="width: 35%;">
	<label for="nama">Nama</label>
	<input type="text" name="nama" placeholder="Name" class="bginput form-control" required>
</div>

<div class="form-group" style="width: 35%;">
	<label for="phone">Phone Number</label>
	<input type="number" name="phone" placeholder="Phone" class="bginput form-control" required>
</div>

<div class="form-group" style="width: 35%;">
	<label for="di1">Division</label>
		<select class="form-control" name="division" id="di1">
			<option hidden>Select Division</option>
			<option>IT Support</option>
			<option>IT Infrastruktur</option>
			<option>IT Electronic Data Processing</option>
			<option>IT Solution</option>
		</select>
</div>
<br>
<br>
<br>

 <button type="submit" class="btn btn-success">Daftar</button>
 <a href="index.php" class="btn btn-primary" role="button">Login disini</a>

</div>
</div>
<center>
</body>

</html>
