<?php session_start();


if(isset($_POST['submit'])){
	header('location:index.php');
}



?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>METTE BEJDER: Log ind</title>
<link type="text/css" rel="stylesheet" href="css/style.css">
</head>

<body>

<?php
	require_once('db_con.php');
	
	if(filter_input(INPUT_POST, 'submit')){
		$email = filter_input(INPUT_POST, 'email')
			or die('missing/illegal username parameter');
		
		$password = filter_input(INPUT_POST, 'password')
			or die('missing/illegal password parameter');
		
		
		$sql = 'SELECT id, pwhash from users WHERE email = ?';
		$stmt = $con->prepare($sql);
		$stmt->bind_param('s', $email);
		$stmt->execute();
		$stmt->bind_result($uid, $pwhash);
	
		while($stmt->fetch()) {}
	
		if((password_verify($password, $pwhash))){
			echo 'Du er nu logget ind!';
			$_SESSION['uid'] = $uid;
			$_SESSION['email'] = $email;
			header('location:index.php');
			
		}
		else{
			echo "<div class='infobox'>
					<a class='close' href='login.php'>x</a><br>
					<p>Forkert kombination af email og password...<br><br>
					<a href='login.php'>Prøv igen?</a></p></div>";
		}
		$stmt->close();
		$con->close();
	
	}
	


	?>
	
	<div class="container">
	<div class="header">
		<img src="img/LOGO.png" alt="logo" id="logo">
		<nav>
			<a href='index.php'>Forside</a>
			<a class='selected' href='login.php'>Log ind</a>
		</nav>
	</div>
	
		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
			<fieldset>
				<legend>Log ind</legend>
				<input class="felt" name="email" type="email" placeholder="E-mail" required><br>
				<input class="felt" name="password" type="password" placeholder="Password" required><br>
				<a class="link" href="signup.php">Opret en bruger?</a><br>
				<input class="btn" name="submit" type="submit" value="Log ind">
			</fieldset>
		</form>
	</div>
	


<?php require('footer.php');?>
</body>
</html>