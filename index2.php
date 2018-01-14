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

?>
<!DOCTYPE html>
<!--
Template Name: Escarine-Hol
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
<title>BD Packaging & Shifting</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<script type="text/javascript">
    setTimeout(function() { window.location.href = "logout.php"; }, 400000 * 1);
</script>
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="relative bgded" style="background-image:url('aa.jpg');"> 
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
      
    
    <li><a href="https://bdpackageshifting37.000webhostapp.com/shop1/index2.php">Order Here</a></li>
       
				<li><a href="#">Hi,<span style="color:#E91E63;"><?php echo $row['userName']; ?></span></a></li>
<li><a href="profile1.php">My Account</a></li>				
<li><a href="logout.php">Logout</a></li>
			
        </ul>
      </nav>
      <!-- ################################################################################################ -->
    </header>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper">
    <div id="pageintro" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <div class="introtxt">
            <h2 class="heading"><font color="#EEEEEE">Packaging &amp; Shifting</font></h2>
        <p><font color="#EEEEEE"><b>Welcome to BD Packing and Shifting one of the most trusted professional packers and movers in Bangladesh.
		We provide local shifting, house shifting services, office shifting services, home relocation services,luggage
		shifting services,car transportation services. Our focus is on providing outstanding customer services and cost control.</b></font></p>
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
         <article><a class="btn" href="#"><i class=  <td><img src="sta.png" alt=""></img></td> </i></a>
		 
          <h4 class="heading underline center"><a href="rating.php">Ratings</a></h4>
        </article>
      </li>
      <li class="one_quarter">
         <article><a class="btn" href="#"><i class=<td><img src="cm.png" alt=""></img></td> </i></a>
		 
          <h4 class="heading underline center"><a href="complain1.php">Complain Desk</a></h4>
        </article>
      </li>
      <li class="one_quarter">
         <article><a class="btn" href="#"><i class=<td><img src="sdf.png" alt=""></img></td> </i></a>
          <h4 class="heading underline center"><a href="#">Offers</a></h4>
        </article>
      </li>
      <li class="one_quarter">
            <article><a class="btn" href="#"><i class=<td><img src="ip.png" alt=""></img></td> </i></a>
          <h4 class="heading underline center"><a href="iptrack.php">View User's IP</a></h4>
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
        <figure class="elementwrapper"><a class="imgoverlay" href="#"><img src="images/demo/faq.png" alt=""></a>
          <figcaption>FAQ</figcaption>
        </figure>
      </li>
      <li class="one_third">
        <figure class="elementwrapper"><a class="imgoverlay" href="#"><img src="images/demo/phone.png" alt=""></a>
          <figcaption>Contact Us</figcaption>
        </figure>
      </li>
      <li class="one_third">
        <figure class="elementwrapper"><a class="imgoverlay" href="lol.php"><img src="ll.jpg" alt=""></a>
          <figcaption>Service Areas</figcaption>
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
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/ac.png');">
  <section id="holtypes" class="hoc clear"> 
    <!-- ################################################################################################ -->
  
    <ul class="nospace group">
      
      <li>
        <article><a class="btn" href="#"><i class="fa fa-user"></i></a>
         
		 <!-- hitwebcounter Code START -->
		 
<a href="#" target="_blank">
 <h4>Viewed By</h4>
<img src="http://hitwebcounter.com/counter/counter.php?page=6629534&style=0003&nbdigits=5&type=page&initCount=0" title="http://www.hitwebcounter.com/htmltutorial.php" Alt="http://www.hitwebcounter.com/htmltutorial.php"   border="0" >
</a>                                        <br/>
                                        <!-- hitwebcounter.com --><a href="#" title="WebPage Visits" 
                                        target="_blank" style="font-family: Arial, Helvetica, sans-serif; 
                                        font-size: 9px; color: #6A7175; text-decoration: underline ;">
                                        </a>  
									
                             
                            
        </article>
      </li>
     
     
      <li>
        <article><a class="btn" href="#"><i class="fa fa-user"></i></a>
         
          
		  <!-- hitwebcounter Code START -->
<a href="#" target="_blank">
 <h4>Visitors</h4>
<img src="http://hitwebcounter.com/counter/counter.php?page=6629536&style=0003&nbdigits=5&type=ip&initCount=0" title="http://www.hitwebcounter.com/htmltutorial.php" Alt="http://www.hitwebcounter.com/htmltutorial.php"   border="0" >
</a>                                        <br/>
                                        <!-- hitwebcounter.com --><a href="#" title="WebPage Visits" 
                                        target="_blank" style="font-family: Arial, Helvetica, sans-serif; 
                                        font-size: 9px; color: #6A7175; text-decoration: underline ;">
                                        </a>  
        </article>
      </li>
     
    </ul>


    <!-- ################################################################################################ -->
  </section>
</div>

 <!-- ################################################################################################ -->


<div class="wrapper row3">
  <div class="hoc container clear"> 
    <!-- ################################################################################################ -->

    <!-- ################################################################################################ -->

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
                <li>+88014567890</li>
            <li>+88012567811</li>
          </ul>
        </div>
      </li>
      <li class="one_quarter">
        <div class="infobox"><i class="fa fa-envelope-o"></i>
          <ul class="nospace">
       <li><a href="#">bdpacknshifti@gmail.com</a></li>
			<li><a href="#">bdpacknshift@ymail.com</a></li>
          </ul>
        </div>
      </li>
      <li class="one_quarter">
        <div class="infobox"><i class="fa fa-clock-o"></i>
          <ul class="nospace">
             <li>Sat - Wed: 9 to 6.00pm</li>
            <li>Thu: 9 to 3.00pm</li>
          </ul>
        </div>
      </li>
      <li class="one_quarter">
        <div class="infobox"><i class="fa fa-support"></i>
          <ul class="nospace">
          <li><a href="#">Chat with us</a></li>
			 <li><a href="#">Tell us your experiences</a></li>
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
      <h6 class="heading"><i class="fa fa-newspaper-o"></i>BD Packaging & Shifting</h6>
    </div>

    <!-- ################################################################################################ -->
    <div class="clear"></div>
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

    <!-- ################################################################################################ -->
  </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved - <a href="#">bdpackageshifting37</a></p>
    <p class="fl_right">BD Packing &  <a target="_blank" href="http://www.os-templates.com/" title="BD Packing & Shifting">Shifting</a></p>
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