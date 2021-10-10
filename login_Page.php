<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
        require('config.php');
    $result = mysqli_query($con,"SELECT * FROM USER WHERE Password='" . md5($_POST["Password"]) . "' and Email = '". $_POST["Email"]."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
        $_SESSION["UserID"] = $row['UserID'];
        $_SESSION["FirstName"] = $row['FirstName'];
        } else {
         $message = "Invalid Username or Password!";
        }
    }
    if(isset($_SESSION["UserID"])) {
    header("Location:Dashbored/index.php");
    }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link rel="stylesheet" href="http://ajokadrive.com/login/project.css">
	
<title>login page</title>
<script>
function validateForm() {
  let x = document.forms["register1"]["Name"].value;
  let a = document.forms["register1"]["Email"].value;
  let b = document.forms["register1"]["Password"].value;
  let c = document.forms["register1"]["Confirm_password"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
  if (a == "") {
    alert("Email must be filled out");
    return false;
  }
  if (b == "") {
    alert("Password must be filled out");
    return false;
  }
  if (c == "") {
    alert("Confirm Password must be filled out");
    return false;
  }
}
</script>
</head>
<body>
	<div class="container" id="container">
		<div class="form-container sign-up-container">
		 <?php
    require('config.php');
    // When form submitted, insert values into the database.

$data = $_POST;


    if (isset($_REQUEST['FirstName'])) {
        // removes backslashes
        $FirstName = stripslashes($_REQUEST['FirstName']);
        //escapes special characters in a string
        $FirstName = mysqli_real_escape_string($con, $FirstName);
        $Email    = stripslashes($_REQUEST['Email']);
        $Email    = mysqli_real_escape_string($con, $Email);
        $Password = stripslashes($_REQUEST['Password']);
        $Password = mysqli_real_escape_string($con, $Password);
      
        $query    = "INSERT into `USER` (FirstName, Password, Email)
                     VALUES ('$FirstName', '" . md5($Password) . "', '$Email')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            header("location: Registered_alert.html");
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>   
		<form action="" method="post" >
		  <h1>Create Account</h1>
			<input type="text" placeholder="Name" name="FirstName"required minlength="2"/>
			<input type="email" placeholder="Email" name="Email"required minlength="4"/>
			<input type="password" placeholder="Password" name="Password"required minlength="4"/>
			<input type="password" placeholder="Confirm Password" name="Confirm_Password"required minlength="4"/>
			<button>Sign Up</button>
		  </form>
		  <?php
    }
?>

	  </div>
		<div class="form-container sign-in-container">
			<form action="" method="post">
		  		<img src="assets/images/Ajokabloglog1.png" width="280" height="80" alt="logo">
			  	<h2>Sign in</h2>
					<span>using your account</span>
					<input type="email" placeholder="Email" name="Email" required minlength="2"/>
					<input type="password" placeholder="Password" password="Password" name="Password" required minlength="2"/>
					<a href="#">Forgot your password?</a>
					<button>Sign In</button>
			  </form>
			  </div>

		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome Back!</h1>
					<p>If you already have an account, SignIn using your account</p>
					<button class="forget" id="signIn">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Hello, Friend!</h1>
					<p>Create an account and start your amazing journey with us</p>
					<button class="forget" id="signUp">Sign Up</button>
				</div>

			</div>
		</div>
	</div>
<script  type="text/javascript" src="http://ajokadrive.com/login/JS.js"></script>
</body>
</html>