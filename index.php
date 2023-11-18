<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Author Details</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>
  <h1>Author Details Form</h1>
  <form action="processes/AutRegistration.php" method="POST">
    <label for="authorId">Author ID (PK):</label>
    <input type="text" id="authorId" name="authorId" required><br><br>
    
    <label for="authorFullName">Full Name:</label>
    <input type="text" id="authorFullName" name="authorFullName" required><br><br>
    
    <label for="authorEmail">Email:</label>
    <input type="email" id="authorEmail" name="authorEmail" required><br><br>
    
    <label for="authorAddress">Address:</label>
    <input type="text" id="authorAddress" name="authorAddress"><br><br>
    
    <label for="authorBiography">Biography:</label><br>
    <textarea id="authorBiography" name="authorBiography" rows="4" cols="50"></textarea><br><br>
    
    <label for="authorDateOfBirth">Date of Birth:</label>
    <input type="date" id="authorDateOfBirth" name="authorDateOfBirth" required><br><br>
    
    <label for="authorSuspended">Suspended:</label>
    <input type="checkbox" id="authorSuspended" name="authorSuspended" value="1"><br><br>
    
    <input type="submit" value="Submit">
  </form>
</body>
</html>
