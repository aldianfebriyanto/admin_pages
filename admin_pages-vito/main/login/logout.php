<?Php

include "include/session.php";
 // We must have db connection to change the status of plus_login
include "config.php"; // database connection details stored here

//$q=mysql_query("update plus_login set status='OFF' where id='$_SESSION[id]'");

@$count=$dbo->prepare("update plus_login set status='OFF' where username='$_SESSION[username]'");
@$count->execute();

session_unset();
session_destroy();
echo "<script> alert('Anda akan logout');window.location.href='index.php'</script> ";

?>
<!doctype>

<html>

<head>
<title>Logout</title>

</head>

<body>

</body>

</html>
