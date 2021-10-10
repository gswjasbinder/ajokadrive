<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to Ajoka Drive Admin manager</title>
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
if($_SESSION["Name"]) {
?>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Welcome <?php echo $_SESSION["Name"]; ?> &nbsp; <a href="https://ajokadrive.com/Admin_logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
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
						<a   href="Files_admin.php"><i class="fa fa-cloud fa-3x"></i> Files </a>
					</li>
					<li>
						<a class="active-menu"  href="profile_admin.php"><i class="fa fa-user fa-3x"></i> user Profile </a>
					</li>
					<li>
						<a  href="password_admin.php"><i class="fa fa-lock fa-3x"></i> user Password </a>
                    </li>	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>User profiles</h2>   
                        <h5>View user profile</h5>
                       <?php

// Using database connection file here
include 'config.php';
$id = $_SESSION["AdminID"]; // get id through query string

$qry = mysqli_query($con,"select * from USER "); // select query

	
?>

<!--<h3>Update Data</h3>-->
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>First name</strong></th>
<th><strong>Last Name</strong></th>
<th><strong>Email</strong></th>
<th><strong>Contact Number</strong></th>
<th><strong>Date of birth</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$UserID = $_SESSION["AdminID"];
$sel_query="Select * from USER";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["FirstName"]; ?></td>
<td align="center"><?php echo $row["LastName"]; ?></td>
<td align="center"><?php echo $row["Email"]; ?></td>
<td align="center"><?php echo $row["ContactNumber"]; ?></td>
<td align="center"><?php echo $row["DateOfBirth"]; ?></td>
</tr>
<?php $count++; } ?>
 
  <!--          
  <input type="text" name="FisrtName" value="<?php echo $data["FirstName"] ?>" placeholder="Enter Full Name" Required>
  <input type="text" name="LastName" value="<?php echo $data["LastName"] ?>" placeholder="Enter Last Name" Required>
  <input type="text" name="Email" value="<?php echo $data["Email"] ?>" placeholder="Email" Required>
  <input type="text" name="ContactNumber" value="<?php echo $data["ContactNumber"] ?>" placeholder="Contact Number" Required>
  <input type="text" name="DateOfBirth" value="<?php echo $data["DateOfBirth"] ?>" placeholder="DOB" Required>
  <input type="submit" name="update" value="Update">-->
	
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
