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


 <?php
$dbcon=mysqli_connect("localhost","id794005_bdpackage123","bangladesh");  
mysqli_select_db($dbcon,"id794005_bdpackage123"); 
if(isset($_POST['edit']))  
{  
//echo "hello";
$name=$_POST['name'];
$email=$_POST['email'];
  $contact=$_POST['contact'];
  $address=$_POST['address'];
  
 
 
 
 //echo $name;
 //echo $contact;


 
	 $update_user="UPDATE tbl_users SET name='".$name."', contact='".$contact."', useradd='".$address."' where userEmail = '".$row['userEmail']."'";
	 
	 
	 
		if(mysqli_query($dbcon,$update_user))  
		{   
//echo "done";
			echo "<script>window.open('edit1.php','_self')</script>";
		} 
 	
	 
 
 
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

<style>
.form-style-6{
    font: 95% Arial, Helvetica, sans-serif;
    max-width: 400px;
    margin: 10px auto;
    padding: 16px;
    background: #F7F7F7;
}
.form-style-6 h1{
    background: #43D1AF;
    padding: 20px 0;
    font-size: 140%;
    font-weight: 300;
    text-align: center;
    color: #fff;
    margin: -16px -16px 16px -16px;
}
.form-style-6 input[type="text"],
.form-style-6 input[type="date"],
.form-style-6 input[type="datetime"],
.form-style-6 input[type="email"],
.form-style-6 input[type="number"],
.form-style-6 input[type="search"],
.form-style-6 input[type="time"],
.form-style-6 input[type="url"],
.form-style-6 textarea,
.form-style-6 select
{
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
    outline: none;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    background: #fff;
    margin-bottom: 4%;
    border: 1px solid #ccc;
    padding: 3%;
    color: #555;
    font: 95% Arial, Helvetica, sans-serif;
}
.form-style-6 input[type="text"]:focus,
.form-style-6 input[type="date"]:focus,
.form-style-6 input[type="datetime"]:focus,
.form-style-6 input[type="email"]:focus,
.form-style-6 input[type="number"]:focus,
.form-style-6 input[type="search"]:focus,
.form-style-6 input[type="time"]:focus,
.form-style-6 input[type="url"]:focus,
.form-style-6 textarea:focus,
.form-style-6 select:focus
{
    box-shadow: 0 0 5px #43D1AF;
    padding: 3%;
    border: 1px solid #43D1AF;
}

.form-style-6 input[type="submit"],
.form-style-6 input[type="button"]{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    padding: 3%;
    background: #43D1AF;
    border-bottom: 2px solid #30C29E;
    border-top-style: none;
    border-right-style: none;
    border-left-style: none;   
    color: #fff;
}
.form-style-6 input[type="submit"]:hover,
.form-style-6 input[type="button"]:hover{
    background: #2EBC99;
}
</style>
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
                     <h2></h2> 					 
                    </div>
					<br><br><br>
					<div class="row">
   <form  class="form-style-6" action="edit1.php" method="post">
    
<?php
				$link= new mysqli("localhost","id794005_bdpackage123","bangladesh","id794005_bdpackage123");
				if ($link->connect_errno) {
 
 
				  die ("Connect failed:".$link->connect_error);
				 
				}
			   $sql="SELECT name,userName,contact,userEmail,useradd FROM tbl_users where userEmail = '".$row['userEmail']."'";
	             $records =  $link->query($sql);
				 
				 	while($emp = mysqli_fetch_assoc($records))
                    {  
                           //echo 	$emp['name'];			
                         echo"	 
								     <h1>Account Information</h1>
                                     Name:<br>"?><html>
                                     <input type="text" name="name" value="<?php echo htmlspecialchars($emp['name'])?>"><br></html><?php
									 echo"
 Username:<br>
                                     <input disabled type=text name=username value=".$emp['userName']." ><br>
									 Email:<br>
                                     <input disabled type=email name=email value=".$emp['userEmail']." ><br>
									 Contact:<br>
                                     <input type=text name=contact value=".$emp['contact']."><br>
                                     Address:<br>
                                     <input type=text name=address value =".$emp['useradd'].">
									 ";
                                     
 
				
					
                                
	   }
 
   
 ?>
 <input type="submit" name="edit"value="Save" />
</form>
	</div>
    
  
					 
		
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