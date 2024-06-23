<?php
$id = $_GET['id'];

include_once("config.php");

if(isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    $result = mysqli_query($mysqli, "UPDATE siswa SET nama='$nama',kelas='$kelas' WHERE id=$id");

    header("Location: index.php");
}
?>
