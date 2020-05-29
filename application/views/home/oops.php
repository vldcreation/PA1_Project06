<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Error -Page Not Found</title>
	<meta name="description" content="Travel Error Page is 404 Error Page. Travel Error Page Build on simple and easily to customize structure. Travel Error Page concept is on sweet animation car which unable to find their destination and that’s why it travel continuously. Same like unable to find page and reached at error page.">
	<meta name="keywords" content="travel error page, error page, 404, 404 page, 404 error, nc, ncodeart, art, animation">
	<meta name="author" content="NCodeArt">

	<!-- FONTS -->
	<link href='<?php echo base_url('assets/oopss/css/1.css') ?>' rel='stylesheet' type='text/css'>
	<link href='<?php echo base_url('assets/oopss/css/2.css') ?>' rel='stylesheet' type='text/css'>
	<!-- EXTERNAL STYLESHEETS -->
	<link href="<?php echo base_url('assets/oopss/css/font-awesome.min.css') ?>" rel="stylesheet">
	<!-- ANIMATION -->
	<link href="<?php echo base_url('assets/oopss/css/animation.css') ?>" rel="stylesheet" type="text/css" />
	<!-- MAIN STYLESHEETS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/oopss/css/main.css') ?>">

</head>
<body>
<!-- Enjoy brads -->
<audio autoplay="autoplay" loop="infinte" controls="controls" height="50px" width="100px">
  <source src="<?php echo base_url('assets/oopss/mp3/vldwarung.mp3'); ?>" type="audio/mpeg" />
</audio>
    <!-- ANIMATION -->
	<div class="fix-wrp">
		<div class="animate-wrp">
			<div class="sky">
				<div class="car-wheels"></div>
				<div class="car">
					<div class="msg"><b><span>Oops!</span>May be I am on wrong way.</b></div>
				</div>
				<div class="car-wheels c1"></div>
				<div class="car1 c1"></div>
				<div class="cloud"></div>
				<div class="cloud2"></div>
				<div class="cloud1"></div>
				<div class="grass1"></div>
				<div class="grass"></div>
				<div class="grass2"></div>
				<div class="mountain"></div>
				<div class="mountain1"></div>
				<div class="tree"></div>
				<div class="tree-front"></div>
				<div class="road"></div>
				<div class="road-front"></div>
			</div>	
		</div>
	</div>
	<!--/animate-wrp -->

	<!-- MAIN WRAPPER -->
	<div class="main-wrapper">
		<!-- CONTAINER -->
		<div class="container">
			
			<!-- ERROR TITLE -->
			<div class="outer-wrapper">404<span>Page Not Found</span></div>
			<!--/outer-wrapper -->

			<!-- SORRY -->
			<div class="message">
				<p>Unfortunately the page you were looking for could not be found.</p><br>
				<p>Take a look around the rest of our site.</p><br>
                <p>Enjoy the music for some time :D</p>
			</div>
			
			<!-- NAVIGATION LINKS -->
			<div class="nav-wrapper">
				<a href="<?php echo base_url(''); ?>">Home</a>
				<a href="<?php echo base_url('kontak'); ?>">Contact us</a>
				<a href="<?php echo base_url('registrasi/member'); ?>">Register</a>
                <a href="https://github.com/vldcreation">Github</a>
			</div>
			<!--/nav-wrapper -->
			
			<!-- SOCIAL LINKS -->
			<div class="social-links">
				<a href="javascript:void(0)"><i class="fa fa-facebook"></i></a>
				<a href="javascript:void(0)"><i class="fa fa-twitter"></i></a>
				<a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a>
				<a href="javascript:void(0)"><i class="fa fa-linkedin"></i></a>
				<a href="javascript:void(0)"><i class="fa fa-youtube-play"></i></a>
				<a href="javascript:void(0)"><i class="fa fa-vimeo-square"></i></a>
				<a href="javascript:void(0)"><i class="fa fa-dribbble"></i></a>
				<a href="https://github.com/vldcreation"><i class="fa fa-github"></i></a>
				<a href="javascript:void(0)"><i class="fa fa-rss"></i></a>						
			</div>
			<!--/social-links -->
		</div>
		<!--/container -->
	</div>
	<!--/main-wrapper -->
	
	<!-- COMMON SCRIPT -->
	<script src="<?php echo base_url('assets/oopss/js/jquery-1.11.1.min.js') ?>"></script>
	<script>
		function mainWindow(){
			$(".main-wrapper").css({
				width: $('html').width(),
				height: $('html').height() > $(window).height() ? $('html').height() : $(window).height()  
			});
		}
		$(document).ready(function() {mainWindow();});
		$(window).resize(function(event) {mainWindow();});

		function animateWindow(){
			$(".animate-wrp").css({
				width: $(window).width(),
				height: $('.main-wrapper').height()
			});
		}
		$(document).ready(function() {animateWindow();});
		$(window).resize(function(event) {animateWindow();});
	</script>
</body>
</html>