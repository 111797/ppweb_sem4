<?php

function volume_balok($p=3, $l=2, $t=4) {
    return $p * $l * $t;
  }

$panjang = 20; $lebar = 3; $tinggi = 10;
echo volume_balok($panjang,$lebar,$tinggi).'<br>';
echo volume_balok($lebar,$tinggi).'<br>';
echo volume_balok($tinggi).'<br>';

?>
