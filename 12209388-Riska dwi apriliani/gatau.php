<?php
$array = [5, 1, 20, 22, 6, 4, 5, 10, 50, 11, 95];
$kelipatanLima = [];

// Menghapus duplikat
$array = array_unique($array);

// Mengurutkan array
sort($array);

// Menyimpan item yang merupakan kelipatan lima ke dalam array baru
foreach ($array as $item) {
    if ($item % 5 === 0) {
        $kelipatanLima[] = $item;
    }
}
echo implode(" ", $kelipatanLima);
