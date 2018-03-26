<?Php

include "include/session.php";

include "config.php";


?>
<!doctype html>

<html>

<head>
<title>Update profile</title>
</head>

<body>
<?Php
require "check.php";

$todo=$_POST['todo'];
$nama=$_POST['nama'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$division=$_POST['division'];
// check the login details of the user and stop execution if not logged in

if(isset($todo) and $todo=="update-profile"){

// set the flags for validation and messages
$status = "OK";
$msg="";

// if name is less than 5 char then status is not ok
if (strlen($nama) < 5) {
$msg=$msg."Your name  must be more than 5 char length<BR>";
$status= "NOTOK";}	


if($status<>"OK"){ // if validation failed
echo "<font face='Verdana' size='2' color=red>$msg</font><br><input type='button' value='Retry' onClick='history.go(-1)'>";
}else{ // if all validations are passed.
//////////////////////////////////////////////////////////
$sql=$dbo->prepare("update plus_signup set nama=:nama,email=:email,phone=:phone,division=:division where username='$_SESSION[username]'");
$sql->bindParam(':nama',$nama,PDO::PARAM_STR, 25);
$sql->bindParam(':email',$email,PDO::PARAM_STR, 15);
$sql->bindParam(':phone',$phone,PDO::PARAM_STR, 25);
$sql->bindParam(':division',$division,PDO::PARAM_STR, 50);
if($sql->execute()){
echo " <script> alert('You have successfully updated your profile'); window.location.href='../../index.php'</script>";
}// End of if profile is ok 
else{
print_r($sql->errorInfo()); // if any error is there it will be posted
$msg="<font face='Verdana' size='2' color='red'>There is some problem in updating your profile<br></font>";
}// end of if else if database updation failed
}// end of if else for satus<> ok
echo $msg;
}// end of todo to check form inputs

?>
</body>
</html>