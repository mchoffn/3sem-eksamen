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
		//Create category on its own page to fix page refresh sending form.
	
		//Create category
		$ct = filter_input( INPUT_POST, 'category_title' )or die( 'Missing or illegal category title parameter' );
		$cd = filter_input( INPUT_POST, 'category_description' )or die( 'Missing or illegal category description parameter' );
		$ctn = filter_input( INPUT_POST, 'category_thumbnail' )or die( 'Missing or illegal category thumbnail parameter' );

		require_once( 'database-connect/dbcon.php' );

		$sql = 'INSERT INTO ss_category (title, description, thumbnail) VALUES (?, ?, ?)';
		$stmt = $link->prepare( $sql );
		$stmt->bind_param( 'sss', $ct, $cd, $ctn );
		$stmt->execute();

		if ( $stmt->affected_rows > 0 ) {
			?>
			<div class="text-center mt-3 mb-3">Kategori "<?php echo $ct ?>" oprettet.<br> Gå tilbage til <a href="index.php">startsiden</a></div><?php PHP_EOL;
		} else {
			?> <div class="text-center mt-3 mb-3">Fejl upstået under tilføjelse af ny kategori. En titel skal være unik og titlen "<?php echo $ct ?>" er allerede taget. Prøv en anden titel.<br> Gå tilbage til <a href="index.php">startsiden</a></div><?php PHP_EOL;
		}
	
		$link->close();
		?>
	<?php
		include 'includes/special/footer.php';
		?>
</body>
</html>