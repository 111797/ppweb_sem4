<?php
include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM siswa ORDER BY id DESC");
?>
