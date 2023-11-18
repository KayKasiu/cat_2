<?php
// Include the file with database connection
include('../configs/DbConn.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $authorId = $_GET['id'];

    try {
        // Retrieve author information based on ID
        $stmt = $DbConn->prepare("SELECT * FROM authorstb WHERE AuthorId = ?");
        $stmt->execute([$authorId]);
        $author = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    // Display the form to edit author details
    // Use $author variable to pre-fill the form fields
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Author</title>
    <link rel="stylesheet" href="../index.css">
</head>
<body>
    <h1>Edit Author Details</h1>
    <?php if(isset($author) && $author): ?>
    <form action="../processes/update_author.php" method="POST">
        <input type="hidden" name="authorId" value="<?php echo $author['AuthorId']; ?>">
        <label for="authorFullName">Full Name:</label>
        <input type="text" name="authorFullName" value="<?php echo $author['AuthorFullName']; ?>" required><br><br>
        
        <label for="authorEmail">Email:</label>
        <input type="email" name="authorEmail" value="<?php echo $author['AuthorEmail']; ?>" required><br><br>

        <label for="authorAddress">Address:</label>
        <input type="text" id="authorAddress" name="authorAddress" value="<?php echo $author['AuthorAddress']; ?>"><br><br>
        
        <label for="authorDateOfBirth">Date of Birth:</label>
        <input type="date" id="authorDateOfBirth" name="authorDateOfBirth" value="<?php echo $author['AuthorDateOfBirth']; ?>" required><br><br>
        
        <label for="authorSuspended">Suspended:</label>
        <input type="checkbox" id="authorSuspended" name="authorSuspended" value="<?php echo $author['AuthorSuspended']; ?>"><br><br>

        <input type="submit" value="Update">
    </form>
    <?php else: ?>
        <p>No author found with this ID.</p>
    <?php endif; ?>
</body>
</html>



