<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch data for the selected student
    $sql = "
    SELECT 
        data_siswa.NISN, 
        data_siswa.nama, 
        nilai.MTK, 
        nilai.BIN, 
        nilai.BIG,
        (nilai.MTK + nilai.BIN + nilai.BIG) / 3 AS average,
        CASE
            WHEN (nilai.MTK + nilai.BIN + nilai.BIG) / 3 >= 75 THEN 'Lulus'
            ELSE 'Tidak Lulus'
        END AS status
    FROM 
        data_siswa
    LEFT JOIN 
        nilai ON data_siswa.id = nilai.id
    WHERE 
        data_siswa.id = $id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>

<!DOCTYPE html>
<html>

<head>
    <title>Nilai Siswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Nilai Siswa</h2>
        <?php if (!is_null($row['MTK']) && !is_null($row['BIN']) && !is_null($row['BIG'])) { ?>
        <table>
            <tr>
                <th>NISN</th>
                <td><?php echo $row["NISN"]; ?></td>
            </tr>
            <tr>
                <th>Nama</th>
                <td><?php echo $row["nama"]; ?></td>
            </tr>
            <tr>
                <th>MTK</th>
                <td><?php echo $row["MTK"]; ?></td>
            </tr>
            <tr>
                <th>BIN</th>
                <td><?php echo $row["BIN"]; ?></td>
            </tr>
            <tr>
                <th>BIG</th>
                <td><?php echo $row["BIG"]; ?></td>
            </tr>
            <tr>
                <th>Rata-Rata</th>
                <td><?php echo number_format($row["average"], 2); ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><?php echo $row["status"]; ?></td>
            </tr>
        </table>

        <h3>Edit Nilai Siswa</h3>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="mtk">MTK:</label>
            <input type="number" name="mtk" value="<?php echo $row['MTK']; ?>" required>
            <label for="bin">BIN:</label>
            <input type="number" name="bin" value="<?php echo $row['BIN']; ?>" required>
            <label for="big">BIG:</label>
            <input type="number" name="big" value="<?php echo $row['BIG']; ?>" required>
            <input type="submit" name="update" value="Update">
            <input type="submit" name="delete" value="Delete" class="delete-button">
        </form>
        <?php } else { ?>
        <h3>Input Nilai Siswa</h3>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="mtk">MTK:</label>
            <input type="number" name="mtk" required>
            <label for="bin">BIN:</label>
            <input type="number" name="bin" required>
            <label for="big">BIG:</label>
            <input type="number" name="big" required>
            <input type="submit" name="create" value="Simpan">
        </form>
        <?php } ?>
        <a href="index.php" class="back-button">Kembali</a>
    </div>
</body>

</html>

<?php
    } else {
        echo "Tidak ada data siswa dengan ID ini.";
    }
} else {
    echo "ID siswa tidak ditemukan.";
}

// Handle update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $mtk = $_POST['mtk'];
    $bin = $_POST['bin'];
    $big = $_POST['big'];

    $update_sql = "UPDATE nilai SET MTK='$mtk', BIN='$bin', BIG='$big' WHERE id='$id'";
    if ($conn->query($update_sql) === TRUE) {
        echo "Data nilai berhasil diperbarui.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Handle delete
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $delete_sql = "DELETE FROM nilai WHERE id='$id'";
    if ($conn->query($delete_sql) === TRUE) {
        echo "Data nilai berhasil dihapus.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Handle create
if (isset($_POST['create'])) {
    $id = $_POST['id'];
    $mtk = $_POST['mtk'];
    $bin = $_POST['bin'];
    $big = $_POST['big'];

    $create_sql = "INSERT INTO nilai (id, MTK, BIN, BIG) VALUES ('$id', '$mtk', '$bin', '$big')";
    if ($conn->query($create_sql) === TRUE) {
        echo "Data nilai berhasil ditambahkan.";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>