<?Php

include "include/session.php";

include "config.php";

?>

<!doctype >

<html>

<head>
<title>Login</title>

<link rel="stylesheet" href="../../static/css/bootstrap.min.css">
</head>

<body>

<div class="container">

<div class="wrapper">
	<h1 class="display-1">Login</h1>

</div>

  <form action='loginck.php' method=post>
  <div class="form-group" style="width: 35%;">
    <label for="username">Username</label>
    <input type="text" class="bginput form-control" name="username" placeholder="Username" required autofocus>
  </div>

  <div class="form-group" style="width: 35%;">
    <label for="password">Password</label>
    <input type="password" class="bginput form-control" name="password" placeholder="Password" required>
  </div>

  <button type="submit" class="btn btn-success">Login</button>

 <a href="signup.php" class="btn btn-primary" role="button">Daftar Disini</a>
  
</form>

</div>
</div>
</body>

<script type="text/javascript" src="../../static/js/bootstrap.min.js"></script>


</html>
