<!doctype html>
<html>
<head>
	<?php
	include 'includes/special/head.php';
	?>

	<!--Redirect-->
	<meta http-equiv="refresh" content="3; url=index.php"/>

</head>
<style>
	div {
		margin: 20px;
		width: 100px;
		height: 100px;
		background: #f00;
		-webkit-animation-name: spin;
		-webkit-animation-duration: 4000ms;
		-webkit-animation-iteration-count: infinite;
		-webkit-animation-timing-function: linear;
		-moz-animation-name: spin;
		-moz-animation-duration: 4000ms;
		-moz-animation-iteration-count: infinite;
		-moz-animation-timing-function: linear;
		-ms-animation-name: spin;
		-ms-animation-duration: 4000ms;
		-ms-animation-iteration-count: infinite;
		-ms-animation-timing-function: linear;
		animation-name: spin;
		animation-duration: 4000ms;
		animation-iteration-count: infinite;
		animation-timing-function: linear;
	}
	
	@-ms-keyframes spin {
		from {
			-ms-transform: rotate(0deg);
		}
		to {
			-ms-transform: rotate(360deg);
		}
	}
	
	@-moz-keyframes spin {
		from {
			-moz-transform: rotate(0deg);
		}
		to {
			-moz-transform: rotate(360deg);
		}
	}
	
	@-webkit-keyframes spin {
		from {
			-webkit-transform: rotate(0deg);
		}
		to {
			-webkit-transform: rotate(360deg);
		}
	}
	
	@keyframes spin {
		from {
			transform: rotate(0deg);
		}
		to {
			transform: rotate(360deg);
		}
	}
</style>

<body>
	<div></div>

	<?php

		session_start();

		$un = filter_input( INPUT_POST, 'un' )or die( 'Missing or illegal un parameter' );
		$pw = filter_input( INPUT_POST, 'pw' )or die( 'Missing or illegal pw parameter' );


		require_once( 'database-connect/dbcon.php' );

		$sql = 'SELECT id, pwhash FROM ss_users WHERE username=?';
		$stmt = $link->prepare( $sql );
		$stmt->bind_param( 's', $un );
		$stmt->execute();
		$stmt->bind_result( $id, $pwhash );

		while ( $stmt->fetch() ) {}

		if ( password_verify( $pw, $pwhash ) ) {
		//echo 'Brugernavn og password passer med brugerid: '.$id.

		echo '<a href="'.$link_localhost/login.php/'">Link</a>';

			//echo <div class="text-center"><?php'Brugernavn og password er korrekt. Gå til ' <a href="index.php">forsiden</a></div>
			?>
	<?php
		$_SESSION[ 'uid' ] = $id;
		$_SESSION[ 'uname' ] = $un;
		}
	else {
		echo 'Ugyldigt kombination af brugernavn/password. Gå tilbage til '
		?><a href="create-user.php">login siden</a>
		<?php
		}


	?>

</body>
</html>