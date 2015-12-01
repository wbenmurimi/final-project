 <?php
  require("model/check.php");
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>

	<!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
	<link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link rel="stylesheet" href="font/css/font-awesome.min.css">
	<!-- <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
	
</head>
<body>
	<div class="navbar-fixed ">
		
		<nav class="white">
			<ul class="myNav right hide-on-med-and-down">
				<a href="#" class="brand-logo center light-blue-text">Mushene</a>
				<a id="login_hand"class=" blue-text"><h5 onclick="logout()" >LOGOUT
				</h5></a>
			</ul>
			<ul id="slide-out" class="side-nav white">
				<div class= "myIcon center">
					<img onclick ="home.html" class="circle responsive-img" src="image/logo.jpg">
					
				</div>
				<li><a href="sign_up.html" class=" blue-text modal-trigger">SIGN UP
				</a></li>
				<li><a href="#"id="login_hand" class=" blue-text" onclick="logout()" >LOGOUT
				</a></li>
				<li><a href="home.php">All Events</a></li>
				<li><a href="upcoming.php">Upcoming Events</a></li>
				<li class="active"><a href="my_groups.php">My Groups</a></li>
				<li><a href="add_post.php">Add Post</a></li>
				<li><a href="my_posts.php">My Posts</a></li>
				<li><a href="invite.php">Invite</a></li>
			</ul>
			<a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="mdi-navigation-menu blue-text"></i></a>
		</nav>
	</div>

	<!--end of navbar-->
	<!--start of the admin area-->
	<div class="container">
		<div class="row">
			<div class="card">
				<table id="groups_table" class="highlight striped" >
					<thead>
						<tr>
							<th data-field="group_name">Group name</th>
							<th data-field="number_of_people">Number of people</th>
							<th data-field="exit_group">Exit</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
				
			</div>
		</div>
	</div>



	
	<!--  Scripts-->
	<script src="js/jquery.js"></script>
	<script src="js/materialize.min.js"></script>
	<script src="js/script.js"></script> 
	<script>

		$(document).ready(function(){
			$(".button-collapse").sideNav();
			$('.modal-trigger').leanModal();
			$('.datepicker').pickadate({
		    selectMonths: true, // Creates a dropdown to control month
		    selectYears: 15 // Creates a dropdown of 15 years to control year
		});
		});


	</script>
</body>
</html>