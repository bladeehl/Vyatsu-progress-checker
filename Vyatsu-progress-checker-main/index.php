<?php
require_once "testcookie.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width-device-width, initial-scale=1.0">
	<title>VyatSU</title>
	<link rel="shortcut icon" href="img1.jpg">
	<link rel="stylesheet" href="globals.css" />
	<link rel="stylesheet" href="style.css" />
</head>

<body>
	<selection>
		
		<div class="contentbox">
			<img src="img1.jpg" name="image1">
			<div class="language">
				<input id="lang_en" type="submit" value="Eng" name="">
			</div>
			<div class="language">
				<input id="lang_ru" type="submit" value="Rus" name="">
			</div>

			<div class="authbox">
				<form id="loginForm" action="login.php" method="post">
					<div class="inputbox">
						<span for="username">ID</span>
						<input type="text" id="username" name="username" required>
					</div>
					
					<div class="inputbox">
						<span for="password" data-locname="auth.password">	</span>
						<input type="password" id="password" name="password" required>
					</div>
					<div class="remember">
						<label data-locname="auth.remember"><input type="checkbox" id="remember" name="remember" > 	</label>
					</div>
					<div class="inputbox">
						<input type="submit" value="" name="" data-locname="auth.login">
						<div id="errorMessage" class="error-message"></div>
					</div>
				</form>
			</div>
		</div>
		<div class="imgbox">
			<img src="img2.jpg">
		</div>
	</selection>

</body>
</html>

<script src="script.js"></script>