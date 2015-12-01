 <?php
  require("model/check.php");
  ?>

<!DOCTYPE html>
<html>
<head>
	<title>Invite</title>

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
				<li class="active"><a href="home.php">All Events</a></li>
				<li><a href="upcoming.php">Upcoming Events</a></li>
				<li><a href="invite.php">Invite</a></li>
			</ul>
			<a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="mdi-navigation-menu blue-text"></i></a>
		</nav>
	</div>

	<!--end of navbar-->
	<!--estart of post area-->
	<div class="container">
	<div class="row">
 			<div class="cd">
 				<h4 class="center">Invite Friends</h4>
 			</div>
 		</div>
		<div class="row">
			<div class="card">
			<div class="center col s12 m12" id="send_msg_error"></div>
				<div class="input-field col s12 m6">
					<i class="fa fa-phone prefix"></i>
					<input id="user_invite" type="text" class="validate" autocomplete="off">
					<label for="user_invite">Phone Number eg.233264789852</label>
				</div>	
				<div class="col s12 m2 send_Invite ">
						<button onclick="sendInvite()" type="submit" class=" send_message btn waves-effect wave-dark blue right"><i class="fa fa-envelope-o"></i> SEND</button>
					</div>			
			</div>

		</div>
	</div>

	<!--footer-->

	<footer class="page-footer light-blue">
		<div class="container">
			<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
				<a class="btn-floating btn-large red">
					<i class="large material-icons light-blue darken-3">more_vert</i>
				</a>
				<ul>
					<li><a class="btn-floating red"><i class="material-icons">insert_chart</i></i></a></li>
					<li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
					<li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
					<li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
				</ul>
			</div>
			
			
			<div class="container white-text">
				© 2015 ben
				<a class="white-text text-lighten-4 right" href="#!">Ashesi updates</a>
			</div>
			
		</footer>
		<!--  Scripts-->
		<script src="js/jquery.js"></script>
		<script src="js/materialize.min.js"></script>
		<script src="js/script.js"></script> 
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