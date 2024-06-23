<?php

// Perulangan untuk menampilkan bilangan dari awal hingga akhir
for ($i = 1; $i <= 9; $i++) {
  // Menampilkan bilangan ganjil
  if ($i % 2 != 0) {
    echo "$i, ";
  }
}

for ($i = 21; $i <= 29; $i++) {
    // Menampilkan bilangan ganjil
    if ($i % 2 != 0) {
      echo "$i, ";
    }
  }

// Menampilkan bilangan genap dalam urutan menurun
for ($i = 28; $i >= 20; $i--) {
  if ($i % 2 == 0) {
    echo "$i, ";
  }
}

for ($i = 10; $i >= 2; $i--) {
    if ($i % 2 == 0) {
      echo "$i, ";
    }
  }
?>
