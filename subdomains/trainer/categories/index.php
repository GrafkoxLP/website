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
                <h1>Trainer</h1>
                <a href="/"><i class="fa fa-home"></i>Home</a>
				<a href="/account"><i class="fas fa-user-circle"></i>Profil</a>
                <a href="/categories"><i class="fas fa-file-import"></i>Training</a>
                <a href="/status"><i class="fa fa-server"></i>Server Status</a>
				<a href="/logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
            </div>
        </nav>
        <div class="content">
            <h2>Trainer | Kategorien</h2>
            <p>Hier kannst du neue Kategorien wie "Englisch" erstellen und direkt anfangen zu lernen!</p>
        </div>

        <?php
        require('db.php');
        // insert new category into database if form is submitted (database structure: id, category, from_user)
        if (isset($_REQUEST['category'])) {
            $category = stripslashes($_REQUEST['category']);
            $category = mysqli_real_escape_string($con, $category);
            $from_user = $_SESSION['id'];
            $query    = "INSERT into `categories` (name, from_user)
                        VALUES ('$category', '$from_user')";
            $result   = mysqli_query($con, $query);
            if ($result) {
                echo "<div class='form'>
                    <h3>Kategorie wurde erfolgreich erstellt.</h3></div>";
            } else {
                echo "<div class='form'>
                    <h3>Ein Fehler ist aufgetreten.</h3>
                    <br/>Klicke hier um zur <a href='/categories'>Kategorien Übersicht</a> zu gelangen.</div>";
            }
        } else {
?>
    <form action="" method="post">
        <input type="text" name="category" placeholder="Category Name" required>
        <input type="submit" name="submit" value="Create Category">
    </form>
<?php
    }
?>


        <!-- display all categories for the specific user -->
        <div class="content">
            <h2>Kategorien</h2>
            <table>
                <thead>
                    <tr>
                        <th>Kategorie</th>
                        <th>Optionen</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $from_user = $_SESSION['id'];
                    $query     = "SELECT * FROM `categories` WHERE from_user = '$from_user'";
                    $result    = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td><a href='/categories/edit.php?id=" . $row['id'] . "'>Edit</a> | <a href='/categories/delete.php?id=" . $row['id'] . "'>Delete</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </body>
</html>