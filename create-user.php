<!doctype html>
<html>
<head>
	<?php
	include 'includes/special/head.php';
	?>
</head>

<body>
	<div class="container-fluid">

		<div class="form-container mx-auto border-0 pb-3">
			<div class="row justify-content-center">
			<form class="create-user mr-3 mt-3" action="create-user.php" method="post">
				<h2 class="text-light">Create User</h2>
				<p class="text-light">Brugernavn</p>
				<input class="border-0 p-2 rounded mb-3" type="text" autocomplete="off" name="un" placeholder="Username" required>
				<p class="text-light">Password</p>
				<input class="border-0 p-2 rounded mb-3" type="password" autocomplete="off" name="pw" placeholder="Password" required>
				<br>
				<input class="btn btn-outline-primary" type="submit" value="Opret bruger">
			</form>
			<br>
			<form class="login mt-3" action="login.php" method="post">
				<h2 class="text-light">Login</h2>
				<p class="text-light">Brugernavn</p>
				<input class="border-0 p-2 rounded mb-3" type="text" autocomplete="off" name="un" placeholder="Username" required>
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
		echo 'User ' . $un . ' created';
	} else {
		echo 'Could not create user - username ' . $un . ' already exists!';
	}

	?>




	<?php

	session_start();

	//Log in
	$un = filter_input( INPUT_POST, 'un' )or die( 'Missing or illegal un parameter' );
	$pw = filter_input( INPUT_POST, 'pw' )or die( 'Missing or illegal pw parameter' );



	$sql = 'SELECT id, pwhash FROM ss_users WHERE username=?';
	$stmt = $link->prepare( $sql );
	$stmt->bind_param( 's', $un );
	$stmt->execute();
	$stmt->bind_result( $id, $pwhash );

	while ( $stmt->fetch() ) {}

	if ( password_verify( $pw, $pwhash ) ) {
		echo 'un and pw matched user with id:' . $id;
		$_SESSION[ 'uid' ] = $id;
		$_SESSION[ 'uname' ] = $un;
	} else {
		echo 'Illegal username/password combination';
	}


	?>
</body>
</html>