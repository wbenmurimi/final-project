 <?php
  require("model/check.php");
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>My posts</title>

	<!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
	<link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link rel="stylesheet" href="font/css/font-awesome.min.css">
	<!-- <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
	
</head>
<body onload="getMyPosts();hide('editPost');">
	<div class="navbar-fixed ">
		
		<nav class="white">
			<ul class="myNav right hide-on-med-and-down">
				<a href="#" class="brand-logo center light-blue-text">Mushene</a>
				<a  id="login_hand" class=" blue-text"><h5 onclick="logout()" >LOGOUT
				</h5></a>
			</ul>
			<ul id="slide-out" class="side-nav white">
				<div class= "myIcon center">
					<img onclick ="home.html" class="circle responsive-img" src="image/logo.jpg">
					
				</div>
				<li><a href="home.php">All Events</a></li>
				<li><a href="#!">Upcoming Events</a></li>
				<li><a href="my_groups.php">My Groups</a></li>
				<li><a href="add_post.php">Add Post</a></li>
				<li class="active"><a href="my_posts.php">My Posts</a></li>
				<li><a href="invite.php">Invite</a></li>
			</ul>
			<a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="mdi-navigation-menu blue-text"></i></a>
		</nav>
	</div>

	<!--end of navbar-->
	<!--estart of post area-->
	<div class="container">
		<div id="addPostDiv">
			<div class="row">
				<div class="card">
					<div class="center" id="my_view_post_error"></div>

					<div id="post_area_div">
						<ol id="my_post_area_li">

						</ol>

						</div>
					</div>
				</div>
			</div>
			<div id="editPost">
				<div class="">
					<div class="row">
						<div class="card">
							<h4 class="center">Edit Post</h4>
						</div>
					</div>
					<div class="row">
						<div class="card">
							<div class="center col s12 m12" id="add_post_error"></div>
							<div id="addLab">
								<div class="input-field col s12 m6">
									<i class="fa fa-user prefix"></i>
									<input id="event_name" type="text" class="validate" autocomplete="off">
									<label for="event_name">Event Name</label>
								</div>
								<div class="input-field col s12 m6">
									<i class="fa fa-edit prefix"></i>
									<input id="event_description" type="text" class="validate" autocomplete="off">
									<label for="event_description">Description</label>
								</div>
								<div class="input-field col s12 m6">
									<i class="fa fa-calendar prefix"></i>
									<input type="date" class="datepicker" id="event_date" autocomplete="off">
									<label for="event_date">Date of Event</label>
								</div>
								<div class="input-field col s12 m6">
									<i class="fa fa-file-image-o prefix"></i>
									<input id="event_poster" type="text" class="validate" autocomplete="off">
									<label for="event_poster">Poster</label>
								</div>
								<div class="col s12 ">
									<button id="editPostbtn" onclick="addEditedPost(this)" type="submit" class="btn waves-effect wave-dark add_post_btn blue right"><i class="fa fa-save"></i> SAVE</button>
								</div>
							</div>
						</div>

					</div>
				</div>

			</div>
		</div>


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