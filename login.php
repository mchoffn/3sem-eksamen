<!doctype html>
<html>
<head>
<?php
	include 'includes/special/head.php';
	?>

	<meta http-equiv="refresh" content="3; url=index.php"/>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>

	
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
		//echo 'Brugernavn og password passer med brugerid: '.$id.
		echo 'Brugernavn og password er korrekt. Gå til '?><a href="index.php">forsiden</a><?php;
		$_SESSION['uid'] = $id;
		$_SESSION['uname'] = $un;
	}
	else{
		echo 'Ugyldigt kombination af brugernavn/password.';
	}
	
	
?>
	
</body>
</html>