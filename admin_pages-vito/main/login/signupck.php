<?Php

include "config.php"; // database connection details stored here
// Collect the data from post method of form submission // 
$username=$_POST['username'];
$password=$_POST['password'];
$password2=$_POST['password2'];

$todo=$_POST['todo'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$nama=$_POST['nama'];
$division=$_POST['division'];

?>
<!doctype html>

<html>

<head>
<title>Signup Akun</title>
</head>

<body >
<?Php
if(isset($todo) and $todo=="post"){

$status = "OK";
$msg="";

// if username is less than 15 char then status is not ok
if(!isset($username) or strlen($username) <5){
$msg=$msg."Panjang Username tidak boleh kurang dari 15 karakter!<BR>";
$status= "NOTOK";}					

if(!ctype_alnum($username)){
$msg=$msg."Username hanya boleh angka dan huruf (A-Z, 0-9)<BR>";
$status= "NOTOK";}					


$count=$dbo->prepare("select username from plus_signup where username=:username");
$count->bindParam(":username",$username);
$count->execute();
$no=$count->rowCount();

if($no >0 ){
$msg=$msg."UserName sudah terdaftar !<br>";
$status= "NOTOK";
}

$count=$dbo->prepare("select email from plus_signup where email=:email");
$count->bindParam(":email",$email);
$count->execute();
$no=$count->rowCount();
if($no >0 ){
$msg=$msg."Email sudah terdaftar !<BR>";
$status= "NOTOK";
}

/*if(!isset($phone) or strlen($phone) <3){
$msg=$msg."Nomor telepon tidak boleh melebihi 3 karakter<BR>";
$status= "NOTOK";}*/



if ( strlen($password) <3 ){
$msg=$msg."Password tidak boleh kurang dari 3 karakter!<BR>";
$status= "NOTOK";}					

if ( $password <> $password2 ){
$msg=$msg."Password tidak sesuai!<BR>";
$status= "NOTOK";}					


	
if($status<>"OK"){ 
echo "<font face='Verdana' size='2' color=red>$msg</font><br><input type='button' value='Retry' onClick='history.go(-1)'>";
}else{ // if all validations are passed.
$password_original = $password;
$password=md5($password); // Encrypt the password before storing
$sql=$dbo->prepare("insert into plus_signup(username,password,email,phone,nama,division) values(:username,:password,:email,:phone,:nama,:division)");
$sql->bindParam(':username',$username,PDO::PARAM_STR, 15);
$sql->bindParam(':password',$password,PDO::PARAM_STR, 32);
$sql->bindParam(':email',$email,PDO::PARAM_STR, 75);
$sql->bindParam(':phone',$phone,PDO::PARAM_STR, 15);
$sql->bindParam(':nama',$nama,PDO::PARAM_STR, 160);
$sql->bindParam(':division',$division,PDO::PARAM_STR, 50);
if($sql->execute()){
//echo " Inside ok loop ";
$mem_id=$dbo->lastInsertId(); 
$content="Your login details from ******  \n\n";
$content .="UserName= $username \n";
$content .="Password = $password_original \n";

//echo $content;
$sub="Your login details";
//mail($email,"$sub",$content,$headers);
echo "<script> alert('Register berhasil!');window.location.href='index.php'</script> ";
//////////////// End of1 posting mail ////////
}// if sql executed 
else{print_r($sql->errorInfo()); }

}
} // end of todo if condition
?>
<center>
</body>
</html>
