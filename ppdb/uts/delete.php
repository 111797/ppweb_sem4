<?php
include 'config.php';

$id = $_GET['id'];
$sql = "DELETE FROM data_siswa WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}
?>