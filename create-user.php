s<!doctype html>
<html>
<head>
	<?php
	include 'includes/head.php';
	?>
<style>

	.bg {
		background-image: url("images/milky-way-2695569_960_720.jpg");
		height: 100%;
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
	}

</style>

</head>

<body class="bg">
	<div class="container-fluid">
	<?php
	include 'includes/navbar.php';
	?>
		<div class="form-container mx-auto border-0 pb-3">
			<div class="row justify-content-center">
			<form class="create-user mr-3 mt-3" action="create-user.php" method="post">
				<h2 class="text-light">Create User</h2>
				<p class="text-light">Brugernavn</p>
				<input class="border-0 p-2 rounded mb-3" type="text" autocomplete="off" name="un" placeholder="Brugernavn" required>
				<p class="text-light">Password</p>
				<input class="border-0 p-2 rounded mb-3" type="password" autocomplete="off" name="pw" placeholder="Password" required>
				<br>
				<input class="btn btn-outline-primary" type="submit" value="Opret bruger">
			</form>
			<br>
			<form class="login mt-3" action="login.php" method="post">
				<h2 class="text-light">Login</h2>
				<p class="text-light">Brugernavn</p>
				<input class="border-0 p-2 rounded mb-3" type="text" autocomplete="off" name="un" placeholder="Brugernavn" required>
				<p class="text-light">Password</p>
				<input class="border-0 p-2 rounded mb-3" type="password" autocomplete="off" name="pw" placeholder="Password" required>
				<br>
				<input class="btn btn-outline-success" type="submit" value="Log ind">
			</form>
				</div>
			</div>
	</div>


	<?php
	
	//Create user
	$un = filter_input( INPUT_POST, 'un' )or die( 'Missing or illegal un parameter' );
	$pw = filter_input( INPUT_POST, 'pw' )or die( 'Missing or illegal pw parameter' );

	$pwhash = password_hash( $pw, PASSWORD_DEFAULT );

	require_once( 'database-connect/dbcon.php' );

	$sql = 'INSERT INTO ss_users (username, pwhash) VALUES (?, ?)';
	$stmt = $link->prepare( $sql );
	$stmt->bind_param( 'ss', $un, $pwhash );
	$stmt->execute();

	if ( $stmt->affected_rows > 0 ) {
		echo 'Brugeren "' . $un . '" oprettet';
	} else {
		echo 'Kunne ikke oprette bruger med brugernavnet "' . $un . '", fordi at dette brugernavn allerede er taget.';
	}
	
	$link->close();
	?>
	
	<?php
	include 'includes/footer.php';
	?>
</body>
</html>