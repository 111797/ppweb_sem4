<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO data_siswa (nisn, nama, kelas, alamat) VALUES ('$nisn', '$nama', '$kelas', '$alamat')";

    if ($conn->query($sql) === TRUE) {
        echo "Data siswa berhasil ditambahkan.";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
