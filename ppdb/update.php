<?php
include 'koneksi.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST['nim']) && !empty($_POST['nama']) && !empty($_POST['jk'])) {
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $jk = $_POST['jk'];
            
            $sql = "UPDATE mahasiswa SET nim='$nim', nama='$nama', jk='$jk' WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo "Data mahasiswa berhasil diperbarui.";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            echo "Mohon isi semua kolom.";
        }
    }
    
    $sql = "SELECT * FROM mahasiswa WHERE id=$id";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nim = $row['nim'];
        $nama = $row['nama'];
        $jk = $row['jk'];
    } else {
        echo "Data mahasiswa tidak ditemukan.";
    }
} else {
    echo "ID mahasiswa tidak diberikan.";
}

$conn->close();
?>
