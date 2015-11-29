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
<body onload="getAllUsers();" >
	<div class="navbar-fixed ">
		
		<nav class="white">
			<ul class="myNav right hide-on-med-and-down">
				<a href="#" class="brand-logo center light-blue-text">Admin Dashboard</a>
				<form>
					<div class="input-field  light-blue">
						<input id="search" type="search" required>
						<label for="search"><i class="material-icons">search</i></label>
						<i class="material-icons">close</i>
					</div>
					
				</form>
				
			</ul>
			<ul id="slide-out" class="side-nav white">
				<div class= "myIcon center">
					<img onclick ="home.php" class="circle responsive-img" src="image/logo.jpg">
					
				</div>
				<li class="active"><a href="admin.php">Manage Users</a></li>
				<li><a href="home.php">App</a></li>
			</ul>
			<a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="mdi-navigation-menu blue-text"></i></a>
		</nav>
	</div>

	<!--end of navbar-->
	<!--start of the admin area-->
	<div class="container">
		<div class="row">
			<div class="card">
				<table id="users_table" class="highlight striped" >
					<thead>
						<tr>
							<th data-field="ausername">Username</th>
							<th data-field="aphone">phone Number</th>
							<th data-field="ayear_group">Year Group</th>
							<th data-field="user_type">user Type</th>
							<th data-field="aedit">Edit</th>
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