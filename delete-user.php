<!doctype html>
<html>
<head>
	<?php
	include 'includes/head.php';
	?>
</head>

<body>
	<?php
	include 'includes/navbar.php';
	?>
	
	<?php
	$userid = filter_input(INPUT_POST, 'userid', FILTER_VALIDATE_INT) or die('Missing or illegal id parameter');
	
	require_once( 'database-connect/dbcon.php' );
	
	$sql = 'DELETE FROM ss_users WHERE id=?';
	$stmt = $link->prepare( $sql );
	$stmt->bind_param( 'i', $userid );
	$stmt->execute();
	
	?><div class="text-center mt-3">Bruger <?php $un ?> slettet</div><?php
	$link->close();
	?>
	
	<br>
		<div class="text-center mb-3"><a href="users.php">Tilbage til liste over brugere</a></div>
	
	<?php
	include 'includes/footer.php';
	?>
</body>
</html>