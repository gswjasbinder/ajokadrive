<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to Ajoka Drive FIle manager</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="assets/img/Ajokabloglog1.png" width="200" height="40" alt="logo"></a> 
            </div>
  <?php
if($_SESSION["FirstName"]) {
?>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Welcome <?php echo $_SESSION["FirstName"]; ?> &nbsp; <a href="https://ajokadrive.com/logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
<?php
}else echo '<div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <a href="https://ajokadrive.com/login_Page.php" class="btn btn-danger square-btn-adjust">Login</a> </div>' ;
?>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a  href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    	<li>
						<a  class="active-menu" href="Files.php"><i class="fa fa-cloud fa-3x"></i> MyFiles </a>
					</li>
					<li>
						<a  href="profile.php"><i class="fa fa-user fa-3x"></i> Profile </a>
					</li>
					<li>
						<a  href="password.php"><i class="fa fa-lock fa-3x"></i> Password </a>
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>FIles Uploader</h2>   
                        <h5>Start Uploading your files on Cloud</h5>
                       <form action="upload.php" method="post" enctype="multipart/form-data">
						Select Image File to Upload:
						  <div class="file-input">
							  <input type="file" name="file">
							  <span class="button">Choose</span>
							  <span class="label" data-js-label>No file selected</span>
							  <input type="button" name="submit" value="Upload" />
							</div>
						<!--<input type="file" name="file">
						<input type="submit" name="submit" value="Upload">-->
					   </form>
<?php
// Include the database configuration file
include 'config.php';

// Get images from the database
$query = $con->query("SELECT * FROM FILE ORDER BY UploadDate DESC");
$records = mysqli_query($con,"select * from FILE ORDER BY uploaded_on DESC"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
 $imageURL = 'uploads/'.$data["file_name"];
?>
    <img src="<?php echo $imageURL; ?>" alt="" width="200px" height="200px"/>
<?php } ?>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
