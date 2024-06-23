<?php
include 'read.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD dengan PHP 8</title>
</head>
<body>
    <a href="create.php">Tambah Data Baru</a><br/><br/>
    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Nama</td>
            <td>Kelas</td>
            <td>Aksi</td>
        </tr>
        <?php 
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>".$row['nama']."</td>";
            echo "<td>".$row['kelas']."</td>";    
            echo "<td><a href=\"update.php?id=$row[id]\">Edit</a> | 
                  <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Apakah Anda yakin ingin menghapus?')\">Hapus</a></td>";        
        }
        ?>
    </table>    
</body>
</html>
