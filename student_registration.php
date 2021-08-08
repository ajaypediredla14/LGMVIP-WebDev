<?php 

session_start();

$con = mysqli_connect('localhost', 'root','12345678');

mysqli_select_db($con , 'schooldata');

$sname = $_POST['Studentname'];
$fname = $_POST['Fathername'];
$Registration_No = $_POST['Registration_No'];
$class = $_POST['class'];
$Gender = $_POST['gender'];
$contact = $_POST['contact'];
$dob = $_POST['dob'];
$Mathematics = $_POST['Mathematics'];
$Physics = $_POST['Physics'];
$Chemistry = $_POST['Chemistry'];
$Biology = $_POST['Biology'];
$English = $_POST['English'];
$Social = $_POST['Social'];


$s = "SELECT * FROM `students_data` WHERE Registration_No = $Registration_No";

$result =mysqli_query($con,$s);
$num = mysqli_num_rows($result);
// if (!mysqli_query($con, $s)) {
//     echo "Error: " . mysqli_error($con);
// }

if($num > 0){
echo "<script type='text/javascript'>alert('Student Already Registered');window.location.href='Add.php';</script>";
}
else {
	$reg = "INSERT INTO students_data(Student_Name ,Father_Name ,Registration_No,Standard ,Gender ,Student_id ,Contact_No ,DOB ,Mathematics ,Physics ,Chemistry ,Biology ,English ,Social) VALUES ('$sname','$fname','$Registration_No','$class','$Gender',NULL,'$contact','$dob','$Mathematics','$Physics','$Chemistry','$Biology','$English','$Social')";
	if (!mysqli_query($con, $reg)) {
    echo "Error: " . mysqli_error($con);
}
else{
	echo "<script type='text/javascript'>alert('Student Registered successfully');window.location.href='Add.php';</script>";
}
}

?>