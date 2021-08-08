<?php 

session_start();
?>
<html>
<head>
<title> Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">

    <meta http-equiv="X-UA-compatible" content="ie=edge">
    <link rel="icon" type="icon" src="logo.png">
    <link rel="stylesheet" href="./bootstrap-4.5.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="update.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
      <img src="logo.PNG" width="100" height="30" class="d-inline-block align-top" alt="" style="padding-right: 10px;"><span class="ml-4">
      welcome <?php echo $_SESSION['email']?></span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ml-5">
          <a class="nav-link ml-5" href="Home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Add.php">Add</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="update.php">Modify</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Display.php">View</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <a href="logout.php" class="btn btn-success my-2 my-sm-0">Log Out</a>
      </form>
    </div>
  </nav>
  <div class="container">
      <h1 class="heading">Academic Year 2021-2022</h1>
  </div>
      <div class="container">
        <div class="row">
            <div class="col-md-4 part_1">
              <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <h3 class="heading pl-25">Update Students Result</h3>
                <label > Enter Student Registration No:</label> 
                <br>   
                <input type="text" name="Registration_No" placeholder= "Registration No" size="15" required />
                <br>
                <div class="m-3">
                  <button type="submit" class="btn btn-success my-2 my-sm-0 pl-15 ">Search</button>
                </div>
              </form>
            </div>
      <div class="col-md-8 part_1 justify-content-center">
                  <?php
                  if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $db = mysqli_connect('localhost', 'root','12345678');
                    mysqli_select_db($db , 'schooldata');
                    $Registration_No = $_POST['Registration_No'];
                    $s = "SELECT * FROM `students_data` WHERE Registration_No = $Registration_No";
                    $result =mysqli_query($db,$s);
                    $num = mysqli_num_rows($result);
                    if($num < 1){
                    echo "<script type='text/javascript'>alert('No Record Found !')</script>";
                    }
                    while($data = mysqli_fetch_assoc($result))
                    {
                    ?>
                    <div class="row">
                      <div class="col-md part_1">
                        <h3 class="heading pl-25">Student Details</h3>
                        <form action="update_form.php" method="post">
                        <label> Studentname :</label> 
                        <br> 
                        <input type="text" name="Studentname" placeholder= "Student Name" size="15" value="<?php echo $data['Student_Name']; ?>" required disabled/>
                        <br>
                        <label > Registration No :</label> 
                        <br>   
                        <input type="text" name="Registration_No" placeholder= "Registration No" size="15" value="<?php echo $data['Registration_No']; ?>" required />
                        <br>
                        <label > Class :</label> 
                        <br>   
                        <input type="number" value="<?php echo $data['Standard']; ?>" name="class" placeholder= "Class" size="15" required />
                        <br>
                        <div class='mt-4'>
                          <button type="submit" class="btn btn-warning my-2 my-sm-0 p-15">Update</button>
                        <a type="submit" href="Delete_form.php?id=<?php echo $data['Registration_No']; ?>"  class="btn btn-danger my-2 my-sm-0 p-15">Delete</a>
                        </div>
                        
                    </div>
                    <div class="col-md part_1">
                    <h3 class="heading pl-25">Marks Achieved</h3>
                  <label> Mathematics :</label>   
                <br>
                <input type="text" name="Mathematics" placeholder= "Mathematics" size="15" required  value="<?php echo $data['Mathematics']; ?>" />
                <br>

                <label> Physics :</label>   
                <br>
                <input type="text" name="Physics" placeholder= "Physics" size="15" required value="<?php echo $data['Physics']; ?>"/>
                <br>

                <label > Chemistry :</label>  
                <br> 
                <input type="text" name="Chemistry" placeholder= "Chemistry" size="15" required value="<?php echo $data['Chemistry']; ?>"/>
                  <br>
                <label > Biology :</label>   
                <br>
                <input type="text" name="Biology" placeholder= "Biology" size="15" required value="<?php echo $data['Biology']; ?>"/>
                <br>                
                <label > English :</label>  
                <br> 
                <input type="text" name="English" placeholder= "English" size="15" required value="<?php echo $data['English']; ?>"/>
                <br>                
                <label > Social :</label>   
                <br>
                <input type="text" name="Social" placeholder= "Social Studies" size="15" required value="<?php echo $data['Social']; ?>"/>
              </div>
            </form>
            </div>
            </div>  
                <?php
                  }
                  }
                  ?>
    </div>
  </div>
</body>
</html>