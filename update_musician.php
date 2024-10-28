
<?php
require 'dbconfig.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $stmt = $pdo->prepare("SELECT * FROM musicians WHERE id = ?");
    $stmt->execute([$id]);
    $musician = $stmt->fetch();

    if (!$musician) {
        echo "Musician not found!";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $genre = $_POST['genre'];
    $instrument = $_POST['instrument'];

    
    $stmt = $pdo->prepare("UPDATE musicians SET name = ?, genre = ?, instrument = ? WHERE id = ?");
    $stmt->execute([$name, $genre, $instrument, $id]);

    echo "Musician updated successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Musician</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Update Musician</h2>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($musician['name']); ?>" required><br>

        <label>Genre:</label>
        <input type="text" name="genre" value="<?php echo htmlspecialchars($musician['genre']); ?>" required><br>

        <label>Instrument:</label>
        <input type="text" name="instrument" value="<?php echo htmlspecialchars($musician['instrument']); ?>" required><br>

        <button type="submit">Update Musician</button>
    </form>
</body>
</html>
