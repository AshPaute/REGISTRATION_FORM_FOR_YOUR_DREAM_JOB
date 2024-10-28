<?php
include 'dbconfig.php';


$sql = "SELECT * FROM musicians";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$musicians = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musician Record System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Musician Record System</h1>
    <a href="add_musician.php" class="button">Add Musician</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Instrument</th>
            <th>Genre</th>
            <th>Debut Year</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($musicians as $musician): ?>
            <tr>
                <td><?= $musician['id'] ?></td>
                <td><?= $musician['name'] ?></td>
                <td><?= $musician['instrument'] ?></td>
                <td><?= $musician['genre'] ?></td>
                <td><?= $musician['debut_year'] ?></td>
                <td>
                    <a href="update_musician.php?id=<?= $musician['id'] ?>" class="button">Edit</a>
                    <a href="delete_musician.php?id=<?= $musician['id'] ?>" class="button delete">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
