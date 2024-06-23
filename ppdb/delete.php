<?php
include 'koneksi.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM mahasiswa WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Data mahasiswa berhasil dihapus.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "ID mahasiswa tidak diberikan.";
}

$conn->close();
?>
