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
				<form class="mt-3" action="create-category.php" method="post" autocomplete="off">
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
						<label class="custom-file-label" for="customFile">300x300 Forhåndsvisning (.png, .jpeg, .jpg)</label>
					</div>
					<br>
					<input class="btn btn-primary btn-block" type="submit" value="Tilføj">
				</form>
			</div>
		</div>

		<h2 class="text-center mt-3">Kategorier:</h2>

		<!--Start category container-->
		<div class="row d-flex justify-content-around mt-3">
			<?php
			require_once( 'database-connect/dbcon.php' );

			//Showing all categories
			$sql = "SELECT id AS cid, title, description, thumbnail FROM ss_category";
			$result = $link->prepare( $sql );
			
			$result->execute();
			$result->bind_result($cid, $title, $description, $thumbnail);

			while($result->fetch()){
					?>
			<div class="col"></div>
			<div class="category-item col-xl-3 col-sm-12">

				<h2>
					<?= $title ?>
				</h2>
				<div class="delete">
					<form action="delete-category.php" method="post">
						<input type="hidden" name="cid" value="<?=$cid?>">
						<div class="delete-img">
							<input type="image" src="images/delete-img.png" title="Delete" width="20" height="20" alt="Delete">
						</div>
					</form>
				</div>
				<p>
					<?= $description ?>
				</p>
				<a href="view-videos/"><img class="mb-3"
					src="<?= $thumbnail ?>" height="300" width="300">
				</img></a>
			</div>
			<div class="col"></div>
			<?php

			//echo "Titel: " . $row[ "title" ] . "<br>" . "Beskrivelse: " . $row[ "description" ]. "<br>" . " Forhåndsvisning: " . $row[ "thumbnail" ] . "<br>".PHP_EOL;
			}
			

			//$link->close();
			?>
		</div>
		<!--End category container-->

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