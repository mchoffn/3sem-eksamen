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
		if(isset($_SESSION['role'])){
			?>
	
	<?php
	$userid = filter_input(INPUT_POST, 'userid', FILTER_VALIDATE_INT) or die('Missing or illegal id parameter');
	
	require_once( 'database-connect/dbcon.php' );
	
	$sql = 'DELETE FROM ss_users WHERE id=?';
	$stmt = $link->prepare( $sql );
	$stmt->bind_param( 'i', $userid );
	$stmt->execute();
	
	$link->close();
	
	?><div class="text-center mt-3">Bruger med id "<?= $userid ?>" slettet</div><?php
	
	?>
	
	<br>
		<div class="text-center mb-3"><a href="admin-panel.php">Tilbage til admin panel</a></div>
	
	<?php
		} else {
			include 'includes/admin-only-msg.php';
		}
		?>
	
	<?php
	include 'includes/footer.php';
	?>
</body>
</html>