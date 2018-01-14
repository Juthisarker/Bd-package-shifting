<?php
session_start();
require_once 'class.user.php';
$user_login = new USER();

if($user_login->is_logged_in()!="")
{
	//$user_login->redirect('home.php');
	$user_login->redirect('index.php');
}

if(isset($_POST['btn-login']))
{
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtupass']);
	
	
	if($user_login->login($email,$upass))
	{
		//$user_login->redirect('home.php');
		$user_login->redirect('https://bdpackageshifting37.000webhostapp.com/shop1/cart2.php');
	}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login | BD Packaging & Shifting</title>
    <!-- Bootstrap -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">

	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
  <div class="relative bgded" style="background-image:url('aa.jpg');"> 
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
	 <div class="wrapper row1">
  </div>
      <header id="header" class="hoc clear"> 
	  
   <div id="logo" class="fl_left">
        <h1><a href="index.php">BD Packaging & Shifting</a></h1>
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li><a href="index.php">Home</a></li>
      
       <li><a href="https://bdpackageshifting37.000webhostapp.com/shop1/index.php">Order Here</a></li>
    
          <li class="active"><a href="login.php">Login</a></li>
		      <li><a href="signup.php">Sign Up</a></li>
        </ul>
      </nav>
	  
	  
    <div class="container">
	<div class="row">
		<?php 
		if(isset($_GET['inactive']))
		{
			?>
            <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
				<strong>Sorry!</strong> This Account is not Activated Go to your Inbox and Activate it. 
			</div>
            <?php
		}
		?>

	<?php 
		if(isset($_GET['blocked']))
		{
			?>
            <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
				<strong>Sorry!</strong> This Account is blocked by the Admin. 
			</div>
            <?php
		}
		?>

        <form class="form-signin" method="post">
        <?php
        if(isset($_GET['error']))
		{
			?>
            <div class='alert alert-success'>
				<button class='close' data-dismiss='alert'>&times;</button>
				<strong>Wrong Details!</strong> 
			</div>
            <?php
		}
		?>
        <h2 class="form-signin-heading">Login</h2><hr />
        <input type="email" class="input-block-level" placeholder="Email address" name="txtemail" required />
        <input type="password" class="input-block-level" placeholder="Password" name="txtupass" required />
     	<hr />
        <button class="btn btn-large btn-primary" type="submit" name="btn-login">Log in</button>
        <a href="signup.php" style="float:right;" class="btn btn-large btn-primary">Sign Up</a><hr />
        <a href="fpass.php">Forgotten Password ? </a>
      </form>

    </div> <!-- /container -->
	
    <script src="bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>