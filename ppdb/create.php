<?php
include 'koneksi.php';

// Inisialisasi variabel untuk menyimpan pesan hasil operasi
$result_message = '';

// Memeriksa apakah formulir telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memeriksa apakah input tidak kosong
    if (!empty($_POST['nim']) && !empty($_POST['nama']) && !empty($_POST['jk'])) {
        // Mendapatkan nilai dari formulir
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];

        // Membuat query SQL untuk menambahkan data mahasiswa
        $sql = "INSERT INTO mahasiswa (nim, nama, jk) VALUES ('$nim', '$nama', '$jk')";
        
        // Menjalankan query SQL
        if ($conn->query($sql) === TRUE) {
            $result_message = "Data mahasiswa berhasil ditambahkan.";
        } else {
            $result_message = "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $result_message = "Mohon isi semua kolom.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <h1>Tambah Mahasiswa</h1>
    <?php echo $result_message; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nim">NIM:</label><br>
        <input type="text" id="nim" name="nim"><br>
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama"><br>
        <label for="jk">Jenis Kelamin:</label><br>
        <select id="jk" name="jk">
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select><br><br>
        <input type="submit" value="Tambah">
    </form>
</body>
</html>
