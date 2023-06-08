<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username']) || $_SESSION['is_admin'] != 1) {
    header('Location: login');
    exit;
}

// Connect to database
$db = mysqli_connect('sql778.main-hosting.eu', 'u914913499_deadcity', 'TLEbqJkYuf45B@BR2qBZ', 'u914913499_deadcity');

// Handle form submission
if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $body = mysqli_real_escape_string($db, $_POST['body']);
    $username = $_SESSION['username'];
    // Insert post into 'posts' table with id and created_at
    $query = "INSERT INTO posts (title, body, username, created_at) VALUES ('$title', '$body', '$username', NOW())";
    mysqli_query($db, $query);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin - Dead-City Forum</title>
</head>
<body>
  <h1>Create New Post</h1>
  <form method="post" action="index.php">
    <label for="title">Title</label>
    <input type="text" id="title" name="title" required>
    <br>
    <label for="body">Body</label>
    <textarea id="body" name="body" required></textarea>
    <br>
    <input type="submit" name="submit" value="Create Post">
  </form>
</body>
</html>
