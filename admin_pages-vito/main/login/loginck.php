<?Php
//***************************************
//***************************************
include "include/session.php";
include "config.php"; // database connection details
//////////////////////////////

$username=$_POST['username'];
$password=$_POST['password'];
?>
<!doctype html>

<html>

<head>
<title>Login </title>
</head>

<body>
<?Php
//$password=md5($password); // Encrypt the password before comparing
//// Checking userid and password //////
$msg='';
$status='OK';
if(!isset($username) or strlen($username) < 5){
$msg=$msg."User id should be = 5 or more than 5 char length<BR>";
$status= "NOTOK";}					
if ( strlen($password) < 3 ){
$msg=$msg."Password must be more than 3 char legth<BR>";
$status= "NOTOK";}					

if($status<>"OK"){ 
echo "<font face='Verdana' size='2' color=red>$msg</font><br><input type='button' value='Retry' onClick='history.go(-1)'>";
exit;
}

//////////////////////

$count=$dbo->prepare("select password,mem_id,username from plus_signup where username=:username");
$count->bindParam(":username",$username,PDO::PARAM_STR);
if($count->execute()){
$no=$count->rowCount();
if($no <> 1 ) {
$msg=" Username does not exist. ";
}else { 
$row = $count->fetch(PDO::FETCH_OBJ);
if($row->password==md5($password)){
echo " Inside ";
// Start session n redirect to last page
$_SESSION['id']=session_id();
$_SESSION['username']=$row->username;
$_SESSION['mem_id']=$row->mem_id;
//echo " Inside session  ". $_SESSION['username'];
$msg=" welcome $_SESSION[username] logging in, please wait ... ";

echo $msg;
echo "<script language='JavaScript' type='text/JavaScript'>
<!--
window.location='../../index.php';
//-->
</script>
";

} 
else
{
$msg = " Login failed, please try again ... <br><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);'>";
} // end of if else for matching password
} // end of if else for matching number of records <>1 
}else{
$msg = " Login failed, please try again ... <br><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);'>";
} // 
echo $msg;
?>
<center>

</body>

</html>