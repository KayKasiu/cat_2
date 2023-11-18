<?php
// Include the file with database connection
include('../configs/DbConn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['authorId'])) {
    $authorId = $_POST['authorId'];
    $authorFullName = $_POST['authorFullName'];
    $authorEmail = $_POST['authorEmail'];
    $authorAddress = $_POST['authorAddress'];
    $authorDateOfBirth = $_POST['authorDateOfBirth'];
    $authorSuspendend = $_POST['authorSuspended'];
    
    try {
        // Update author details in the database
        $stmt = $DbConn->prepare("UPDATE authorstb SET AuthorFullName = :fullName, AuthorEmail = :email, AuthorAddress = :address, AuthorDateOfBirth = :dateofbirth, AuthorSuspended = :suspended WHERE AuthorId = :id");
        $stmt->bindParam(':fullName', $authorFullName);
        $stmt->bindParam(':email', $authorEmail);
        $stmt->bindParam(':address', $authorAddress);
        $stmt->bindParam(':dateofbirth', $authorDateOfBirth);
        $stmt->bindParam(':suspended', $authorSuspended);
        $stmt->bindParam(':id', $authorId);
        $stmt->execute();
        
        // Redirect back to the view authors page after update
        header("Location: ../views/viewauthors.php");
        exit();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
