<!doctype html>
<html>
<head>
	<?php
	include 'includes/special/head.php';
	?>
</head>

<body>
	<?php
	include 'includes/special/navbar.php';
	?>
	
	<?php
	$cid = filter_input(INPUT_POST, 'cid', FILTER_VALIDATE_INT) or die('Missing or illegal id parameter');
	
	require_once( 'database-connect/dbcon.php' );
	
	$sql = 'DELETE FROM ss_category WHERE id=?';
	$stmt = $link->prepare( $sql );
	$stmt->bind_param( 'i', $cid );
	$stmt->execute();
	
	echo 'Kategori slettet';
	?>
	
	<br>
		<a href="index.php">Tilbage til startsiden</a>
	
	<?php
	include 'includes/special/footer.php';
	?>
</body>
</html>