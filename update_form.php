<?php 

session_start();

$con = mysqli_connect('localhost', 'root','12345678');

mysqli_select_db($con , 'schooldata');

$Registration_No = $_POST['Registration_No'];
$Mathematics = $_POST['Mathematics'];
$Physics = $_POST['Physics'];
$Chemistry = $_POST['Chemistry'];
$Biology = $_POST['Biology'];
$English = $_POST['English'];
$Social = $_POST['Social'];
$class = $_POST['class'];

$s = "SELECT * FROM `students_data` WHERE Registration_No = $Registration_No";

$result =mysqli_query($con,$s);
$num = mysqli_num_rows($result);

if($num > 1){
echo "<script type='text/javascript'>alert('Student Already Registered');window.location.href='update.php';</script>";
}
else {
	$reg = "UPDATE students_data SET Registration_No = '$Registration_No', Mathematics = '$Mathematics', Physics = '$Physics', Chemistry = '$Chemistry', Biology = '$Biology', English = '$English', Social = '$Social', Standard = '$class' WHERE Registration_No = $Registration_No";
	if (!mysqli_query($con, $reg)) {
    echo "Error: " . mysqli_error($con);
	}
    echo "<script type='text/javascript'>alert('Student Record Updated successfully');window.location.href='update.php';</script>";
}

?>