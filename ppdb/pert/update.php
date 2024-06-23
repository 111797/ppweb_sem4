<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM siswa WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nama = $row['nama'];
        $umur = $row['umur'];
        $kelas = $row['kelas'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $kelas = $_POST['kelas'];

    $sql = "UPDATE siswa SET nama='$nama', umur='$umur', kelas='$kelas' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: read.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Siswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Ubah Siswa</h2>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="input-field">
                <input type="text" name="nama" value="<?php echo $nama; ?>">
                <label for="nama">Nama</label>
            </div>
            <div class="input-field">
                <input type="number" name="umur" value="<?php echo $umur; ?>">
                <label for="umur">Umur</label>
            </div>
            <div class="input-field">
                <input type="text" name="kelas" value="<?php echo $kelas; ?>">
                <label for="kelas">Kelas</label>
            </div>
            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>
</body>

</html>
