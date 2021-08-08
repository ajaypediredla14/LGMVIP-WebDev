<?php 

session_start();
if(!isset($_SESSION['email'])){
	header('location:index.php');
}
?>
<html>
<head>
<title> Dashboard</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	  <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
		<meta content="utf-8" http-equiv="encoding">

	  <meta http-equiv="X-UA-compatible" content="ie=edge">
	  <link rel="icon" type="icon" src="logo.PNG">
	  <link rel="stylesheet" href="./bootstrap-4.5.0-dist/css/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="home.css">
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
        <li class="nav-item active ml-5">
          <a class="nav-link ml-5" href="Home.php">Home</a>
        </li>
        <li class="nav-item">
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
    <h1 class="heading blink"><span>Academic Year 2021-2022</span><h1>
  </div>

</body>
</html>