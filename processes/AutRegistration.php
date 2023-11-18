<?php
// Include the file with database connection
include('../configs/DbConn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data and sanitize (ensure to sanitize user inputs)
    $authorFullName = $_POST['authorFullName'];
    $authorEmail = $_POST['authorEmail'];
    $authorAddress = $_POST['authorAddress'];
    $authorBiography = $_POST['authorBiography'];
    $authorDateOfBirth = $_POST['authorDateOfBirth'];
    $authorSuspended = isset($_POST['authorSuspended']) ? 1 : 0; // Assuming a checkbox value

    try {
        // Prepare a SQL statement to insert data into the table
        $stmt = $DbConn->prepare("INSERT INTO authorstb (AuthorFullName, AuthorEmail, AuthorAddress, AuthorBiography, AuthorDateOfBirth, AuthorSuspended) VALUES (:fullName, :email, :address, :biography, :dateOfBirth, :suspended)");
        
        // Bind parameters and execute the statement
        $stmt->bindParam(':fullName', $authorFullName);
        $stmt->bindParam(':email', $authorEmail);
        $stmt->bindParam(':address', $authorAddress);
        $stmt->bindParam(':biography', $authorBiography);
        $stmt->bindParam(':dateOfBirth', $authorDateOfBirth);
        $stmt->bindParam(':suspended', $authorSuspended);
        
        // Execute the query
        $stmt->execute();

        echo "Author details submitted successfully";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request method. Please use POST method to submit data.";
}
?>
