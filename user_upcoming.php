<?php
  require("model/check.php");
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Upcoming Events</title>

	<!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
	<link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link rel="stylesheet" href="font/css/font-awesome.min.css">
	<!-- <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
	
</head>
<body onload="getPosts();">
	<div class="navbar-fixed ">
		
		<nav class="white">
			<ul class="myNav right hide-on-med-and-down">
				<a href="#" class="brand-logo center light-blue-text">Mushene</a>
				<a id="login_hand" class=" blue-text"><h5 onclick="logout()" >LOGOUT
    </h5></a>
				
			</ul>
			<ul id="slide-out" class="side-nav white">
				<div class= "myIcon center">
					 <img onclick ="home.html" class="circle responsive-img" src="image/logo.jpg">
					
				</div>
				<li><a href="#"id="login_hand" class=" blue-text" onclick="logout()" >LOGOUT
				</a></li>
				<li><a href="home.php">All Events</a></li>
				<li class="active"><a href="upcoming.php">Upcoming Events</a></li>
				<li><a href="user_invite.php">Invite</a></li>
			</ul>
			<a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="mdi-navigation-menu blue-text"></i></a>
		</nav>
	</div>

	<!--end of navbar-->

	<!--estart of post area-->
	<div class="container">
		<div class="row">
			<div class="card">
				<div class="center" id="view_post_error"></div>

				<div id="post_area_div">
					<ol id="post_area_li">

					</ol>

				</div>
			
			</div>

		</div>
	</div>

	<!-- Modal Structure -->
	<div id="login" class="modal">
		<div class="modal-content">
			<h4 class="center">LOGIN</h4>
			<div class="error_area center" id="login_error_area">

			</div>
			<div class="input-field col s12">
				<i class="fa fa-user prefix"></i>
				<input id="username" type="text" class="validate" autocomplete="off">
				<label for="username">Username</label>
			</div>
			<div class="input-field col s12 mypass">
				<i class="fa fa-key prefix"></i>
				<input id="password" type="password" class="validate" autocomplete="off">
				<label for="password">Password</label>
			</div>
			<div class="loginfooter right">
				<a href="#!" class="btn modal-action modal-close waves-effect waves-red btn-flat">Close</a>
				<button onclick="Login()" type="submit" class="btn waves-effect wave-dark loginbtn blue center-align">Log In</button>

			</div>
		</div>
	</div>
	<!-- Modal Ends here -->

	
	<!--  Scripts-->
	<script src="js/jquery.js"></script>
	<script src="js/materialize.min.js"></script>
	<script src="js/index_script.js"></script> 
	<script>

		$(document).ready(function(){
			$(".contentArea").hide();
			$(".button-collapse").sideNav();
			$('.modal-trigger').leanModal();
			$('.slider').slider({full_width: true});
			$('.datepicker').pickadate({
		    selectMonths: true, // Creates a dropdown to control month
		    selectYears: 15 // Creates a dropdown of 15 years to control year
		});
		});


	</script>
</body>
</html>