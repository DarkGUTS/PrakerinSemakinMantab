<?php 
session_start();

require '../../model/dashboard/function.php';

$user = $_SESSION["user"];
$accData = takeOneData("SELECT * FROM acc_info INNER JOIN account ON acc_info.account_id = account.id");

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Migrain Movie Databases</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <style type="text/css">

    </style>
</head>
<body>
	<!-- Navigation Bar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand text-primary" href="#">MMovD</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="../../">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Tags</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">Movies List</a>
				</li>
			</ul>
			<?php if( !isset($_SESSION["login"]) ) : ?>
			<div>
				<a href="view/account/login/" class="btn btn-outline-primary">Login</a>
				<a href="view/account/register/" class="btn btn-outline-primary">Register</a>
			</div>
			<?php endif; ?>
			<?php if( isset($_SESSION["login"]) ) : ?>
			<div>
				<div class="dropdown">
  					<button type="button" class="btn btn-primary dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $accData["name"] ?></button>
	  				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
	    				<a class="dropdown-item text-primary" href="#">Edit Profile</a>
	    				<a class="dropdown-item text-primary" href="#">Dashboard</a>
	    				<a class="dropdown-item text-danger" href="../../control/account/logout/">Log Out</a>
	  				</div>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</nav>
	<!-- Navigation Bar -->
</body>
</html>