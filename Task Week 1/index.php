<?php

session_start();

	require("model/movie/function.php");

// $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// echo $actual_link;

$moviesData = takeAllData("SELECT * FROM mov_lib");

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
				<li class="nav-item active">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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
				<script>
					$(function () {
						$("[data-toggle='popover']").popover()
					})
					$(".popover-dismiss").popover({
						trigger: "focus"
					})
				</script>
				<button tabindex="0" class="btn btn-primary" role="button" data-toggle="popover" data-trigger="focus" title="User Data" data-content="Username"><?= $_SESSION["user"] ?></button>
				<?php if ($_SESSION["level"] === "admin"): ?>
					<a href="view/dashboard/" class="btn btn-outline-primary">Dashboard</a>
				<?php endif ?>
				<a href="control/account/logout/" class="btn btn-outline-primary">Log Out</a>
			</div>
			<?php endif; ?>
		</div>
	</nav>
	<!-- Navigation Bar -->
	<!-- Carousel -->
	<div id="carou-slider" class="carousel slide carousel-fade" data-ride="carousel">
		<ul class="carousel-indicators">
			<li data-target="#carou-slider" data-slide-to="0" class="active"></li>
			<li data-target="#carou-slider" data-slide-to="1"></li>
			<li data-target="#carou-slider" data-slide-to="2"></li>
		</ul>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="assets/img/The Avengers Poster.jpg" class="w-100 mx-auto d-block">
				<div class="carousel-caption d-none d-md-block">
					<h1 style="text-shadow:1px 1px 10px rgba(0,0,0,0.9);">Marvel's The Avengers <span class="badge badge-pill badge-primary">HOT</span></h1>
					<p style="text-shadow:1px 1px 10px rgba(0,0,0,0.9);">Stay tune, we still updating the websites.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img src="assets/img/Age of Ultron Poster.jpg" class="w-100 mx-auto d-block">
				<div class="carousel-caption d-none d-md-block">
					<h1 style="text-shadow:1px 1px 10px rgba(0,0,0,0.9);">The Avengers : Age of Ultron <span class="badge badge-pill badge-primary">HOT</span></h1>
					<p style="text-shadow:1px 1px 10px rgba(0,0,0,0.9);">Stay tune, we still updating the websites.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img src="assets/img/Infinity War Poster.jpg" class="w-100 mx-auto d-block">
				<div class="carousel-caption d-none d-md-block">
					<h1 style="text-shadow:1px 1px 10px rgba(0,0,0,0.9);">The Avengers : Infinity War <span class="badge badge-pill badge-primary">HOT</span></h1>
					<p style="text-shadow:1px 1px 10px rgba(0,0,0,0.9);">Stay tune, we still updating the websites.</p>
				</div>
			</div>
		</div>
		<a class="carousel-control-prev" href="#carou-slider" data-slide="prev">
			<span class="carousel-control-prev-icon"></span>
		</a>
		<a href="#carou-slider" class="carousel-control-next" data-slide="next">
			<span class="carousel-control-next-icon"></span>
		</a>
	</div>
	<!-- Carousel -->
	<div class="container">
		<hr>
		<h1 class="text-center">TOP MOVIES</h1>
		<hr>
	</div>
	<div class="container">
		<div class="card-columns text-center">
			<?php foreach ($moviesData as $movieData) : ?>
			<div class="card w-75 mx-auto">
				<img src="assets/img/Mini Cover/<?= $movieData['cover_mini'] ?>" class="card-img-top">
				<div class="card-body">
					<h4 class="card-title text-center"><?= $movieData["title"] ?></h4>
					<a href="view/movie/detail/?id=<?= $movieData['id'] ?>" class="card-link">
						<button class="btn btn-outline-primary d-block mx-auto">More Info</button>
					</a>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	 </div>
</body>
</html>