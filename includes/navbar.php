<!--Navbar start-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="index.php"><img src="images/sunset-favicon.png" width="75"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav ml-auto">
			<a class="nav-link text-dark">Logget ind som: <?php
		if(isset($_SESSION['uid'])){
			echo $_SESSION['uname'];
		} else {
					?>"Ikke logget ind" <a href="create-user.php"><button class="btn btn-primary">Gå til login siden</button></a><?php
				}
	
	
	?> <?php
		if(isset($_SESSION['role'])){
			echo '(Administrator)';
		} else {
			echo '(Bruger)';
		}
		?>
				<span class="sr-only"></span></a>
			<form action="logout.php">
				<button class="btn btn-outline-danger" type="submit">Logout</button>
			</form>
	</div>
</nav>
<!--Navbar end-->