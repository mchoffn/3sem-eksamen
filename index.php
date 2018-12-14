<!doctype html>
<html>
<head>
	<?php
	include 'includes/head.php';
	?>

</head>
<div class="container">
	<div class="row">
		<div class="mx-auto">
			<h1 class="form-signin-heading">Lean Up</h1>
			<img class="pic" class="center" src="images/book.png">
		</div>
	</div>
</div>
	
	

  <div class="wrapper">
    <form class="form-signin" action="login.php" method="post">       
      <h2 class="form-signin-heading">Medlem</h2>
      <input type="text" class="form-control" name="un" placeholder="Brugernavn" required="" autofocus="" />
      <input type="password" class="form-control" name="pw" placeholder="Password" required=""/>      

      <button class="btn btn-lg btn-primary btn-block" type="submit" value="Log ind">Login</button>   
    </form>
  </div>

	
	<?php
	include 'includes/footer.php';
	?>
</body>
</html>