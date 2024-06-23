<!DOCTYPE html>
<html>

<head>
    <title>Tambah Data Siswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Tambah Data Siswa</h2>
        <form method="post" action="store.php">
            <label for="nisn">NISN:</label>
            <input type="text" name="nisn" required>

            <label for="nama">Nama:</label>
            <input type="text" name="nama" required>

            <label for="kelas">Kelas:</label>
            <select name="kelas" required>
                <option value="10-IPA">10-IPA</option>
                <option value="10-IPS">10-IPS</option>
                <option value="11-IPA">11-IPA</option>
                <option value="11-IPS">11-IPS</option>
                <option value="12-IPA">12-IPA</option>
                <option value="12-IPS">12-IPS</option>
            </select>
            <br>
            <br>
            <label for="alamat">Alamat:</label>
            <textarea name="alamat" required></textarea>

            <input type="submit" value="Simpan">
        </form>
        <a href="index.php" class="back-button">Kembali</a>
    </div>
</body>

</html>