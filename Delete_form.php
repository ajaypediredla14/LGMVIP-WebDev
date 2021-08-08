<?php 

session_start();

$con = mysqli_connect('localhost', 'root','12345678');

mysqli_select_db($con , 'schooldata');

$id = $_GET['id'];
$del = mysqli_query($con,"DELETE FROM students_data WHERE Registration_No = '$id'"); 
if($del)
{
    mysqli_close($con);
    echo "<script type='text/javascript'>alert('Student Record Deleted successfully');window.location.href='update.php';</script>";
    exit;	
}
else
{
    echo "<script type='text/javascript'>alert('Error deleting record');window.location.href='update.php';</script>";
}
?>