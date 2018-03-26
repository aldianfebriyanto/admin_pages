<?php

include "include/session.php";
include "config.php";

?>
<!doctype html public>

<html>

<head>
<title>Change Password</title>

<link rel="stylesheet" type="text/css" href="../../static/css/bootstrap.min.css">
<meta name="GENERATOR" content="Arachnophilia 4.0">
<meta name="FORMATTER" content="Arachnophilia 4.0">
</head>

<body >
	<div class="container">
		<div class="wrapper">
			<h1 class="display-1">Ganti Password</h1>
			
			<form name=todo method=post form-action=change-passwordck.php 
			onsubmit='return validate(this)' >
			<input type=hidden value=change-password >

		<div class="form-group" style="width: 35%;">
			<label for="password">	Old Password</label>
			<input type="password" name="old-password" class="bginput form-control" >
		</div>
		<div class="form-group" style="width: 35%;">
			<label for="password"> New Password</label>
			<input type="password" name="password" class="bginput form-control" >
		</div>
		<div class="form-group" style="width: 35%;">
			<label for="password"> New Password (Re-enter)</label>
			<input type="password" name="password2" class="bginput form-control" >
		</div>
		
		<button type="reset" class="btn btn-primary">Reset</button>

 		<a href="../../index.php" type="submit" class="btn btn-success" role="button">Change Password</a>


	</div>
		</div>
</body>
<script type="text/javascript" src="../../static/js/bootstrap.min.js"></script>

	
</html>
