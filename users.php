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
		if(isset($_SESSION['role'])){
			?>

			<h2 class="text-center">Liste over brugere på denne side</h2>


			<?php
			require_once( 'database-connect/dbcon.php' );

			//https://www.w3schools.com/PHP/php_mysql_select.asp
			//Showing all users
			$sql = "SELECT username, id AS userid FROM ss_users";
			$result = $link->query( $sql );

			if ( $result->num_rows > 0 ) {
				// output data of each row
				while ( $row = $result->fetch_assoc() ) {
					?>
			<div class="text-center mb-3">Brugernavn:
			<?= $row[ "username" ] ?><div class="delete d-inline">
					<form action="delete-user.php" method="post">
						<input type="hidden" name="userid" value="<?=$userid?>">
						<div class="delete-img">
							<input type="image" src="images/delete-img.png" title="Delete" width="20" height="20" alt="Delete">
						</div>
					</form>
				</div>(Rolle) <br>
			<?php PHP_EOL;
				}
			} else {
				echo "0 results";
			}
			$link->close();
			?>
		</div>
			<?php
			include 'includes/footer.php';
			?>
		</div>
<?php
		} else {
			?><h2 class="text-center mt-3">Denne side er kun for administratorer</h2><?php
		}
		?>
	</body>
</html>