<?php
if(isset($_POST['Submit'])) {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    
    include 'config.php';
    
    $result = mysqli_query($mysqli, "INSERT INTO siswa(nama,kelas) VALUES('$nama','$kelas')");
    
    header("Location: index.php");
}
?>
