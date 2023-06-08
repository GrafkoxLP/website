<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: /login');
	exit;
}
$DATABASE_HOST = 'sql778.main-hosting.eu';
$DATABASE_USER = 'u914913499_trainer';
$DATABASE_PASS = 'Q2QGKye3aqJk$&Vz';
$DATABASE_NAME = 'u914913499_trainer';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT password, email, name FROM users WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email, $name);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Trainer</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="shortcut icon" href="/assets\favicon.ico" type="image/x-icon">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Trainer</h1>
				<a href="/"><i class="fa fa-home"></i>Home</a>
				<a href="/account"><i class="fas fa-user-circle"></i>Profil</a>
                <a href="/categories"><i class="fas fa-file-import"></i>Training</a>
                <a href="/status"><i class="fa fa-server"></i>Server Status</a>
				<a href="/logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Trainer | Profil</h2>
			<div>
				<p>Deine Account Details kannst du hier sehen:</p>
				<table>
					<tr>
						<td>Benutzername:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?=$password?></td>
					</tr>
					<tr>
						<td>E-Mail:</td>
						<td><?=$email?></td>
					</tr>
					<tr>
						<td>Name:</td>
						<td><?=$name?></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>