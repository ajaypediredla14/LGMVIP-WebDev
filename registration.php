<?php 

session_start();

$con = mysqli_connect('localhost', 'root','12345678');

mysqli_select_db($con , 'schooldata');

$email = $_POST['user'];
$pass = $_POST['password'];

$s = "select * from admintable where email = '$email'";

$result =mysqli_query($con,$s);
$num = mysqli_num_rows($result);

if($num > 0){
	echo "<script type='text/javascript'>alert('Username Already Taken');window.location.href='index.php';</script>";
}
else {
	$reg = " insert into admintable(email , password) values ('$email','$pass')";
	mysqli_query($con , $reg);
	echo "<script type='text/javascript'>alert('registration Successfull');window.location.href='index.php';</script>";
}

?>