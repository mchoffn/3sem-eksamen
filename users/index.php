<!doctype html>
<html>
<head>
	<?php
	include '../includes/head.php';
	?>

	<body>
		<div class="container-fluid">
			<?php
			include '../includes/navbar.php';
			?>

			<h2 class="text-center">Liste over brugere på denne side</h2>


			<?php
			require_once( '../database-connect/dbcon.php' );

			//https://www.w3schools.com/PHP/php_mysql_select.asp
			//Showing all users
			$sql = "SELECT username FROM ss_users";
			$result = $link->query( $sql );

			if ( $result->num_rows > 0 ) {
				// output data of each row
				while ( $row = $result->fetch_assoc() ) {
					?>
			<div class="text-center mb-3">Brugernavn:
			<?= $row[ "username" ] ?>(Rolle) <br>
			<?php PHP_EOL;
				}
			} else {
				echo "0 results";
			}
			$link->close();
			?>
		</div>
			<?php
			include '../includes/footer.php';
			?>
		</div>

	</body>
</html>