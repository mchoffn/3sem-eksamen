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


	
<?php
	
	$un = filter_input(INPUT_POST, 'un') or die('Missing or illegal un parameter');	
	$pw = filter_input(INPUT_POST, 'pw') or die('Missing or illegal pw parameter');	

	$pwhash = password_hash($pw, PASSWORD_DEFAULT);
	
	
	require_once('dbcon.php');
	
	$sql = 'INSERT INTO ss_users (username, pwhash) VALUES (?, ?)';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('ss', $un, $pwhash);
	$stmt->execute();
	
	if($stmt->affected_rows > 0){
		echo 'User '.$un.' created :-). Go to frontpage';
	}
	else{
		echo 'Could not create user - username '.$un.' already exists';
	}
	
?>
	
	
</body>
</html>