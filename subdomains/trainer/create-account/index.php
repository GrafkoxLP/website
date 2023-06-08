<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Trainer | Registrieren</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="shortcut icon" href="/assets\favicon.ico" type="image/x-icon">
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $name    = stripslashes($_REQUEST['name']);
        $name   = mysqli_real_escape_string($con, $name);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT into `users` (username, password, email, name)
                    VALUES ('$username', '$hash', '$email', '$name')";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>Du hast dich erfolgreich registriert!</h3><br/>
                  <a href='https://trainer.grafkox.de/login/'>Melde dich jetzt an!
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Einige Felder fehlen.</h3><br/>
                  <p class='link'>Klicke hier um dich zu <a href='registration.php'>registrieren</a></p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Benutzername" required />
        <input type="email" class="login-input" name="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Adresse" required>
        <input type="text" class="login-input" name="name" placeholder="Name" required>
        <input type="password" class="login-input" name="password" placeholder="Passwort" required>
        <input type="submit" name="submit" value="Registrieren" class="login-button" required>
        <a href="https://trainer.grafkox.de/login/">Melde dich jetzt an!</a>
    </form>
<?php
    }
?>
</body>
</html>