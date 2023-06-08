<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Trainer | Login</title>
        <meta property="og:title" content="Trainer | Login">
        <meta property="og:description" content="Hier kannst du für deine Schule Vokabeln trainieren.">
        <meta property="og:image" content="assets\Logo.png">
        <meta name="description" content="Eigener Vokabel Trainer von Grafkox_LP. Du kannst dir auf Anfrage einen Account erstellen und dann direkt und unkompliziert anfangen zu lernen."> 
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
				<a href="https://trainer.grafkox.de/create-account/">Erstelle einen neuen Account!</a>
				<input type="submit" value="Login">
			</form>
		</div>
	</body>
</html>