<?php
include 'config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM data_siswa WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nisn = $_POST["nisn"];
    $nama = $_POST["nama"];
    $kelas = $_POST["kelas"];
    $alamat = $_POST["alamat"];

    $sql = "UPDATE data_siswa SET nisn='$nisn', nama='$nama', kelas='$kelas', alamat='$alamat' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Siswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Edit Data Siswa</h2>
        <form method="post" action="">
            NISN: <input type="text" name="nisn" value="<?php echo $row['nisn']; ?>" required><br>
            Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>
            Kelas: <input type="text" name="kelas" value="<?php echo $row['kelas']; ?>" required><br>
            Alamat: <textarea name="alamat" required><?php echo $row['alamat']; ?></textarea><br>
            <input type="submit" value="Perbarui">
        </form>
        <a href="index.php" class="button">Kembali ke Daftar</a>
    </div>
</body>

</html>