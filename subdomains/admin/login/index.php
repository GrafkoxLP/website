<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin | Login</title>
        <meta property="og:title" content="Admin | Login">
        <meta property="og:description" content="Admin Bereich von grafkox.de">
        <meta property="og:image" content="assets\Logo.png">
        <meta name="description" content="Admin Bereich von grafkox.de"> 
        <link rel="shortcut icon" href="/assets\favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="login">
			<h1>Login</h1>
			<form action="authenticate.php" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Benutzername" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Passwort" id="password" required>
				<input type="submit" value="Login">
			</form>
		</div>
	</body>
</html>