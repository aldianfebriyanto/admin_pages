<?Php

include "include/session.php";

include "config.php";
?>
<!doctype html>

<html>

<head>
<title>Change Password</title>
</head>

<body>
<?Php
// check the login details of the user and stop execution if not logged in
require "check.php";
///////Collect the form data /////
$todo=$_POST['todo'];
$password=$_POST['password'];
$password2=$_POST['password2'];
$old_password=$_POST['old_password'];
/////////////////////////

if(isset($todo) and $todo=="change-password"){
$status = "OK";
$msg="";

			
$count=$dbo->prepare("select password from plus_signup where username=:username");
$count->bindParam(":username",$_SESSION['username'],PDO::PARAM_STR, 15);
$count->execute();
$row = $count->fetch(PDO::FETCH_OBJ);


if($row->password<>md5($old_password)){
$msg=$msg."Password lama anda tidak sesuai.<BR>";
$status= "NOTOK";
}					

if ( strlen($password) < 3 or strlen($password) > 8 ){
$msg=$msg."Password tidak boleh kurang dari 3 karakter dan lebih dari 8 karakter<BR>";
$status= "NOTOK";}					

if ( $password <> $password2 ){
$msg=$msg."Password tidak sesuai<BR>";
$status= "NOTOK";}					



if($status<>"OK"){ 
echo "<font face='Verdana' size='2' color=red>$msg</font><br><center><input type='button' value='Coba lagi' onClick='history.go(-1)'></center>";
}else{ // if all validations are passed.
$password=md5($password); // Encrypt the password before storing
//if(mysql_query("update plus_signup set password='$password' where userid='$_SESSION[userid]'")){
$sql=$dbo->prepare("update plus_signup set password=:password where username='$_SESSION[username]'");
$sql->bindParam(':password',$password,PDO::PARAM_STR, 32);
if($sql->execute()){
 echo "<script> alert('Password anda berhasil diganti!');window.location.href='../../index.php'</script>";

}else{echo "<font face='Verdana' size='2' color=red><center>Sorry <br> Failed to change password Contact Site Admin</font></center>";
} // end of if else if updation of password is successful
} // end of if else if status <>OK
} // end of if else todo


?>
<center>

<a href="../../index.php"><h3>Back To HomePage</h3></a>

</body>

</html>
