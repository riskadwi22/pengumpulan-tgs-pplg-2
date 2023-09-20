<?php
$tunj;
$pjk;
$gaji_bersih;
$gaji_pokok;
$nama;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Perhitungan Gaji Karyawan</title>
</head>
<body>
    <h2>Perhitungan Gaji Karyawan</h2>
    <form method="post" action="">
        <label for="nama">Nama Karyawan:</label>
        <input type="text" id="nama" name="nama" required><br><br>
        
        <label for="gaji_pokok">Gaji Pokok:</label>
        <input type="number" id="gaji_pokok" name="gaji_pokok" required><br><br>
        
        <input type="submit" name="hitung" value="Hitung Gaji">
    </form>
</body>
</html>
<?php
    if (isset($_POST['hitung'])) {
        $nama = $_POST['nama'];
        $gaji_pokok = $_POST['gaji_pokok'];
        
        // Menghitung tunjangan
        $tunj = (20 * $gaji_pokok)/100;
        
        // Menghitung pajak
        $pjk = (15 * ($gaji_pokok + $tunj))/100;
        
        // Menghitung gaji bersih
        $gaji_bersih = $gaji_pokok + $tunj - $pjk;
        
        // Menampilkan hasil perhitungan
        echo "<h3>Detail Gaji Karyawan</h3>";
        echo "<p>Nama Karyawan: $nama</p>";
        echo "<p>Tunjangan: " . number_format($tunj, 2) . "</p>";
        echo "<p>Pajak: " . number_format($pjk, 2) . "</p>";
        echo "<p>Gaji Bersih: " . number_format($gaji_bersih, 2) . "</p>";
    }
    ?>
