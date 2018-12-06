<!doctype html>
<html>
<head>
	<?php
	include 'includes/special/head.php';
	?>
</head>

<body>
	<div class="container-fluid">
		<?php
			include 'includes/special/navbar.php';
		?>

		<!--Add new category-->
		<div class="row">
			<h2 class="mx-auto mt-3">Tilføj ny katagori</h2>
		</div>
		<div class="row">
			<div class="mx-auto">
				<form class="mt-3" action="index.php" method="post" autocomplete="off">
					<div class="form-input">
						<div class="font-weight-bold input-txt">Titel: </div>
						<input class="input-field" type="text" name="category_title" required>
					</div>
					<br>
					<div class="form-input">
					</div>
					<br>
					<div class="form-input">
						<div class="font-weight-bold input-txt">Beskrivelse: </div>
						<input class="input-field" type="text" name="category_description" required>
					</div>
					<br>
					<div class="custom-file mb-3">
						<input type="file" accept="image/png, image/jpeg, image/jpg" name="category_thumbnail" class="form-control-file" id="customFile" required>
						<label class="custom-file-label" for="customFile">Forhåndsvisning (.png, .jpeg, .jpg)</label>
					</div>
					<br>
					<input class="btn btn-primary btn-block" type="submit" value="Tilføj">
				</form>
			</div>
		</div>

		<h2 class="text-center mt-3">Kategorier:</h2>

		<!--List of categories crated-->
		<div class="row d-flex justify-content-around mt-3">
			<div class="col"></div>
			<div class="category-item col-xl-3 col-sm-12">
				<h2>Title</h2>
				<p>Description</p>
				<a href="view-videos/"><img class="mb-3" src="https://via.placeholder.com/300x300"></a>
			</div>

			<div class="category-item col-xl-3 col-sm-12">
				<h2>Title</h2>
				<p>Description</p>
				<a href="view-videos/"><img class="mb-3" src="https://via.placeholder.com/300x300"></a>
			</div>

			<div class="category-item col-xl-3 col-sm-12">
				<h2>Title</h2>
				<p>Description</p>
				<a href="view-videos/"><img class="mb-3" src="https://via.placeholder.com/300x300"></a>
			</div>
			<div class="col"></div>
		</div>
		<?php
	//Create category
	$ct = filter_input( INPUT_POST, 'category_title' )or die( 'Missing or illegal category title parameter' );
	$cd = filter_input( INPUT_POST, 'category_description' )or die( 'Missing or illegal category description parameter' );
	$ctn = filter_input( INPUT_POST, 'category_thumbnail' )or die( 'Missing or illegal category thumbnail parameter' );

	//$pwhash = password_hash( $pw, PASSWORD_DEFAULT );


	require_once( 'database-connect/dbcon.php' );

	$sql = 'INSERT INTO ss_category (title, description, thumbnail) VALUES (?, ?, ?)';
	$stmt = $link->prepare( $sql );
	$stmt->bind_param( 'ss', $ct, $cd, $ctn );
	$stmt->execute();

	if ( $stmt->affected_rows > 0 ) {
		echo 'Brugernavn ' . $ct . ' oprettet';
	} else {
		echo 'Kunne ikke oprette bruger med brugernavnet "' . $ct . '", fordi at dette brugernavn allerede er taget.';
	}

	?>
		<!--New row-->
		<div class="row d-flex justify-content-around mt-3">
			<div class="col"></div>
			<div class="category-item col-xl-3 col-sm-12">
				<h2>Title</h2>
				<p>Description</p>
				<a href="view-videos/"><img class="mb-3" src="https://via.placeholder.com/300x300"></a>
			</div>

			<div class="category-item col-xl-3 col-sm-12">
				<h2>Title</h2>
				<p>Description</p>
				<a href="view-videos/"><img class="mb-3" src="https://via.placeholder.com/300x300"></a>
			</div>

			<div class="category-item col-xl-3 col-sm-12">
				<h2>Title</h2>
				<p>Description</p>
				<a href="view-videos/"><img class="mb-3" src="https://via.placeholder.com/300x300"></a>
			</div>
			<div class="col"></div>
		</div>
		
		<?php
			include 'includes/special/footer.php';
		?>
	</div>
</body>
</html>