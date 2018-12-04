<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Projekt</title>

	<!--Responsive tag-->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--Favicon-->
	<link rel="shortcut icon" href="images/sunset-favicon.png">

	<!--Bootstrap-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<!--css-->
	<link rel="stylesheet" href="stylesheet/style.css">
</head>

<body>
	<div class="container-fluid">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="#"><img src="images/sunset-favicon.png" width="75"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
		





			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<a class="nav-link text-dark">Logget ind som: *username* (*role*)<span class="sr-only"></span></a>
					<button class="btn btn-outline-danger">Log ud</button>
			</div>
		</nav>
		<!--Navbar end-->

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
						<button class="btn btn-primary btn-block mb-3" value="new_category">Tilføj</button>
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
		<!--Footer-->
		<div class="footer bg-dark col-12 text-white">
			<div class="col-10 mx-auto pt-3 pb-3">This is a school project</div>
		</div>
	</div>
</body>
</html>