<!DOCTYPE html>
<html>
<head>
	<title>Students Result Management System</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	  <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
		<meta content="utf-8" http-equiv="encoding">

	  <meta http-equiv="X-UA-compatible" content="ie=edge">
	  <link rel="icon" type="icon" src="logo.png">

	  <link rel="stylesheet" href="./bootstrap-4.5.0-dist/css/bootstrap.min.css">
  	  <link rel="stylesheet" type="text/css" href="styles.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="./bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
</head>
<body crossorigin="anonymous">
  <div class="container">
    <h1 class="text-center heading">School Result Management System</h1>
    <div class="row">
      <div class= col-md-6>
  <div class="form">
        <ul class="tab-group">
          <li class="tab active"><a href="#signup">Sign Up</a></li>
          <li class="tab"><a href="#login">Log In</a></li>
        </ul>  
        <div class="tab-content">
          <div id="signup">   
            <h3>Admin Sign Up</h3> 
            <form action="registration.php" method="post">
            <div class="field-wrap">
              <label>
                Username<span class="req">*</span>
              </label>
              <input type="text" name="user" placeholder= "Enter Username" size="15" required />
            </div>
            <div class="field-wrap pb-3">
              <label>
                Password<span class="req">*</span>
              </label>
              <input type="password" name="password" placeholder= "Enter password" size="15" required />
            </div>
            <button type="submit" class="button button-block"/>Sign Up</button>
            </form>
          </div>
          
          <div id="login">   
            <h3>Admin Login</h3>
            <form action="validation.php" method="post">
              <div class="field-wrap">
              <label>
                Username<span class="req">*</span>
              </label>
              <input  type="text" name="user" placeholder= "Enter Username" size="15" required />
            </div> 
            <div class="field-wrap">
              <label>
                Password<span class="req">*</span>
              </label>
              <input type="password" name="password" placeholder= "Enter Password" size="15" required />
            </div> 
            <p class="forgot"><a href="#">Forgot Password?</a></p>
            <button type="submit" class="button button-block"/>Log In</button>
            </form>
          </div>
          </div>
        </div>
        </div>
        <div class="col-md-6">
          <div class="form">
        <div class="tab-content pt-0">
            <h3>Academic Results (2020-2021)</h3>
            <form action="results.php" method="post">
            <div class="field-wrap pb-3">
              <label>
                Registration No:<span class="req">*</span>
              </label>
              <input type="text" name="Registration_No" placeholder= "Registration No" size="15" required />
            </div>
            <button type="submit" class="button button-block"/>Get Result</button>
            </form>
          </div>
        </div>
        </div>
    </div>
  </div>

  <script>
  $('.tab a').on('click', function (e) {
    
    e.preventDefault();
    
    $(this).parent().addClass('active');
    $(this).parent().siblings().removeClass('active');
    
    target = $(this).attr('href');

    $('.tab-content > div').not(target).hide();
    
    $(target).fadeIn(600);
    
  });
  </script>
</body>
</html>