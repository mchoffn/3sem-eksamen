<!doctype html>
<html>
<head>
	<?php
	include 'includes/head.php';
	?>

</head>

<body class="bg">
	<div class="container-fluid">

		<div class="form-container mx-auto border-0 pb-3">
			<div class="row justify-content-center">
			<form class="login mt-3" action="login.php" method="post">
				<h2 class="text-light">Login</h2>
				<p class="text-light">Brugernavn</p>
				<input class="border-0 p-2 rounded mb-3" type="text" autocomplete="off" name="un" placeholder="Brugernavn" required>
				<p class="text-light">Password</p>
				<input class="border-0 p-2 rounded mb-3" type="password" autocomplete="off" name="pw" placeholder="Password" required>
				<br>
				<input class="btn btn-outline-success" type="submit" value="Log ind">
			</form>
				</div>
			</div>
	</div>
	<?php
	include 'includes/footer.php';
	?>
</body>
</html>