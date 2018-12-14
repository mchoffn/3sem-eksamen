<!doctype html>
<html>
<head>
	<?php
	include 'includes/head.php';
	?>

	<body>
		<div class="container-fluid">
			<?php
			include 'includes/navbar.php';
			?>
			<?php
			if ( isset( $_SESSION[ 'role' ] ) ) {
				?>

			<?php
			$userid = filter_input(INPUT_POST, 'userid', FILTER_VALIDATE_INT) or die('Missing or illegal id parameter');
			//$username = filter_input(INPUT_POST, 'username', FILTER_VALIDATE_INT) or die('Missing or illegal username parameter');
			
			require_once( 'database-connect/dbcon.php' );

			$sql = 'UPDATE ss_users SET role = 1 WHERE id=?';
			$stmt = $link->prepare( $sql );
			$stmt->bind_param( 'i',  $userid );
			$stmt->execute();
				
			if ( $stmt->affected_rows > 0 ) {
					?><div class="text-center mt-3 mb-3">Bruger med id "<?= $userid ?>" lavet til admin <br><a href="admin-panel.php">Gå til admin panel</a></div>
	<?php
				} else {
					?><div class="text-center mt-3 mb-3">Fejl upstået forsøg på at lave bruger med id "<?= $userid ?>" til admin fordi at denne bruger er allerede admin.<br><a href="admin-panel.php">Gå til admin panel</a></div><?php
				}
			$link->close();
			?>
			
			<?php
			} else {
				?>
			<h2 class="text-center mt-3">Denne side er kun for administratorer</h2>
			<?php
			}
			?>
			<?php
			include 'includes/footer.php';
			?>
		</div>
	</body>
</html>