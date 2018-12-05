<!doctype html>
<html>
<head>
<?php
	include 'includes/special/head.php';
	?>
</head>

<body>
	<div class="form-container text-center border-0 pb-3">
	<form action="create-user.php" method="post">
		<fieldset>
			<legend class="text-light">Create User</legend>
			<input class="border-0 p-2 rounded" type="text" autocomplete="off" name="un" placeholder="Username" required>
			<input type="password" autocomplete="off" name="pw" placeholder="Password" required>
			<button type="submit">Opret</button>
		</fieldset>
	</form>
	<form action="login.php" method="post">
		<fieldset>
			<legend class="text-light">Login</legend>
			<input type="text" autocomplete="off" name="un" placeholder="Username" required>
			<input type="password" autocomplete="off" name="pw" placeholder="Password" required>
			<button type="submit">Login</button>
		</fieldset>
	</form>
		</div>


	
<?php
	//Create user
	$un = filter_input(INPUT_POST, 'un') or die('Missing or illegal un parameter');	
	$pw = filter_input(INPUT_POST, 'pw') or die('Missing or illegal pw parameter');	

	$pwhash = password_hash($pw, PASSWORD_DEFAULT);
	
	
	require_once('database-connect/dbcon.php');
	
	$sql = 'INSERT INTO ss_users (username, pwhash) VALUES (?, ?)';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('ss', $un, $pwhash);
	$stmt->execute();
	
	if($stmt->affected_rows > 0){
		echo 'User '.$un.' created';
	}
	else{
		echo 'Could not create user - username '.$un.' already exists!';
	}
	
?>

	
	
	
	<?php
	
	session_start();
	
	//Log in
	$un = filter_input(INPUT_POST, 'un') or die('Missing or illegal un parameter');	
	$pw = filter_input(INPUT_POST, 'pw') or die('Missing or illegal pw parameter');	
	
	
	
	$sql = 'SELECT id, pwhash FROM ss_users WHERE username=?';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('s', $un);
	$stmt->execute();
	$stmt->bind_result($id, $pwhash);
	
	while ($stmt->fetch()){	}
	
	if (password_verify($pw,$pwhash)){
		echo 'un and pw matched user with id:'.$id;
		$_SESSION['uid'] = $id;
		$_SESSION['uname'] = $un;
	}
	else{
		echo 'Illegal username/password combination';
	}
	
	
?>
</body>
</html>