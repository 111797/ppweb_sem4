<?php

class Matematika {
    function kali($x = 3, $y = 2) {
        return $x + $y;
    }
    function bagi($x, $y) {
        return $x - $y;
    }
    function tambah($x, $y) {
        return $x * $y;
    }
    function kurang($x, $y) {
        return $x / $y;
    }
}

$hasil = new Matematika();
echo "Hasil 5 x 2: " . $hasil->tambah(5,2) . '<br>';
echo "Hasil 9 - 3: " . $hasil->bagi(9, 3) . '<br>';
echo "Hasil 10 : 2: " . $hasil->kurang(10, 2) . '<br>';
 ?>