<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <titl>yyy</title>
</head>
<body>
    <form action="" method="post">
        <div style="display: flex;">
        <label for="angka">Masukan angka awal : </label>
        <input type="number"  id="angka" name="angka">
    </div>
    <button type="Submit" name = "submit">Kirim</button>
    </form>
</body>
</html>

<?php
if(isset($_POST['submit'])) {
    $angka = floatval($_POST['angka']);
    $angka_ke_atas = ceil($angka);
    $angka_ke_bawah = floor($angka);

    echo "Angka awal: " . $angka . "<br>";
    
    if ($angka == $angka_ke_atas) {
        echo "Angka tidak perlu dibulatkan ke atas<br>";
    } else {
        echo "Angka dibulatkan ke atas menjadi: " . $angka_ke_atas . "<br>";
    }

    if ($angka == $angka_ke_bawah) {
        echo "Angka tidak perlu dibulatkan ke bawah<br>";
    } else {
        echo "Angka dibulatkan ke bawah menjadi: " . $angka_ke_bawah . "<br>";
    }
}
?>

