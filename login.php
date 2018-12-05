<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
	<form action="create-user.php" method="post">
		<fieldset>
			<legend>Create User</legend>
			<input type="text" autocomplete="off" name="un" placeholder="Username" required>
			<input type="password" autocomplete="off" name="pw" placeholder="Password" required>
			<button type="submit">Opret</button>
		</fieldset>
	</form>
	<form action="login.php" method="post">
		<fieldset>
			<legend>Login</legend>
			<input type="text" autocomplete="off" name="un" placeholder="Username" required>
			<input type="password" autocomplete="off" name="pw" placeholder="Password" required>
			<button type="submit">Login</button>
		</fieldset>
	</form>
	
<?php
	
	session_start();
	
	$un = filter_input(INPUT_POST, 'un') or die('Missing or illegal un parameter');	
	$pw = filter_input(INPUT_POST, 'pw') or die('Missing or illegal pw parameter');	
	
	
	require_once('database-connect/dbcon.php');
	
	$sql = 'SELECT id, pwhash FROM ss_users WHERE username=?';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('s', $un);
	$stmt->execute();
	$stmt->bind_result($id, $pwhash);
	
	while ($stmt->fetch()){	}
	
	if (password_verify($pw,$pwhash)){
		echo 'un and pw matched user with id:'.$id. ' Go to '?><a href="index.php">frontpage</a><?php;
		$_SESSION['uid'] = $id;
		$_SESSION['uname'] = $un;
	}
	else{
		echo 'Illegal username/password combination';
	}
	
	
?>
	
</body>
</html>