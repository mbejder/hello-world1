<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>METTE BEJDER</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="container">
	<div class="header">
		<img src="img/LOGO.png" alt="logo" id="logo">
	</div>

<?php 
	if(empty($_SESSION['uid'])){
		echo "<nav>
				<a class='selected' href='index.php'>Forside</a>
				<a href='login.php'>Log ind</a></nav>";
		
		echo "<div class='content'>
			<div class='content1'>
				<h2>Du skal logge ind for at se hemmeligheden!!!</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit laudantium repellendus fuga vitae ipsa ullam, dolor distinctio consequatur, placeat numquam et impedit est vel debitis delectus officia facere necessitatibus ea.<br><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br><br> Suscipit laudantium repellendus fuga vitae ipsa ullam, dolor distinctio consequatur, placeat numquam et impedit est vel debitis delectus officia facere necessitatibus ea.</p>
			</div>
			<div class='content2'></div>
			</div>";
	}
	else{
		echo '<h3 class="welcome">Velkommen <br>'.$_SESSION['email']. '!</h3>';
		echo "<nav>
				<a class='selected' href='index.php'>Forside</a>
				<a href='logout.php'>Log ud</a></nav>";
		
		echo "<div class='content'>
			<div class='content1'>
				<h2>Hemmeligheden er...</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit laudantium repellendus fuga vitae ipsa ullam, dolor distinctio consequatur, placeat numquam et impedit est vel debitis delectus officia facere necessitatibus ea.<br><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br><br> Suscipit laudantium repellendus fuga vitae ipsa ullam, dolor distinctio consequatur, placeat numquam et impedit est vel debitis delectus officia facere necessitatibus ea.</p>
			</div>
			<div class='content3'></div>
			</div>";
	}
	?>
		
	
</div>


<?php require('footer.php'); ?>
</body>
</html>