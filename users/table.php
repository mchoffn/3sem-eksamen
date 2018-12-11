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
				
						
			<?php
				}
			} else {
				echo "0 results";
			}
			$link->close();
			?>
<table class="table table-striped">
 <thead class="thead bg-success" style="color: white">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Navn</th>
      <th scope="col">Rolle</th>
    </tr>
  </thead>
		<tbody>
			
<?php	  
foreach($sql as $products) { 
    echo '<tr><th scope="row">' . $num++ . '</th><td>' . $products->Navn . "</td>"; 
    echo '<td>' . $products->Varenummer . '</td> '; 
} 
	  	  
?>
</table>
			
			
			
			
			
			
			<hr>

			<table class="table table-striped">
				<thead class="thead bg-info text-light">
					<tr>
						<th scope="col">#</th>
						<th scope="col">Navn</th>
						<th scope="col">Rolle</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">1</th>
						<td><?php $row[ "username" ] ?></td>
						<td>Otto</td>
					</tr>
				</tbody>
			</table>

			<hr>

			<table class="table table-striped">
				<thead class="thead bg-success" style="color: white">
					<tr>
						<th scope="col">#</th>
						<th scope="col">Navn</th>
						<th scope="col">Varenummer</th>
					</tr>
				</thead>
				<tbody>


					<?php
					//api foreach
					$num = 1;
					foreach ( $sql as $userdata ) {
						echo '<tr><th scope="row">' . $num++ . '</th><td>' . $userdata->$row[ "username" ] . "</td>";
						echo '<td>' . $userdata->rolle . '</td> ';
					}

					?>
			</table>
		</div>
	</body>
</html>