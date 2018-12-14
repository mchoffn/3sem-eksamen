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
	$cid = filter_input(INPUT_POST, 'cid', FILTER_VALIDATE_INT) or die('Missing or illegal id parameter');
	
	require_once( 'database-connect/dbcon.php' );
	
	$sql = 'DELETE FROM ss_category WHERE id=?';
	$stmt = $link->prepare( $sql );
	$stmt->bind_param( 'i', $cid );
	$stmt->execute();
	
	?><div class="text-center mt-3">Kategori <?php $ct ?> slettet</div><?php
	$link->close();
	?>
	
	<br>
		<div class="text-center mb-3"><a href="front-page.php">Tilbage til startsiden</a></div>
	
	<?php
		} else {
			?><h2 class="text-center mt-3">Denne side er kun for administratorer</h2><br>
			<div class="text-center mb-3"><a href="front-page.php">Gå tilbage til startsiden</a></div><?php
		}
		?>
	
	<?php
	include 'includes/footer.php';
	?>
</body>
</html>