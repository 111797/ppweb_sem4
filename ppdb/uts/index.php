<!DOCTYPE html>
<html>

<head>
    <title>Data Siswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Data Siswa SD</h2>

        <!-- Search form -->
        <form method="get" action="" class="search-form">
            <input type="text" name="search" value="<?php echo htmlspecialchars($search_query); ?>"
                placeholder="Cari berdasarkan nama...">
            <input type="submit" value="Cari">
        </form>

        <a href="create.php" class="button">Tambah Data Siswa</a>
        <table>
            <tr>
                <th>ID</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["nisn"] . "</td>
                        <td>" . $row["nama"] . "</td>
                        <td>" . $row["kelas"] . "</td>
                        <td>" . $row["alamat"] . "</td>
                        <td>
                            <a href='edit.php?id=" . $row["id"] . "' class='button'>Edit</a>
                            <a href='delete.php?id=" . $row["id"] . "' class='button delete-button'>Delete</a>
                            <a href='tampil.php?id=" . $row["id"] . "' class='button'>Nilai</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
        }
        ?>
        </table>
    </div>
</body>

</html>