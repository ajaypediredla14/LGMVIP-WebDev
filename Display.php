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
    <link rel="stylesheet" type="text/css" href="display.css">
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
        <li class="nav-item">
          <a class="nav-link" href="update.php">Modify</a>
        </li>
        <li class="nav-item active">
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
      <div class="row justify-content-center">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Registration No</th>
                        <th>Class</th>
                        <th>Student Name</th>
                        <th>English</th>
                        <th>Maths</th>
                        <th>Physics</th>
                        <th>Chemistry</th>
                        <th>Biology</th>
                        <th>Social Studies</th>
                        <th>Total Marks</th>
                        <th>Percentage</th>
                        <th>Grade</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
                    $db = mysqli_connect('localhost', 'root','12345678');
                    mysqli_select_db($db , 'schooldata');
                    $records = mysqli_query($db,"select * from students_data"); 
                    $sum = 0;
                    $index=0;
                    while($data = mysqli_fetch_assoc($records))
                    {
                      $sum = $data['Social']+$data['Biology']+$data['Chemistry']+$data['Physics']+$data['Mathematics']+$data['English'];
                      $index+=1;
                      if($data['Social']>40  &&  $data['Biology']>40 && $data['Chemistry']>40 && $data['Physics']>40 && $data['Mathematics']>40 && $data['English']>40)
                      {
                          $status = ($sum>=246) ? "Pass" : "Fail";
                      }
                      else{
                          $status = "Fail";
                      }
                      if($sum>=0 && $sum<=245)
                      {
                        $grade = "C";
                      }
                      else if($sum>=246 && $sum<=305)
                      {
                        $grade = "B";
                      }
                      else if($sum>=306 && $sum<=425)
                      {
                        $grade = "B+";
                      }
                      else if($sum>=426 && $sum<=546)
                      {
                        $grade = "A";
                      }
                      else if($sum >=546)
                      {
                        $grade = "A+";
                      }
                    ?>
                      <tr class="<?PHP echo ( $status == "Pass" )? 'green': 'red'; ?>">
                        <td><?php echo $index; ?>.</td>
                        <td><?php echo $data['Registration_No']; ?></td>
                        <td><?php echo $data['Standard']; ?></td>
                        <td><?php echo $data['Student_Name']; ?></td>
                        <td class="<?PHP echo ( $data['English'] <= 40 )? 'orange': ''; ?>"><?php echo $data['English']; ?></td>
                        <td class="<?PHP echo ( $data['Mathematics'] <= 40 )? 'orange': ''; ?>"><?php echo $data['Mathematics']; ?></td>
                        <td class="<?PHP echo ( $data['Physics'] <= 40 )? 'orange': ''; ?>"><?php echo $data['Physics']; ?></td>
                        <td class="<?PHP echo ( $data['Chemistry'] <= 40 )? 'orange': ''; ?>"><?php echo $data['Chemistry']; ?></td>
                        <td class="<?PHP echo ( $data['Biology'] <= 40 )? 'orange': ''; ?>"><?php echo $data['Biology']; ?></td>
                        <td class="<?PHP echo ( $data['Social'] <= 40 )? 'orange': ''; ?>"><?php echo $data['Social']; ?></td>
                        <td><?php echo $sum;?></td>
                        <td><?php echo round(($sum/6),2);?>%</td>
                        <td><?php echo $grade; ?></td>
                        <td ><?php echo $status; ?></td>
                      </tr> 
                    <?php
                    $sum = 0;
                    }
                    ?>
                    </tbody>
                    <table class="styled-table">
                <thead>
                    <tr>
                        <th>Marks out of 100</th>
                        <th>Marks out of 600</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                        <td>91-100</td>
                        <td>546-600</td>
                        <td>A+</td>
                  </tr>
                  <tr>
                        <td>71-91</td>
                        <td>426-545</td>
                        <td>A</td>
                  </tr> 
                  <tr>
                        <td>51-70</td>
                        <td>306-425</td>
                        <td>B+</td>
                  </tr> 
                  <tr>
                        <td>41-50</td>
                        <td>246-305</td>
                        <td>B</td>
                  </tr> 
                  <tr>
                        <td>0-40</td>
                        <td>0-245</td>
                        <td>C</td>
                  </tr>  
                </table>
            <?php mysqli_close($db); // Close connection ?>
      </div>
</body>
</html>