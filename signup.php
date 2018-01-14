<?php
session_start();
require_once 'class.user.php';

$reg_user = new USER();

if($reg_user->is_logged_in()!="")
{
	$reg_user->redirect('login.php');
}


if(isset($_POST['btn-signup']))
{
	$uname = trim($_POST['txtuname']);
	$name = trim($_POST['txtname']);
	$email = trim($_POST['txtemail']);
	$contact = trim($_POST['txtcon']);
	$add = trim($_POST['txtadd']);
	$upass = trim($_POST['txtpass']);
	$code = md5(uniqid(rand()));
	
	$stmt = $reg_user->runQuery("SELECT * FROM tbl_users WHERE userEmail=:email_id");
	$stmt->execute(array(":email_id"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() > 0)
	{
		$msg = "
		      <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry !</strong>  email already exists , Please Try another one
			  </div>
			  ";
	}
	if (strlen($upass) < 6) {
		$msg = "
		      <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry !</strong>  Password must be atleast 6 character
			  </div>
			  ";
	}
	else
	{
		if($reg_user->register($uname,$name,$email,$contact,$add,$upass,$code))
		{			
			$id = $reg_user->lasdID();		
			$key = base64_encode($id);
			$id = $key;
			
			$message = "					
						Hello $uname,
						<br /><br />
						Welcome to BD Packaging & Shifting!<br/>
						To complete your registration  please , just click following link<br/>
						<br /><br />
						<a href='https://bdpackageshifting37.000webhostapp.com/bdpacking/verify.php?id=$id&code=$code'>Click HERE to Activate :)</a>
						<br /><br />
						Thanks,";
						
			$subject = "Confirm Registration";
						
			$reg_user->send_mail($email,$message,$subject);	
			$msg = "
					<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Success!</strong>  We've sent an email to $email.
                    Please click on the confirmation link in the email to create your account. 
			  		</div>
					";
		}
		else
		{
			echo "sorry , Query could no execute...";
		}		
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
        
          <li><a href="login.php">Login</a></li>
		      <li class="active"><a href="signup.php">Sign Up</a></li>
        </ul>
      </nav>
	  
  
    <div class="container">
				<?php if(isset($msg)) echo $msg;  ?>
      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Sign Up</h2><hr />
        <input type="text" class="input-block-level" placeholder="Username" name="txtuname" required />
 <input type="text" class="input-block-level" placeholder="Name" name="txtname" required />
        <input type="email" class="input-block-level" placeholder="Email" name="txtemail" required />
  <input type="text" class="input-block-level" placeholder="Contact" name="txtcon" required />
		 <input type="text" class="input-block-level" placeholder="Address" name="txtadd" required />
        <input type="password" class="input-block-level" placeholder="Password" name="txtpass" required />
     	<hr />
        <button class="btn btn-large btn-primary" type="submit" name="btn-signup">Sign Up</button>
        <a href="login.php" style="float:right;" class="btn btn-large btn-primary">Sign In</a>
      </form>

    </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>