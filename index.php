<?php
	include 'config/setup.php';
	
	if (isset($_COOKIE["token"]) && isset($_COOKIE["user_id"])) {
		
		$stmt = $dbh->prepare("SELECT * FROM user WHERE id=" . "\"" . $_COOKIE["user_id"] . "\"");
		$stmt->execute();
		$fetchedUser = $stmt->fetch();
		if (hash('ripemd160', $fetchedUser["ID"] + $fetchedUser["email"]) == $_COOKIE["token"]) {
			$_SESSION["logguedUser"] = $fetchedUser["login"];
		}
	}
	
	if (empty($_SESSION["logguedUser"])) {
		if (isset($_GET["signup"]) && $_GET["signup"] == "true") {
			$view = 'SignUp/view.php';
			$title = 'Sign Up';
			$suClass = 'active';
			$loginClass = '';
		} else {
			$view = 'Login/view.php';
			$title = 'Login';
			$loginClass = 'active';
			$suClass = '';
		}
	} else {
		$view = 'Home/view.php';
		$title = 'Home';		
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Camagru</title>
	<link rel="stylesheet" href="/styles/style.css">
</head>
<body>
	<div id="left" class="column">
        <div class="top-left">
			<h1>Camagru</h1>
		</div>
        <div class="bottom">
			<ul class="tab-group">
        		<li class="tab <?php echo $suClass; ?>"><a href="/index.php?signup=true">Sign Up</a></li>
       	 		<li class="tab <?php echo $loginClass; ?>"><a href="/index.php">Log In</a></li>
   			</ul>
		</div>
    </div>
	<div id="right" class="column">
        <div class="top-right">
			<h1><?php echo $title; ?></h1>
		</div>
        <div class="bottom">
			<?php require $view; ?>
		</div> <!-- /bottom -->
	</div> <!-- /right-column --> 
	<script src="/SignUp/signup.js"></script>
</body>
</html>