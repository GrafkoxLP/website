<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <!-- display all vocabs for the specific category -->
        <div class="content">
            <h2>Deine Vokabeln</h2>
            <table>
                 <thead>
                    <tr>
                        <th>Deutsch</th>
                        <th>Englisch</th>
                        <th>Optionen</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $category = $_GET['category'];
                    $query = "SELECT * FROM `vocabs` WHERE category = '$category'";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['german'] . "</td>";
                        echo "<td>" . $row['english'] . "</td>";
                        echo "<td><a href='/editvocab?category=" . $row['id'] . "'>Bearbeiten</a> | <a href='/deletevocab?category=" . $row['id'] . "'>Löschen</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- insert new vocab into database if form is submitted (database structure: id, german, english, category) -->
        <?php
        if (isset($_REQUEST['german'])) {
            $german = stripslashes($_REQUEST['german']);
            $german = mysqli_real_escape_string($con, $german);
            $english = stripslashes($_REQUEST['english']);
            $english = mysqli_real_escape_string($con, $english);
            $category = $_GET['category'];
            $query    = "INSERT into `vocabs` (german, english, category)
                            VALUES ('$german', '$english', '$category')";
            $result   = mysqli_query($con, $query);
            if ($result) {
                echo "<div class='form'>
                        <h3>Vokabel wurde erfolgreich erstellt.</h3>
                        <br/>Klicke hier um zur <a href='/vocabs?category=" . $category . "'>Vokabel Übersicht</a> zu gelangen.</div>";
            } else {
                echo "<div class='form'>
                        <h3>Ein Fehler ist aufgetreten.</h3>
                        <br/>Klicke hier um zur <a href='/vocabs?category=" . $category . "'>Vokabel Übersicht</a> zu gelangen.</div>";
            }
        } else {
        ?>
            <form action="" method="post">
                <input type="text" name="german" placeholder="Deutsch" required>
                <input type="text" name="english" placeholder="Englisch" required>
                <input type="submit" name="submit" value="Vokabel erstellen">
            </form>
        <?php
        }
        ?>
    </body>
</html>