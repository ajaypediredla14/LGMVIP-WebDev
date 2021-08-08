<?php 

session_start();

$con = mysqli_connect('localhost', 'root','12345678');

mysqli_select_db($con , 'schooldata');

$email = $_POST['user'];
$pass = $_POST['password'];

$s = "select * from admintable where email = '$email' && password='$pass'";

$result =mysqli_query($con,$s);
$num = mysqli_num_rows($result);

if($num == 1){
	$_SESSION['email'] = $email;
	header('location:home.php');
}
else {
	echo "<script type='text/javascript'>alert('Invalid Username or Password !');window.location.href='index.php';</script>";
}

?>