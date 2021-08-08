<?php

$db = mysqli_connect('localhost', 'root','12345678');

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>