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
    <link rel="stylesheet" type="text/css" href="add.css">
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
        <li class="nav-item active">
          <a class="nav-link" href="Add.php">Add</a>
        </li>
        <li class="nav-item">
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
            <div class="col-md-6 part_1">
                <h3 class="heading pl-25">Student Details</h3>
                <form action="student_registration.php" method="post">
                <label> Student Name :</label> 
                <br> 
                <input type="text" name="Studentname" placeholder= "Student Name" size="15" required />
                <br>
                <label > Father Name :</label> 
                <br>   
                <input type="text" name="Fathername" placeholder= "Father Name" size="15" required />
                <br>
                <label > Registration No :</label> 
                <br>   
                <input type="text" name="Registration_No" placeholder= "Registration No" size="15" required />
                <br>
                <label>   
                Standard  :
                </label>     
                <select name="class">  
                <option value="" disabled selected>Class</option>  
                <option value="6">6th</option>  
                <option value="7">7th</option>  
                <option value="8">8th</option>  
                <option value="9">9th</option>  
                <option value="10">10th</option>  
                </select>
                <label class="pl-15">   
                Gender  :
                </label>
                <select name="gender">  
                <option value=""  disabled selected>Gender</option>  
                <option value="Male">Male</option>  
                <option value="Female">Female</option>
                <option value="Others">Other</option>
                </select>
                <br>
                <label>   
                Phone :  
                </label> 
                <br>  
                <input type="text" name="contact" placeholder= "Contact No" size="15" required />
                <br>
                <label for="birthday">Date Of Birth :</label>
                <br> 
                <input type="date" id="birthday" name="dob">   
            </div>
            <div class="col-md-6 part_1">
                  <h3 class="heading pl-25">Marks Achieved</h3>
                <label> Mathematics :</label>   
                <br>
                <input type="text" name="Mathematics" placeholder= "Marks in Mathematics" size="15" required />
                <br>
                <label> Physics :</label>   
                <br>
                <input type="text" name="Physics" placeholder= "Marks in Physics" size="15" required />
                <br>
                <label > Chemistry :</label>  
                <br> 
                <input type="text" name="Chemistry" placeholder= "Marks in Chemistry" size="15" required />
                  <br>
                <label > Biology :</label>   
                <br>
                <input type="text" name="Biology" placeholder= "Marks in Biology" size="15" required />
                <br>                
                <label > English :</label>  
                <br> 
                <input type="text" name="English" placeholder= "Marks in English" size="15" required />
                <br>                
                <label > Social :</label>   
                <br>
                <input type="text" name="Social" placeholder= "Marks in Social Studies" size="15" required />
            </div>
              <button type="submit" class="btn btn-success my-2  my-sm-0 m-5 p-2">Submit</button>
          </form>
        </div>
      </div>
</body>
</html>