<?php

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>METTE BEJDER: Opret bruger</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php
	
	require_once('db_con.php');
	
	if(filter_input(INPUT_POST, 'submit')){
		$email = filter_input(INPUT_POST, 'email')
			or die('missing/illegal email parameter');
		
		$password = filter_input(INPUT_POST, 'password')
			or die('missing/illegal password parameter');
		
		$name = filter_input(INPUT_POST, 'name');
		$age = filter_input(INPUT_POST, 'age');
		$gender = filter_input(INPUT_POST, 'gender');
		
		$password = password_hash($password, PASSWORD_DEFAULT);

		// echo 'Din bruger er nu oprettet<br>'.$username.':'.$password;
	
		$sql = "INSERT INTO users (email, name, age, gender, pwhash) VALUES (?, ?, ?, ?, ?)";
		$stmt = $con->prepare($sql);
		$stmt->bind_param('ssiss', $email, $name, $age, $gender, $password);
		$stmt->execute();

			if($stmt->affected_rows > 0){
				echo "<div class='infobox'>
					<a class='close' href='signup.php'>x</a><br>
					<p>Brugeren $email er nu oprettet <br><br>
					<a href='login.php'>Vil du logge ind?</a></p></div>";
			}
			else{
				echo "<div class='infobox'>
					<a class='close' href='signup.php'>x</a><br>
					<p>Kunne ikke oprette bruger<br>
					E-mailen eksisterer allerede!<br><br>
					<a href='login.php'>Vil du logge ind?</a><br>
					<a href='signup.php'>Opret en anden bruger?</a></p></div>";
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
				<legend>Opret en ny bruger</legend>
				<input class="felt" name="email" type="email" placeholder="E-mail*" required>
				<input class="felt" name="password" type="password" placeholder="Password*" required>
				<a class="link" href="login.php">Allerede en bruger?</a><br>
				
				<input class="felt" name="name" type="text" placeholder="Navn">
				<input class="felt" name="age" type="number" placeholder="Alder" min="1" max="120"><br><br>
				<label><input type="radio" name="gender" value="man"> Mand</label>
                <label><input type="radio" name="gender" value="woman"> Kvinde</label><br>
				<input class="btn" name="submit" type="submit" value="Opret bruger">
			</fieldset>
		</form>
	</div>
	


<?php require('footer.php'); ?>
</body>
</html>