<!doctype html>
<html>
<head>
	<?php
	include 'includes/head.php';
	?>
</head>

<body>

	<?php
	$un = filter_input( INPUT_POST, 'un' )or die( 'Missing or illegal un parameter' );
	$pw = filter_input( INPUT_POST, 'pw' )or die( 'Missing or illegal pw parameter' );


	require_once( 'database-connect/dbcon.php' );

	$sql = 'SELECT id, pwhash, role FROM ss_users WHERE username=?';
	$stmt = $link->prepare( $sql );
	$stmt->bind_param( 's', $un );
	$stmt->execute();
	$stmt->bind_result( $id, $pwhash, $role );

	while ( $stmt->fetch() ) {}

	if ( password_verify( $pw, $pwhash ) ) {
		//echo 'Brugernavn og password passer med brugerid: '.$id.

		//echo '<div class="text-center">Brugernavn og password er korrekt. Gå til <a href="index.php">forsiden</a></div>'
		$_SESSION[ 'uid' ] = $id;
		$_SESSION[ 'uname' ] = $un;

		//admin
		if ( $role == '1' ) {
			$_SESSION[ 'role' ] = $role;
		}
		?>
	
	<!--Redirect-->
	<meta http-equiv="refresh" content="0.1; url=front-page.php"/>
	<?php

	} else {
		echo '<div class="text-center mt-3">Ugyldigt kombination af brugernavn/password. Gå tilbage til '
		?><a href="index.php">login siden</a>
	</div>
	<?php
	}

	$link->close();
	?>



</body>
</html>