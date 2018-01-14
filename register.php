<?php
session_start();

if(isset($_SESSION['usr_id'])) {
	header("Location: index.php");
}

include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$phone = mysqli_real_escape_string($con, $_POST['phone']);
	$address = mysqli_real_escape_string($con, $_POST['address']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	
	//name can contain only alpha characters and space
	if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error = true;
		$name_error = "Name must contain only alphabets and space";
	}
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Please Enter Valid Email ID";
	}
	if(strlen($phone)=<12) {
		$error = true;
		$phone_error = "Enter Valid Phone Number";
	}
	if(strlen($password) < 6) {
		$error = true;
		$password_error = "Password must be minimum of 6 characters";
	}
	if($password != $cpassword) {
		$error = true;
		$cpassword_error = "Password and Confirm Password doesn't match";
	}
	if (!$error) {
		if(mysqli_query($con, "INSERT INTO users(name,email,phone,address,password) VALUES('" . $name . "', '" . $email . "','" . $phone . "','" . $address . "', '" . md5($password) . "')")) {
			$successmsg = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
		} else {
			$errormsg = "Error in registering...Please try again later!";
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>BD Packaging & Shifting</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="relative bgded" style="background-image:url('images/demo/backgrounds/domestic.jpg');"> 
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
        <h1><a href="index.php">BD Packaging & Shifting</a></h1>
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a class="drop" href="#">Pages</a>
            <ul>
              <li><a href="pages/gallery.html">Gallery</a></li>
              <li><a href="pages/full-width.html">Full Width</a></li>
              <li><a href="pages/sidebar-left.html">Sidebar Left</a></li>
              <li><a href="pages/sidebar-right.html">Sidebar Right</a></li>
              <li><a href="pages/basic-grid.html">Basic Grid</a></li>
            </ul>
          </li>
          <li><a class="drop" href="#">Dropdown</a>
            <ul>
              <li><a href="#">Level 2</a></li>
              <li><a class="drop" href="#">Level 2 + Drop</a>
                <ul>
                  <li><a href="#">Level 3</a></li>
                  <li><a href="#">Level 3</a></li>
                  <li><a href="#">Level 3</a></li>
                </ul>
              </li>
              <li><a href="#">Level 2</a></li>
            </ul>
          </li>
          <li><a href="#">About Us</a></li>
		  <li><a href="#">Feedback</a></li>
		  
		  
		  
         <li><a href="login.php">Login</a></li>
				<li class="active"><a href="register.php">Sign Up</a></li>
        </ul>
      </nav>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>
					<legend>Sign Up</legend>

					<div class="form-group">
						<label for="name"><font color="#9E9E9E">Name</font></label>
						<input type="text" name="name" placeholder="Enter Full Name" required value="<?php if($error) echo $name; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					</div>
					
					<div class="form-group">
						<label for="name"><font color="#9E9E9E">Email</font></label>
						<input type="text" name="email" placeholder="Email" required value="<?php if($error) echo $email; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
					</div>
					
					<div class="form-group">
						<label for="name"><font color="#9E9E9E">Cell Number</font></label>
						<input type="text" name="phone" placeholder="Enter your Phone Number" required value="<?php if($error) echo $phone; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($phone_error)) echo $phone_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name"><font color="#9E9E9E">Address</font></label>
						<input type="text" name="address" placeholder="Enter Full Address" required value="<?php if($error) echo $address; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($address_error)) echo $address_error; ?></span>
					</div>
					
					<div class="form-group">
						<label for="name"><font color="#9E9E9E">Password</font></label>
						<input type="password" name="password" placeholder="Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name"><font color="#9E9E9E">Confirm Password</font></label>
						<input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
					</div>

					<div class="form-group">
						<input type="submit" name="signup" value="Sign Up" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		Already Registered? <a href="login.php">Login Here</a>
		</div>
	</div>
</div>

 </header>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper">
    <div id="pageintro" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <div class="introtxt">
        <h2 class="heading">Holiday &amp; Travel</h2>
        <p>Donec ultrices justo quis congue posuere in pulvinar sapien gravida fringilla tempus vestibulum in dolor vitae massa consequat iaculis nec congue risus.</p>
      </div>
      <!-- ################################################################################################ -->
      <div class="clear"></div>
    </div>
  </div>
  <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <div id="introblocks" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <ul class="nospace group">
      <li class="one_quarter first">
        <article><a class="btn" href="#"><i class="tr tr-airplane37"></i></a>
          <h4 class="heading underline center"><a href="#">Book a Flight</a></h4>
        </article>
      </li>
      <li class="one_quarter">
        <article><a class="btn" href="#"><i class="tr tr-transport68"></i></a>
          <h4 class="heading underline center"><a href="#">Book a Cruise</a></h4>
        </article>
      </li>
      <li class="one_quarter">
        <article><a class="btn" href="#"><i class="tr tr-car167"></i></a>
          <h4 class="heading underline center"><a href="#">Book a Car</a></h4>
        </article>
      </li>
      <li class="one_quarter">
        <article><a class="btn" href="#"><i class="tr tr-building90"></i></a>
          <h4 class="heading underline center"><a href="#">Book a Hotel</a></h4>
        </article>
      </li>
    </ul>
    <!-- ################################################################################################ -->
    <div class="clear"></div>
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <ul id="home" class="nospace group elements">
      <li class="one_third first">
        <figure class="elementwrapper"><a class="imgoverlay" href="#"><img src="images/demo/480x285.png" alt=""></a>
          <figcaption>Ask a Question</figcaption>
        </figure>
      </li>
      <li class="one_third">
        <figure class="elementwrapper"><a class="imgoverlay" href="#"><img src="images/demo/480x285.png" alt=""></a>
          <figcaption>Download Brochures</figcaption>
        </figure>
      </li>
      <li class="one_third">
        <figure class="elementwrapper"><a class="imgoverlay" href="#"><img src="images/demo/480x285.png" alt=""></a>
          <figcaption>Holiday / Travel Vouchers</figcaption>
        </figure>
      </li>
    </ul>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <section id="holtypes" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <h2 class="heading underline center">Find the right type of holiday</h2>
    <ul class="nospace group">
      <li class="one_third first">
        <article><a class="btn" href="#"><i class="tr tr-bicycle14"></i></a>
          <h4 class="heading">Fitness / Sport</h4>
          <p>Consectetur maecenas sollicitudin nulla at velit tincidunt bibendum.</p>
        </article>
      </li>
      <li class="one_third">
        <article><a class="btn" href="#"><i class="tr tr-hiking1"></i></a>
          <h4 class="heading">Active / Adventure</h4>
          <p>Urna ac mi posuere vestibulum sem elit tempus ut quam vitae.</p>
        </article>
      </li>
      <li class="one_third">
        <article><a class="btn" href="#"><i class="tr tr-massage2"></i></a>
          <h4 class="heading">Spa / Wellness</h4>
          <p>Aliquam dignissim magna eget ante efficitur facilisis duis aliquam.</p>
        </article>
      </li>
      <li class="one_third first">
        <article><a class="btn" href="#"><i class="tr tr-golf22"></i></a>
          <h4 class="heading">Luxury / Golf</h4>
          <p>Dapibus id tellus ac luctus etiam est nisi efficitur ornare maecenas.</p>
        </article>
      </li>
      <li class="one_third">
        <article><a class="btn" href="#"><i class="tr tr-watercraft"></i></a>
          <h4 class="heading">Water / Sailing</h4>
          <p>Laoreet leo ut aliquam vivamus quis cursus cras maximus tincidunt.</p>
        </article>
      </li>
      <li class="one_third">
        <article><a class="btn" href="#"><i class="tr tr-person205"></i></a>
          <h4 class="heading">Family / Beach</h4>
          <p>Bibendum ex at feugiat magna duis consequat eget aliquam varius.</p>
        </article>
      </li>
    </ul>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/02.png');">
  <div class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <h2 class="heading">This weeks most popular destinations</h2>
    <p class="btmspace-50">Condimentum nunc at faucibus ex phasellus ac efficitur lorem ut. <a href="#">View All Destinations &raquo;</a></p>
    <ul class="nospace group elements">
      <li class="one_quarter first">
        <figure class="elementwrapper"><a class="imgoverlay" href="#"><img src="images/demo/320x220.png" alt=""></a>
          <figcaption class="group">
            <div class="fl_left">London</div>
            <a href="#" class="fl_right"><i class="fa fa-eye"></i></a></figcaption>
        </figure>
      </li>
      <li class="one_quarter">
        <figure class="elementwrapper"><a class="imgoverlay" href="#"><img src="images/demo/320x220.png" alt=""></a>
          <figcaption class="group">
            <div class="fl_left">Paris</div>
            <a href="#" class="fl_right"><i class="fa fa-eye"></i></a></figcaption>
        </figure>
      </li>
      <li class="one_quarter">
        <figure class="elementwrapper"><a class="imgoverlay" href="#"><img src="images/demo/320x220.png" alt=""></a>
          <figcaption class="group">
            <div class="fl_left">New York</div>
            <a href="#" class="fl_right"><i class="fa fa-eye"></i></a></figcaption>
        </figure>
      </li>
      <li class="one_quarter">
        <figure class="elementwrapper"><a class="imgoverlay" href="#"><img src="images/demo/320x220.png" alt=""></a>
          <figcaption class="group">
            <div class="fl_left">Adelaide</div>
            <a href="#" class="fl_right"><i class="fa fa-eye"></i></a></figcaption>
        </figure>
      </li>
    </ul>
    <!-- ################################################################################################ -->
    <div class="clear"></div>
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <div class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <h2 class="heading">The best last minute deals</h2>
    <p class="btmspace-50">Imperdiet lacinia placerat in sapien vivamus ac dolor felis pellentesque. <a href="#">View All Deals &raquo;</a></p>
    <ul id="lastminute" class="nospace group elements">
      <li class="one_third first">
        <article class="elementwrapper">
          <figure><a class="imgoverlay" href="#"><img src="images/demo/320x220.png" alt=""></a>
            <figcaption class="group">
              <div class="fl_left">United Kingdom</div>
              <a href="#" class="fl_right"><i class="fa fa-eye"></i></a></figcaption>
          </figure>
          <div class="elementinfo">
            <ul class="starrating">
              <li><i class="coloured fa fa-star"><em>1</em></i></li>
              <li><i class="coloured fa fa-star"><em>2</em></i></li>
              <li><i class="coloured fa fa-star"><em>3</em></i></li>
              <li><i class="fa fa-star-half-o"><em>4</em></i></li>
              <li><i class="fa fa-star-o"><em>5</em></i></li>
            </ul>
            <h4 class="heading">Luctus interdum commodo nullam sodales</h4>
            <ul class="meta">
              <li><i class="red fa fa-map-marker"></i> London City</li>
              <li><i class="fa fa-gbp"></i><strong>125</strong> <span class="font-xs">(per night)</span></li>
              <li><a href="#">View Details &raquo;</a></li>
            </ul>
          </div>
        </article>
      </li>
      <li class="one_third">
        <article class="elementwrapper">
          <figure><a class="imgoverlay" href="#"><img src="images/demo/320x220.png" alt=""></a>
            <figcaption class="group">
              <div class="fl_left">France</div>
              <a href="#" class="fl_right"><i class="fa fa-eye"></i></a></figcaption>
          </figure>
          <div class="elementinfo">
            <ul class="starrating">
              <li><i class="coloured fa fa-star"><em>1</em></i></li>
              <li><i class="coloured fa fa-star"><em>2</em></i></li>
              <li><i class="coloured fa fa-star"><em>3</em></i></li>
              <li><i class="coloured fa fa-star"><em>4</em></i></li>
              <li><i class="fa fa-star-half-o"><em>5</em></i></li>
            </ul>
            <h4 class="heading">Lobortis turpis gravida curabitur elementum</h4>
            <ul class="meta">
              <li><i class="red fa fa-map-marker"></i> Paris City</li>
              <li><i class="fa fa-gbp"></i><strong>125</strong> <span class="font-xs">(per night)</span></li>
              <li><a href="#">View Details &raquo;</a></li>
            </ul>
          </div>
        </article>
      </li>
      <li class="one_third">
        <article class="elementwrapper">
          <figure><a class="imgoverlay" href="#"><img src="images/demo/320x220.png" alt=""></a>
            <figcaption class="group">
              <div class="fl_left">United States</div>
              <a href="#" class="fl_right"><i class="fa fa-eye"></i></a></figcaption>
          </figure>
          <div class="elementinfo">
            <ul class="starrating">
              <li><i class="coloured fa fa-star"><em>1</em></i></li>
              <li><i class="coloured fa fa-star"><em>2</em></i></li>
              <li><i class="coloured fa fa-star"><em>3</em></i></li>
              <li><i class="coloured fa fa-star"><em>4</em></i></li>
              <li><i class="coloured fa fa-star"><em>5</em></i></li>
            </ul>
            <h4 class="heading">Faucibus lectus molestie est praesent vitae</h4>
            <ul class="meta">
              <li><i class="red fa fa-map-marker"></i> New York City</li>
              <li><i class="fa fa-gbp"></i><strong>125</strong> <span class="font-xs">(per night)</span></li>
              <li><a href="#">View Details &raquo;</a></li>
            </ul>
          </div>
        </article>
      </li>
    </ul>
    <!-- ################################################################################################ -->
    <div class="clear"></div>
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="contactinfo" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <ul class="nospace group">
      <li class="one_quarter first">
        <div class="infobox"><i class="fa fa-phone"></i>
          <ul class="nospace">
            <li>+00 (123) 456 7890</li>
            <li>+00 (123) 456 7890</li>
          </ul>
        </div>
      </li>
      <li class="one_quarter">
        <div class="infobox"><i class="fa fa-envelope-o"></i>
          <ul class="nospace">
            <li><a href="#">info@domain.com</a></li>
            <li><a href="#">sales@domain.com</a></li>
          </ul>
        </div>
      </li>
      <li class="one_quarter">
        <div class="infobox"><i class="fa fa-clock-o"></i>
          <ul class="nospace">
            <li>Mon - Fri: 9 to 5.00pm</li>
            <li>Sat: 9 to 1.00pm</li>
          </ul>
        </div>
      </li>
      <li class="one_quarter">
        <div class="infobox"><i class="fa fa-support"></i>
          <ul class="nospace">
            <li><a href="#">Online Support</a></li>
            <li><a href="#">Live Chat</a></li>
          </ul>
        </div>
      </li>
    </ul>
    <!-- ################################################################################################ -->
    <div class="clear"></div>
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper coloured">
  <div id="newsletter" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="one_quarter first">
      <h6 class="heading"><i class="fa fa-newspaper-o"></i> Latest News</h6>
    </div>
    <form class="three_quarter" method="post" action="#">
      <div class="clear">
        <input class="one_third first" type="text" value="" placeholder="Name" required>
        <input class="one_third" type="email" value="" placeholder="Email" required>
        <button class="one_third" type="submit" title="Sign Up">Sign Up</button>
      </div>
    </form>
    <!-- ################################################################################################ -->
    <div class="clear"></div>
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="one_quarter first">
      <h6 class="title">Vitae nunc sagittis</h6>
      <p>Duis non dolor sit amet lorem rhoncus commodo ornare tellus vel quam.</p>
      <p>Sapien porttitor auctor integer pharetra ligula sit elementum in lobortis dolor ullamcorper.</p>
    </div>
    <div class="one_quarter">
      <h6 class="title">Faucibus a lacus</h6>
      <article>
        <h2 class="nospace font-x1"><a href="#">Tincidunt phasellus</a></h2>
        <time class="font-xs" datetime="2045-04-06">Friday, 6<sup>th</sup> April 2045</time>
        <p>Nullam eu velit vestibulum egestas nisi lacinia fringilla lectus mauris enim magna placerat venenatis.</p>
      </article>
    </div>
    <div class="one_quarter">
      <h6 class="title">Molestie elit id</h6>
      <ul class="nospace linklist">
        <li><a href="#">Placerat arcu suspendisse</a></li>
        <li><a href="#">Vestibulum ultrices id dui</a></li>
        <li><a href="#">Tempus commodo maximus</a></li>
        <li><a href="#">Suspendisse potenti vivamus</a></li>
        <li><a href="#">Gravida malesuada praesent</a></li>
      </ul>
    </div>
    <div class="one_quarter">
      <h6 class="title">Ultrices odio cras</h6>
      <ul class="nospace linklist">
        <li><a href="#">aenean eget tempor orci</a></li>
        <li><a href="#">curabitur sit amet massa</a></li>
        <li><a href="#">sollicitudin elementum</a></li>
        <li><a href="#">nunc sit amet laoreet libero</a></li>
        <li><a href="#">donec erat enim consectetur</a></li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2015 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<!-- IE9 Placeholder Support -->
<script src="layout/scripts/jquery.placeholder.min.js"></script>
<!-- / IE9 Placeholder Support -->
<!-- Homepage specific - can be used in all pages -->
<div id="preloader"><div></div></div>
<script>$(window).load(function(){$("#preloader div").delay(500).fadeOut();$("#preloader").delay(800).fadeOut("slow");});</script>
<!-- / Homepage specific -->
</body>
</html>



