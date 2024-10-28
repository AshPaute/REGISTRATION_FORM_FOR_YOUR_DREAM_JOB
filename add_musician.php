<?php
include 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $instrument = $_POST['instrument'];
    $genre = $_POST['genre'];
    $debut_year = $_POST['debut_year'];

    $sql = "INSERT INTO musicians (name, instrument, genre, debut_year) VALUES (:name, :instrument, :genre, :debut_year)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name' => $name, 'instrument' => $instrument, 'genre' => $genre, 'debut_year' => $debut_year]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Musician</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Add New Musician</h1>
    <form method="post">
        <label>Name: <input type="text" name="name" required></label><br>
        <label>Instrument: <input type="text" name="instrument" required></label><br>
        <label>Genre: <input type="text" name="genre" required></label><br>
        <label>Debut Year: <input type="number" name="debut_year" required></label><br>
        <button type="submit" class="button">Add Musician</button>
        <a href="index.php" class="button">Back</a>
    </form>
</body>
</html>
