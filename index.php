<?php
	include "./config/setup.php";
?>
<html>
	<head>
		<title>Camagru</title>
	</head>

	<body>
		<header id="header">
			<h1>Camagru</h1>
		</header>

		<div id="main">
			<?php if (isset($_SESSION["logguedUser"])) :?> 
				User connection_aborted
			<?php else:?>
				<div id="suForm">
					<label for="login">Login</label>
					<input type="text" name="login" id="suLogin">
					<span id="loginErr" class="err"></span><br>

					<label for="email">Email</label>
					<input type="text" name="email" id="suEmail">
					<span id="emailErr" class="err"></span><br>

					<label for="password">Password</label>
					<input type="password" name="password" id="suPwd">
					<span id="pwdErr" class="err"></span><br>

					<label for="passwordConfirm">Confirm your password</label>					
					<input type="password" name="passwordConfirm" id="suPwdConf">
					<span id="pwdConfErr" class="err"></span><br>
					
					<input type="submit" value="Sign Up" onclick="createUser();">
				</div>
			<?php endif;?>
		</div>

		<script type="text/javascript" src="scripts/request.js"></script>				
	</body>
</html>