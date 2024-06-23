<?php

$host = "localhost";
$username = "root"; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda
$database = "data_siswa";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

function readData($conn) {
    $data = array(); // Inisialisasi array untuk menyimpan hasil query

    // Query untuk membaca data dari database
    $query = "SELECT * FROM siswa";

    // Eksekusi query
    $result = $conn->query($query);

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
        // Jika query berhasil, ambil data dan masukkan ke dalam array
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    } else {
        // Jika query gagal, tampilkan pesan kesalahan
        echo "Error: " . $conn->error;
    }

    // Mengembalikan data yang telah dibaca dari database
    return $data;
}

?>
