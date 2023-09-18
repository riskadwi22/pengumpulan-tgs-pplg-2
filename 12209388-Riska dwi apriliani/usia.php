<?php
$siswa = [
    [
        "nama" => "fema",
        "nis" => "129087",
        "rombel" => "PPLG XI-5",
        "rayon" => "cicurug",
        "umur" => 17,
    ],
    [
        "nama" => "intan",
        "nis" => "125389",
        "rombel" => "PPLG XI-2",
        "rayon" => "cisarua",
        "umur" => 20,
    ],
    [
        "nama" => "aripin",
        "nis" => "126854",
        "rombel" => "PPLG XI-4",
        "rayon" => "ciawi",
        "umur" => 5,
    ],
    [
        "nama" => "erlan",
        "nis" => "126307",
        "rombel" => "PPLG XI-1",
        "rayon" => "wikrama",
        "umur" => 18,
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>array</title>
</head>
<body>
    <form action="" method="get">
        <h2>Cari Data Siswa</h2>
        <a href="?cari=umur">Cari data siswa yang di atas umur 17 tahun</a><br>
        <label for="masukan_nama">Masukkan nama :</label>
        <input type="text" id="masukan_nama" name="masukan_nama">
        <input type="submit" name="submit" value="kirim">
    </form>
    <?php
    // query parameter "cari" dan umur"
    if (isset($_GET['cari']) && $_GET['cari'] == 'umur') {
        echo '<p><strong>Data Siswa dengan Umur 17</strong></p>';
      '<ul>';
        foreach ($siswa as $data) {
            if ($data['umur'] >= 17) {
                echo '<li>Nama: ' . $data['nama'] . ', Umur: ' . $data['umur'] . '</li>';
            }
        }
        echo '</ul>';
    }
    // Memeriksa form pencarian nama dikirim
    if (isset($_GET['submit']) && isset($_GET['masukan_nama'])) {
        $nama_cari = $_GET['masukan_nama'];
        echo '<h3>Hasil Pencarian untuk Nama: ' . $nama_cari . '</h3>';
        '<ul>';
        foreach ($siswa as $data) {
            if (strtolower($data['nama']) == strtolower($nama_cari)) {
                echo '<li>Nama: ' . $data['nama'] . ', Umur: ' . $data['umur'] . '</li>';
            }
        }
        echo '</ul>';
    }
    ?>
</body>
</html>