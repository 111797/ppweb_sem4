<?php

require_once 'koneksi.php'; // Include the connection file

// Read data from the database
$data = readData($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Student Information System</h1>
    <a href="create.php">Add New Student</a>

    <table>
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data)): ?>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?= $row['nis']; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['kelas']; ?></td>
                        <td>
                            <a href="read.php?id=<?= $row['id']; ?>">View</a>
                            <a href="update.php?id=<?= $row['id']; ?>">Edit</a>
                            <a href="delete.php?id=<?= $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No data found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
