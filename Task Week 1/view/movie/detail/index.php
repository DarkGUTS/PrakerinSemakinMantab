<?php
session_start();
require("../../../model/movie/function.php");

if (checkID($_GET["id"]) > 0) {
	$id = $_GET["id"];
}else {
	echo("
	<script>
		alert('Unknown Movie ID, Please Check Again :)');
		document.location.href='../../../';
	</script>");
}

$movieData = takeOneData("SELECT * FROM mov_lib WHERE id='$id'");
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
	<a class="navbar-brand text-primary" href="../../../">MMovD</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="../../../">Home</a>
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
				<a href="../../account/login" class="btn btn-outline-primary">Login</a>
				<a href="../../account/register/" class="btn btn-outline-primary">Register</a>
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
					<a href="../../dashboard/" class="btn btn-outline-primary">Dashboard</a>
				<?php endif ?>
				<a href="../../../control/account/logout/" class="btn btn-outline-primary">Log Out</a>
			</div>
			<?php endif; ?>
	</div>
</nav>
<!-- Navigation Bar -->
<!-- Image Cover -->
<div class="imageCover">
    <img src="../../../assets/img/<?= $movieData['cover_wide'] ?>" class="w-100 mx-auto d-block">
</div>
<!-- Image Cover -->
<!-- Movie Title -->
<div class="container">
	<h1 class="display-1 text-center"><?= $movieData["title"] ?></h1>
</div>
<!-- Movie Title -->
<!-- Synopsis -->
<div class="container">
	<hr>
	<h1 class="text-center">Synopsis</h1>
	<hr>
	<p class="text-center"><?= $movieData["synopsis"] ?></p>
</div>
<!-- Synopsis -->
<!-- Trailer -->
<div class="container">
	<hr>
	<h1 class="text-center">Trailer</h1>
	<hr>
	<iframe width="853" height="480" src="<?= $movieData['trailer'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" class="embed-responsive" allowfullscreen></iframe>
</div>
<!-- Trailer -->
</body>
</html>