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
					echo "Brugernavn: " . $row[ "username" ] . "<br>";
				}
			} else {
				echo "0 results";
			}
			$link->close();
			?>

			<table class="table table-striped">
				<thead class="thead bg-success text-light">
					<tr>
						<th scope="col">#</th>
						<th scope="col">Navn</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$num = 1;
					foreach ( $sql as $user ) {
						echo '<tr><th scope="row">' . $num++ . '</th><td>' . $user->Navn . "</td>";
					}

					?>
			</table>

			<?php
			include '../includes/footer.php';
			?>
		</div>
	</body>
</html>