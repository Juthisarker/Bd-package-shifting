<?php
session_start();
require_once 'class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
	$user_home->redirect('index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row['status']=="B"){
					session_destroy();
					header("Location: login.php?blocked");
				}

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
	
    <title>BD Packaging & Shifting</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>


<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="relative bgded" style="background-image:url('dark.jpg');"> 
  <!-- ################################################################################################ -->
  <div class="wrapper row0">
    <div id="topbar" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <div class="fl_left">
        <ul class="nospace inline pushright">
          <li><i class="fa fa-phone"></i> +88014567890</li>
          <li><i class="fa fa-envelope-o"></i> bdpackingshifting@gmail.com</li>
        </ul>
      </div>
      <div class="fl_right">
        <ul class="faico clear">
          <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a class="faicon-pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
          <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a class="faicon-dribble" href="#"><i class="fa fa-dribbble"></i></a></li>
          <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
          <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
          <li><a class="faicon-rss" href="#"><i class="fa fa-rss"></i></a></li>
        </ul>
      </div>
      <!-- ################################################################################################ -->
    </div>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <div id="logo" class="fl_left">
        <h1><a href="index2.php">BD Packaging & Shifting</a></h1>
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li><a href="index2.php">Home</a></li>
        
        <li><a href="https://bdpackageshifting37.000webhostapp.com/shop1/index2.php">Order Here</a></li>
       	<li><a href="#">Hi,<span style="color:#E91E63;"><?php echo $row['userName']; ?></span></a></li>
				
				<li class="active"><a href="profile1.php">My Account</a></li>
				<li><a href="logout.php">Logout</a></li>
			
        </ul>
      </nav>
      <!-- ################################################################################################ -->
    </header>
  </div>

<body>
     
           
          
   
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 

 <li >
                        <a href="profile1.php" ><i class="fa fa-desktop "></i>My Profile</a>
                    </li>
                   

                    <li>
                        <a href="edit1.php"><i class="fa fa-table "></i>Edit Profile</a>
                    </li>

                   
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
					<center>
                     <h2>My Profile</h2> 	
</center>					 
                    </div>
					<div class="row">
   
    
	</div>
    <center>
	<div class="col-lg-12  hidden-sm hidden-xs">
					 
            <div class="panel panel-default" style="width: 60%;">
                <div class="panel-body">
                    <div>
                        <div align="center">
                            <img class="thumbnail img-responsive" src="user.jpg" width="0px" height="0px">
                        </div>
                        <div>
						<center>
                            <?php
							
				$link= new mysqli("localhost","id794005_bdpackage123","bangladesh","id794005_bdpackage123");
				
				//$myemail=$_POST['userEmail'];
				
				if ($link->connect_errno) {
 
 
				  die ("Connect failed:".$link->connect_error);
				 
				}
			  // $sql="SELECT name,userName,contact,userEmail,useradd FROM tbl_users where userID=:uid";
			   $sql = "SELECT name,userName,contact,userEmail,useradd FROM tbl_users WHERE userEmail = '".$row['userEmail']."'";
			   
 
	             $records =  $link->query($sql);
				 
				 	while($emp = mysqli_fetch_assoc($records))
                    {   
                         echo" <h4><b>Name : </b>".$emp['name']."</h4>
                            <h4><b>Username : </b>".$emp['userName']."</h4>
							
                            <hr>
                            <h4><b>email : </b>".$emp['userEmail']."</h4>
							<h4><b>Contact : </b>".$emp['contact']."</h4>
                            <hr>
                            <h4><b>Address : </b>".$emp['useradd']."</h4>";
 
				
				
				
					
                                
	   }
 
   
 ?>
 </center>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </center>
  
					 
		
                </div>              
                 <!-- /. ROW  -->
                  <hr />
              
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
		

		
    <div class="footer">
      
    
             <div class="row">
                <div class="col-lg-12" >
                    &copy;  Copyright &copy; 2017 - All Rights Reserved - <a href="https://bdpackageshifting37.000webhostapp.com/bdpacking/index.php" style="color:#fff;"  target="_blank">bdpackageshifting37.com</a>
                </div>
        </div>
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>