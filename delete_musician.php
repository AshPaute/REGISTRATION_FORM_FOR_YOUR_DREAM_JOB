
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
    
    $stmt = $pdo->prepare("DELETE FROM musicians WHERE id = ?");
    $stmt->execute([$id]);

    echo "Musician deleted successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Musician</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Delete Musician</h2>
    <p>Are you sure you want to delete musician <strong><?php echo htmlspecialchars($musician['name']); ?></strong>?</p>
    <form method="POST">
        <button type="submit">Yes, delete</button>
        <a href="index.php">Cancel</a>
    </form>
</body>
</html>
