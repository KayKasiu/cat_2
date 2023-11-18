<?php
// Include the file with database connection
include('../configs/DbConn.php');

// Retrieve authors from the database in ascending order by AuthorFullName
try {
    $stmt = $DbConn->query("SELECT * FROM authorstb ORDER BY AuthorFullName ASC");
    $authors = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Authors</title>
    <style>
        /* Some basic styling for the table */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 6px 12px;
            text-decoration: none;
            background-color: #008CBA;
            color: white;
            border: none;
            border-radius: 4px;
        }
        .btn-delete {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <h1>List of Authors</h1>
    <table>
        <thead>
            <tr>
                <th>Author ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($authors as $author): ?>
                <tr>
                    <td><?php echo $author['AuthorId']; ?></td>
                    <td><?php echo $author['AuthorFullName']; ?></td>
                    <td><?php echo $author['AuthorEmail']; ?></td>
                    <td><?php echo $author['AuthorAddress']; ?></td>
                    <td>
                        <a href="editauth.php?id=<?php echo $author['AuthorId']; ?>" class="btn">Edit</a>
                        <a href="delete_author.php?id=<?php echo $author['AuthorId']; ?>" class="btn btn-delete">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

