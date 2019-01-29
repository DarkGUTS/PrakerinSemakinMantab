<?php

session_start();
if (isset($_SESSION["login"])) {
	header("Location: ../../../");
	exit;
}

require("../../../model/account/function.php");
if (isset($_POST["submit"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];
	$result = mysqli_query($conn, "SELECT * FROM account WHERE username = '$username' ");
	if ( mysqli_num_rows($result) === 1 ) {
		$row = mysqli_fetch_assoc($result);
		$level    = $row["level"];
		if ( $password === $row["password"] ) {
			$_SESSION["login"] = true;
			$_SESSION["user"]  = $username;
			$_SESSION["pass"]  = $password;
			$_SESSION["level"] = $level;
			header("Location: ../../../");
			exit;
		}
	}
	$error = true;
}



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
			<div>
				<a href="view/account/login/" class="btn btn-outline-primary disabled">Login</a>
				<a href="../register/" class="btn btn-outline-primary">Register</a>
			</div>
		</div>
	</nav>
	<!-- Navigation Bar -->
    <!-- Title -->
    <div class="container">
        <br>
        <h1 class="text-center font-weight-normal">Login</h1>
        <br>
    </div>
    <!-- Title -->
	<!-- Alert -->
	<div class="container">
		<?php if( isset($error) ) : ?>
		<div role="alert" class="alert alert-danger alert-dismissible fade show">
			Please Check Your <strong>Username</strong> and <strong>Password</strong>.
			<button class="close" type="button" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php endif; ?>
	</div>
	<!-- Alert -->
    <!-- Form -->
    <div class="container">
        <form method="post" autocomplete="off">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-outline-primary btn-block" name="submit">Submit</button>
        </form>
    </div>
    <!-- Form -->
</body>
</html>