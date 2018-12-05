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
				<form class="mt-3" action="index.php" method="get" autocomplete="off">
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
						<input type="file" accept="image/png, image/jpeg, image/jpg" class="custom-file-input" id="customFile" required>
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
		</div>
		<?php
			include 'includes/special/footer.php';
		?>
	</div>
</body>
</html>