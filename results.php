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
                <?php 
                  $db = mysqli_connect('localhost', 'root','12345678');
                  mysqli_select_db($db , 'schooldata');
                  $Registration_No = $_POST['Registration_No'];
                  $s = "SELECT * FROM `students_data` WHERE Registration_No = $Registration_No";
                  $result =mysqli_query($db,$s);
                  $num = mysqli_num_rows($result);
                  if($num < 1){
                  echo "<script type='text/javascript'>alert('Invalid Registration Number');window.location.href='index.php';</script>";
                  }
                  $sum = 0;
                  $index=0;
                  while($data = mysqli_fetch_assoc($result))
                  {
                    $sum = $data['Social']+$data['Biology']+$data['Chemistry']+$data['Physics']+$data['Mathematics']+$data['English'];
                    if($data['Social']  &&  $data['Biology'] && $data['Chemistry'] && $data['Physics'] && $data['Mathematics'] && $data['English'])
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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
      <img src="logo.PNG" width="100" height="30" class="d-inline-block align-top" alt="" style="padding-right: 10px;"><span class="ml-4">
      welcome <?php echo $data['Student_Name']; ?></span> 
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-1 pl-5">
        <li class="nav-item active h4 mt-1 pl-5" >
          <button class=" btn btn-warning ml-5 " href="Results.php" style="width: 300px;">Ramanujan Public School</button>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0 ml-auto">
        <a href="logout.php" class="btn btn-success my-2 my-sm-0">Log Out</a>
      </form>
    </div>
  </nav>
  <div class="container">
      <h1 class="heading">Academic Results 2021-2022</h1>
  </div>
  <div class="container" >
      <div class="row justify-content-center" id="result_sheet">
        <div class="col-md-5 pt-4">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Student Name :</th>
                        <th><?php echo $data['Student_Name']; ?></th>
                    </tr>
                </thead>
                <tbody>
                      <tr>
                        <th>Father Name:</th>
                        <th><?php echo $data['Father_Name']; ?></th>
                      </tr> 
                      <tr>
                        <th>Standard :</th>
                        <th><?php echo $data['Standard']; ?>th</th>
                      </tr> 
                      <tr>
                        <th>Status :</th>
                        <th class="<?PHP echo ( $status == "Pass" )? 'green': 'red'; ?>"><?php echo $status; ?></th>
                      </tr>
                      <tr>
                        <th>Grade :</th>
                        <th><?php echo $grade; ?></th>
                      </tr>
                      <tr>
                        <th>Total Marks :</th>
                        <th><?php echo $sum; ?></th>
                      </tr> 
                      <tr>
                        <th>Percentage :</th>
                        <th><?php echo round(($sum/6),2);?>%</th>
                      </tr>   
                    </tbody>
                    </table>
        </div>
        <div class="col-md-5 pt-4">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Subjects</th>
                        <th>Marks Obtained</th>
                    </tr>
                </thead>
                <tbody>
                      <th>1.</th>
                        <th>English</th>
                        <th class="<?PHP echo ( $data['English'] <= 40 )? 'red': ''; ?>"><?php echo $data['English']; ?></th>
                      <tr> 
                        <th>2.</th>
                        <th>Maths</th>
                        <th class="<?PHP echo ( $data['Mathematics'] <= 40 )? 'red': ''; ?>"><?php echo $data['Mathematics']; ?></th>
                      </tr> 
                        <th>3.</th>
                        <th>Physics</th>
                        <th class="<?PHP echo ( $data['Physics'] <= 40 )? 'red': ''; ?>"><?php echo $data['Physics']; ?></th>
                      <tr> 
                        <th>4.</th>
                        <th>Chemistry</th>
                        <th class="<?PHP echo ( $data['Chemistry'] <= 40 )? 'red': ''; ?>"><?php echo $data['Chemistry']; ?></th>
                      <tr> 
                        <th>5.</th>
                        <th>Biology</th>
                        <th class="<?PHP echo ( $data['Biology'] <= 40 )? 'red': ''; ?>"><?php echo $data['Biology']; ?></th>
                      <tr> 
                        <th>6.</th>
                        <th>Social Studies</th>
                        <th class="<?PHP echo ( $data['Social'] <= 40 )? 'red': ''; ?>"><?php echo $data['Social']; ?></th>
                      </tr> 
                    <?php
                    $sum = 0;
                    }
                    ?>
                    </tbody>
                    </table>
        </div> 
            <?php mysqli_close($db); // Close connection ?>
      </div>
      <div class="ml-5">
        <button onclick="print('result_sheet')" class="btn btn-light mb-4 ml-5">Print</button>
      </div>

  </div>

  <script type="text/javascript">
      function print(id) {
      var printContents = document.getElementById(id).innerHTML;
          w=window.open();
          w.document.write(printContents);
          w.document.write('<link rel="stylesheet" href="display.css" type="text/css" />')
          w.print();
          w.close();
      }
  </script>
</body>
</html>