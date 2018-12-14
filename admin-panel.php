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
			
			
			<div class="form-container mx-auto border-0 pb-3">
			<div class="row justify-content-center">
			<form class="create-user mr-3 mt-3" action="create-user.php" method="post">
				<h2 class="">Opret bruger</h2>
				<p class="">Brugernavn</p>
				<input class="border-0 p-2 rounded mb-3" type="text" autocomplete="off" name="un" placeholder="Brugernavn" required>
				<p class="">Password</p>
				<input class="border-0 p-2 rounded mb-3" type="password" autocomplete="off" name="pw" placeholder="Password" required>
				<br>
				<input class="btn btn-outline-primary" type="submit" value="Opret bruger">
			</form>
				</div>
			</div>

			<h2 class="text-center">Liste over brugere</h2>


			<?php
			require_once( 'database-connect/dbcon.php' );

			//https://www.w3schools.com/PHP/php_mysql_select.asp
			//Showing all users
			$sql = "SELECT username, id AS userid FROM ss_users";
			$result = $link->prepare( $sql );
			$result->execute();
			$result->bind_result( $username, $userid );

				// output data of each row
				while ( $result->fetch() ) {
					?>
			<div class="text-center mb-3 col-xl-2 mx-auto">Brugernavn:
			<?= $username ?>
				<div class="d-inline float-right">
					<form action="delete-user.php" method="post">
						<input type="hidden" name="userid" value="<?= $userid ?>">
						<div class="delete-img">
							<button class="btn btn-info mr-3">Slet bruger</button>
						</div>
					</form>
				</div>
				
				<div class="d-inline float-right">
					<form action="make-admin.php" method="post">
						<input type="hidden" name="userid" value="<?= $userid ?>">
						<div class="delete-img">
							<button class="btn btn-info mr-3">Admin panel</button>
						</div>
					</form>
				</div>
				
				<div class="d-inline float-right">
					<form action="remove-admin.php" method="post">
						<input type="hidden" name="userid" value="<?= $userid ?>">
						<div class="delete-img">
							<button class="btn btn-info mr-3">Admin panel</button>
						</div>
					</form>
				</div>
				
				</div>
			<?php PHP_EOL;
				}

			$link->close();
			?>
				
				
		
			
		
<?php
		} else {
			?><h2 class="text-center mt-3">Denne side er kun for administratorer</h2><?php
		}
		?>
			<?php
			include 'includes/footer.php';
			?>
			</div>
	</body>
</html>