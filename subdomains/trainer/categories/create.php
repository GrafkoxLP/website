<!-- create the table from the input in index.php -->
<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: /login/');
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Trainer | Kategorien</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="shortcut icon" href="/assets/favicon.ico" type="image/x-icon">
    </head>
    <body class="loggedin">
        <nav class="navtop">
            <div>
                <h1>Trainer by Grafkox_LP</h1>
                <a href="/"><i class="fa fa-home"></i>Home</a>
                <a href="/account"><i class="fas fa-user-circle"></i>Profil</a>
                <a href="/categories"><i class="fas fa-file-import"></i>Training</a>
                <a href="/logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
            </div>
        </nav>
        <div class="content">
            <h2>Trainer | Kategorien</h2>
            <p>Hier kannst du neue Kategorien wie "Englisch" erstellen und direkt anfangen zu lernen!</p>
        </div>
        <div>
            <!-- Button to create a new table in the database -->
            <form action="/categories/create.php" method="post">
                <input type="submit" value="Neue Kategorie erstellen">
            </form>
        </div>
    </body>
</html>
<?php
// create the table from the input in index.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trainer";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE categories (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
description VARCHAR(255) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table categories created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>